<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');
    
    require_once("checktkn.php");
    require_once("conexion_PDO.php");

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

    if(isset($decoded['nom']) && $decoded['nom'] != ""){
        $qu = filter_var($decoded['nom'], FILTER_SANITIZE_STRING);
    }else{
        print '{"result":"false","msg": "No hay búsqueda"}';
        exit();
    }
     

    $db = new Conexion();
    $dbTabla="Producto";
    $consulta = "SELECT Producto.Idp, Producto.nombrep, Producto.foto, Producto.descripcion FROM $dbTabla WHERE Producto.activo=1 AND MATCH(Producto.nombrep,Producto.tags) AGAINST(:qu) LIMIT 0,15";
    $result = $db->prepare($consulta);
    if($result->execute(array(":qu" => $qu))){
        
    }else{
        print '{"result":"false","msg": "No se han encontrado productos"}';
        exit();
    }

    $productos = array();

    foreach ($result as $producto){//build array of products
        
        $pd = array('nombrep' => $producto['nombrep'],
                    'Idp' => $producto['Idp'],
                    'foto' => $producto['foto']
                );
        array_push($productos, $pd);
    }

    if (sizeof($productos) < 15) {//if there is less than 15 results
        $dbTabla="Producto";
        $consulta = "SELECT Producto.nombrep, Producto.tags FROM $dbTabla WHERE Producto.nombrep=:qu LIMIT 0,5";
        $result2 = $db->prepare($consulta);
        if($result2->execute(array(":qu" => $qu))){
            $equalprods=0;
            $tags='';
            foreach ($result2 as $producto){
                $equalprods==1;
                $tags.=";".$producto['tags'];
            }
            if ($equalprods>0) {//si hay algún producto con ese nombre exacto
                    $dbTabla="Producto";
                    $consulta = "SELECT Producto.Idp, Producto.nombrep, Producto.foto, Producto.descripcion FROM $dbTabla WHERE Producto.activo=1 AND MATCH(Producto.nombrep,Producto.tags) AGAINST(:qu) LIMIT 0,15";
                    $result3 = $db->prepare($consulta);
                    if($result3->execute(array(":qu" => str_replace(";"," ",$tags)))){
                       foreach ($result3 as $producto){//añadir al array de productos
                            if(sizeof($productos)<15){//si el array es menor a 15 resultados
                                $pd = array('nombrep' => $producto['nombrep'],
                                            'Idp' => $producto['Idp'],
                                            'foto' => $producto['foto']
                                        );
                                array_push($productos, $pd);
                            }
                            
                        }
                    }
            }
        }
    }

    
    echo '{"result":"true","productos":';
    echo json_encode($productos);
        echo '}';
    $db=NULL;

      

?>