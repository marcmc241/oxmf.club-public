<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');

    require_once("checktkn.php");
    session_start();
    
    $ido=trim($_GET['ido']);

    $p;
    require_once("conexion_PDO.php");

    $db = new Conexion();
    $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $dbTabla="Producto, Oferta, Tienda, Colores, TipoOferta, Envio, Garantia, Comentarios";
    $consulta = "SELECT Oferta.Ido, Producto.Idp, Producto.nombrep, Producto.foto, Producto.descripcion, Oferta.fechap, Oferta.fprogram, Oferta.precioH, Oferta.precioO, Oferta.cupon, Oferta.bitlink, Tienda.nombre AS Tienda, Colores.nombre AS Color, TipoOferta.texto AS tipooferta, Envio.nombre AS enviop, Envio.emoji AS envioe, Garantia.nombre AS garantiap, Garantia.emoji AS garantiae, Comentarios.texto AS com, Oferta.com2, Oferta.estado, Oferta.telegramid, Producto.tags FROM $dbTabla WHERE Producto.Idp=Oferta.producto AND Oferta.tienda=Tienda.Idt AND Oferta.color=Colores.Idcolor AND Oferta.tipooferta=TipoOferta.IdTipoOf AND Oferta.envio=Envio.IdEnvio AND Oferta.garantia=Garantia.IdGarantia AND Oferta.comentario=Comentarios.Idcomentario AND (Oferta.estado=2 || Oferta.estado=4) AND Oferta.Ido=:ido LIMIT 0,1";
    $result = $db->prepare($consulta);
    if($result->execute(array(":ido" => $ido))){
        
    }else{
        print '{"result":"false","msg":"Error recopilando ofertas"}';
        exit();
    }

    $ofertas = array();

    foreach ($result as $oferta){

        $offset=new DateTime();
        $fecha=$oferta['fechap'].$offset->format('O');
        if ($oferta['fechap'] < $oferta['fprogram']) {
            $fecha=$oferta['fprogram'].$offset->format('O');
        }
        $now = new DateTime();
        $date = new DateTime($fecha);
        $since_start = $date->diff($now);
        $hours = $since_start->days * 24;
        $hours += $since_start->h;

        $of = array('Ido' => $oferta['Ido'],
                    'nombrep' => $oferta['nombrep'],
                    'Idp' => $oferta['Idp'],
                    'foto' => $oferta['foto'],
                    'descripcion' => $oferta['descripcion'],
                    'fechap' => $fecha,
                    'diff' => $hours,
                    'precioH' => $oferta['precioH'],
                    'precioO' => $oferta['precioO'],
                    'cupon' => $oferta['cupon'],
                    'bitlink' => $oferta['bitlink'],
                    'tienda' => $oferta['Tienda'],
                    'color' => $oferta['Color'],
                    'tipooferta' => $oferta['tipooferta'],
                    'envio' => $oferta['enviop'],
                    'envioemoji' => $oferta['envioe'],
                    'garantia' => $oferta['garantiap'],
                    'garantiaemoji' => $oferta['garantiae'],
                    'com' => $oferta['com'],
                    'com2' => $oferta['com2'],
                    'estado' => $oferta['estado'],
                    'tid' => $oferta['telegramid'],
                    'tags' => $oferta['tags']);
        array_push($ofertas, $of);
        $p=$oferta['Idp'];
    }

     
    
    if (empty($ofertas)) {
            print '{"result":"false","msg":"La oferta no existe o ha sido eliminada"}';
            exit();
    }

    //save register into Oxmf_productos_vistos
     $dbTabla="Oxmf_productos_vistos";
     $consulta = "INSERT INTO $dbTabla (usuario, producto, fecha) VALUES (:u, :p, :f)";
     $result = $db->prepare($consulta);
     $result->execute(array(":u" => $_SESSION['oxmfuser'], ":p" => $p, ":f" => date("Y-m-d H:i:s")));

    echo '{"result":"true","ofertas":';
    echo json_encode($ofertas);
        echo '}';
    $db=NULL;

    
    

?>