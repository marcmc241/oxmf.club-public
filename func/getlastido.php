<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');
    
    require_once("checktkn.php");
    require_once("conexion_PDO.php");
    
    $db = new Conexion();
    $dbTabla="Oferta";//select last offer
    $consulta = "SELECT Oferta.Ido FROM $dbTabla WHERE Oferta.estadistica=1 AND (Oferta.estado=2 || Oferta.estado=4) ORDER BY GREATEST(Oferta.fechap, COALESCE(Oferta.fprogram,'1000-01-01')) DESC LIMIT 0,1";
    $result = $db->prepare($consulta);
    if($result->execute()){
        
    }else{
        print '{"result":"false","msg": "Error recopilando ofertas"}';
        exit();
    }
    $ido;
    foreach ($result as $oferta){
        $ido=$oferta['Ido'];
    }
    echo '{"result":"true","ido":"'.$ido;
        echo '"}';
    $db=NULL;
?>