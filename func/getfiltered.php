<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');
    
    require_once("checktkn.php");

    if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
        print '{"result":"false","msg":"invalid request"}';
        exit();
    }
     
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if(strcasecmp($contentType, 'application/json') != 0){
        print '{"result":"false","msg":"invalid content type"}';
        exit();
    }
     
    $content = trim(file_get_contents("php://input"));
     
    $decoded = json_decode($content, true);
     
    if(!is_array($decoded)){
        print '{"result":"false","msg":"invalid content"}';
        exit();
    }

    require_once("conexion_PDO.php");
    $nom='';
    $lim=25;
    $cat='';
    $tie='';
    $env='';
    $gar='';
    $ago='';
    $min='';
    $max='';
    if(isset($decoded['nom'])){
        $nom = filter_var($decoded['nom'], FILTER_SANITIZE_STRING);
    }
    
    //$decoded  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); //SI SE ACTIVA ESTO, FALLA EL FILTRO (no la búsqueda por nombre)
    
    if(isset($decoded['lim'])){
        $lim=trim($decoded['lim']);
    }
    if(isset($decoded['cat'])){
        $cat=$decoded['cat'];
    }
    if(isset($decoded['tie'])){
        $tie=$decoded['tie'];
    }
    if(isset($decoded['env'])){
        $env=$decoded['env'];
    }
    if(isset($decoded['gar'])){
        $gar=$decoded['gar'];
    }
    if(isset($decoded['ago'])){
        $ago=trim($decoded['ago']);
    }
    if(isset($decoded['min'])){
        $min=trim($decoded['min']);
    }
    if(isset($decoded['max'])){
        $max=trim($decoded['max']);
    }

    $nombre='';
    $categoria='';
    $tienda='';
    $envio='';
    $garantia='';
    $in_params=[];

    if (is_numeric($lim)) {
    
    } else {
        print '{"result":"false","msg": "Parámetros incorrectos"}';
        exit();
    }

    if ($nom!='') {
        $in_params[':nom'] = '%'.$nom.'%';
        $nombre="AND Producto.nombrep LIKE :nom";
    }
    if (is_array($cat)) {
        if (count($cat)>0) {//set recieved arrays to :key=parameter for sql query
            $inc = "";
            foreach ($cat as $i => $item){
                $key = ":cat".$i;
                $inc .= "$key,";
                $in_params[$key] = $item;
            }
            $inc = rtrim($inc,",");
            $categoria='AND Producto.categoria IN ('.$inc.')';
        }
    }
    if (is_array($tie)) {
        if (count($tie)>0) {
            $int = "";
            foreach ($tie as $i => $item){
                $key = ":tie".$i;
                $int .= "$key,";
                $in_params[$key] = $item;
            }
            $int = rtrim($int,",");
            $tienda='AND Oferta.tienda IN ('.$int.')';
        }
    }
    if (is_array($env)) {
        if (count($env)>0) {
            $ine = "";
            foreach ($env as $i => $item){
                $key = ":env".$i;
                $ine .= "$key,";
                $in_params[$key] = $item;
            }
            $ine = rtrim($ine,",");
            $envio='AND Oferta.envio IN ('.$ine.')';
        }
    }
    if (is_array($gar)) {
        if (count($gar)>0) {
            $ing = "";
            foreach ($gar as $i => $item){
                $key = ":gar".$i;
                $ing .= "$key,";
                $in_params[$key] = $item;
            }
            $ing = rtrim($ing,",");
            $garantia='AND Oferta.garantia IN ('.$ing.')';
        }
    }
    $minimo='';
    $maximo='';
    if (is_numeric($min)) {
        $in_params[':min'] = $min;
        $minimo='AND Oferta.precioO>:min';
    }
    if (is_numeric($max)) {
        $in_params[':max'] = $max;
        $maximo='AND Oferta.precioO<:max';
    }

    $agotado='';
    if ($ago=='false') {
        $agotado='AND Oferta.estado=2';
    }
    
    $params=array(":l" => $lim);
    $params=array_merge($params,$in_params);

    

    $db = new Conexion();
    $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $dbTabla="Producto, Oferta, Tienda, Colores, TipoOferta, Envio, Garantia, Comentarios";
    $consulta = "SELECT Oferta.Ido, Producto.Idp, Producto.nombrep, Producto.foto, Producto.descripcion, Oferta.fechap, Oferta.fprogram, Oferta.precioH, Oferta.precioO, Oferta.cupon, Oferta.bitlink, Tienda.nombre AS Tienda, Colores.nombre AS Color, TipoOferta.texto AS tipooferta, Envio.nombre AS enviop, Envio.emoji AS envioe, Garantia.nombre AS garantiap, Garantia.emoji AS garantiae, Comentarios.texto AS com, Oferta.com2, Oferta.estado, Oferta.telegramid FROM $dbTabla WHERE Producto.Idp=Oferta.producto AND Oferta.tienda=Tienda.Idt AND Oferta.color=Colores.Idcolor AND Oferta.tipooferta=TipoOferta.IdTipoOf AND Oferta.envio=Envio.IdEnvio AND Oferta.garantia=Garantia.IdGarantia AND Oferta.comentario=Comentarios.Idcomentario AND Producto.activo=1 AND Oferta.estadistica=1 AND (Oferta.estado=2 || Oferta.estado=4) $categoria $tienda $envio $garantia $minimo $maximo $agotado $nombre ORDER BY GREATEST(Oferta.fechap, COALESCE(Oferta.fprogram,'1000-01-01')) DESC LIMIT 0,:l";
    $result = $db->prepare($consulta);
    if($result->execute($params)){
        
    }else{
        print '{"result":"false","msg": "Error recopilando ofertas"}';
        exit();
    }

    $ofertas = array();

    foreach ($result as $oferta){
        $offset=new DateTime();
        $fecha=$oferta['fechap'].$offset->format('O');
        if ($oferta['fechap'] < $oferta['fprogram']) {
            $fecha=$oferta['fprogram'].$offset->format('O');
        }
        $of = array('Ido' => $oferta['Ido'],
                    'nombrep' => $oferta['nombrep'],
                    'foto' => $oferta['foto'],
                    'fechap' => $fecha,
                    'precioO' => $oferta['precioO'],
                    'envio' => $oferta['enviop'],
                    'envioemoji' => $oferta['envioe'],
                    'garantia' => $oferta['garantiap'],
                    'garantiaemoji' => $oferta['garantiae'],
                    'com' => $oferta['com'],
                    'estado' => $oferta['estado']
                );
        array_push($ofertas, $of);
    }
    echo '{"result":"true","ofertas":';
    echo json_encode($ofertas);
        echo '}';
    $db=NULL;

      

?>