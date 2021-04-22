<?PHP
//this is only for backward compatibility support
    require_once("func/conexion_PDO.php");

    $p = $_GET["p"];
    $db = new Conexion();
    
    $newURL=NULL;
    $consulta = "SELECT Ido FROM Oferta WHERE Oferta.producto=:p AND Oferta.estadistica=1 AND (Oferta.estado=2 || Oferta.estado=4) ORDER BY GREATEST(Oferta.fechap, COALESCE(Oferta.fprogram,'1000-01-01')) DESC LIMIT 0,1";
    $result = $db->prepare($consulta);
    $result->execute(array(":p" => $p));
    foreach ($result as $oferta){
        $newURL="https://oxmf.club/#/of/".$oferta['Ido'];
        
    }
    if ($newURL==NULL) {
        $newURL="https://oxmf.club";
    }
    $db=NULL;
    header('Location: '.$newURL);
    exit();
        
?>