<?PHP
    header ("Cache-Control: must-revalidate, max-age = 86400"); //only revalidate and update after 24h
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');

    require_once("conexion_PDO.php");
    require_once("afilliate.php");

    $db = new Conexion();
    

    //------------------------Categorias
    $dbTabla="Categoria";
    $consulta = "SELECT Categoria.nombrec, Categoria.Idc FROM $dbTabla ORDER BY Categoria.nombrec ASC";
    $result = $db->prepare($consulta);
    if($result->execute()){
        
    }else{
        print '{"result":"false","msg": "error requesting products."}';
        exit();
    }

    $categorias = array();
    foreach ($result as $cat){
        $c = array('Idc' => $cat['Idc'], 'nombrec' => $cat['nombrec']);
        array_push($categorias, $c);
    }

    //------------------------Tiendas
    $dbTabla="Tienda, Oferta";
    $consulta = "SELECT DISTINCT Tienda.Idt,Tienda.nombre,Tienda.main FROM $dbTabla WHERE Tienda.activo=1 AND Tienda.Idt=Oferta.tienda ORDER BY Tienda.nombre ASC";
    $result = $db->prepare($consulta);
    if($result->execute()){
        
    }else{
        print '{"result":"false","msg": "Error recopilando tiendas"}';
        exit();
    }

    $tiendas = array();
    foreach ($result as $tienda){
        $link = addafilliate($tienda['main']);
        $_t= array('Idt' => $tienda['Idt'], 'nombre' => $tienda['nombre'], 'mainaff' => $link[0]);
        array_push($tiendas, $_t);
    }

    //------------------------Envios
    $dbTabla="Envio";
    $consulta = "SELECT Envio.IdEnvio,Envio.nombre FROM $dbTabla ORDER BY Envio.nombre ASC";
    $result = $db->prepare($consulta);
    if($result->execute()){
        
    }else{
        print '{"result":"false","msg": "Error recopilando envios"}';
        exit();
    }

    $envios = array();
    foreach ($result as $envio){
        if ($envio['nombre']!='') {
            $_e= array('IdEnvio' => $envio['IdEnvio'], 'nombre' => $envio['nombre']);
            array_push($envios, $_e);
        }
        
    }

    //------------------------Garantias
    $dbTabla="Garantia";
    $consulta = "SELECT Garantia.IdGarantia,Garantia.nombre FROM $dbTabla ORDER BY Garantia.nombre ASC";
    $result = $db->prepare($consulta);
    if($result->execute()){
        
    }else{
        print '{"result":"false","msg": "Error recopilando garantías"}';
        exit();
    }

    $garantias = array();
    foreach ($result as $garantia){
        if ($garantia['nombre']!='') {
            $_g= array('IdGarantia' => $garantia['IdGarantia'], 'nombre' => $garantia['nombre']);
            array_push($garantias, $_g);
        }
    }

    //------------------------Search Tips
    $dbTabla="Producto";
    $consulta = "SELECT Producto.nombrep FROM $dbTabla ORDER BY Producto.fechap DESC LIMIT 0,60";
    $result = $db->prepare($consulta);
    if($result->execute()){
        
    }else{
        print '{"result":"false","msg": "Error recopilando productos"}';
        exit();
    }

    $productos = array();
    foreach ($result as $producto){
        if ($producto['nombrep']!='') {
            $_p = preg_replace("/\([^)]+\)/","",$producto['nombrep']);//eliminar parentesis
            array_push($productos, trim($_p));
        }
    }

    echo '{"result":"true","categorias":';
    echo json_encode($categorias);
    echo ',"tiendas":';
    echo json_encode($tiendas);
    echo ',"envios":';
    echo json_encode($envios);
    echo ',"garantias":';
    echo json_encode($garantias);
    echo ',"tips":';
    echo json_encode($productos);
        echo '}';
    $db=NULL;
?>