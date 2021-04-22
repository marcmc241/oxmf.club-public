<?PHP
header ("Cache-Control: no-cache, must-revalidate"); 
header ("Pragma: no-cache");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

header('Content-Type: application/json');

require_once("checktkn.php");
require_once("conexion_PDO.php");
session_start();

$lim=40;

$p = $_GET["p"];

$db = new Conexion();
if (is_numeric($p)) {
    
} else {
    print '{"result":"false","msg": "Parámetros incorrectos"}';
    exit();
}
if (is_numeric($lim)) {
    
} else {
    print '{"result":"false","msg": "Parámetros incorrectos"}';
    exit();
}
        $db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

         //save register into Oxmf_productos_vistos
         $dbTabla="Oxmf_productos_vistos";
         $consulta = "INSERT INTO $dbTabla (usuario, producto, fecha) VALUES (:u, :p, :f)";
         $result = $db->prepare($consulta);
         $result->execute(array(":u" => $_SESSION['oxmfuser'], ":p" => $p, ":f" => date("Y-m-d H:i:s")));

        $dbTabla="Oferta, Tienda";

        $consulta = "SELECT * FROM $dbTabla WHERE Oferta.tienda=Tienda.Idt AND Oferta.producto=:p AND Oferta.estadistica=1 ORDER BY Oferta.fechap DESC LIMIT 0,:l";
        $result = $db->prepare($consulta);
        if($result->execute(array(":p" => $p,":l" => $lim))){

        }else{
            print '{"result":"false","msg": "Error recopilando datos de la estadística"}';
            exit();
        }
        $ids = array();
        $esph = array();
        $espo = array();
        $fechas = array();
        foreach ($result as $estadistica){
            array_push($ids, $estadistica['Ido']);
            array_push($esph, $estadistica['precioH']);
            array_push($espo, $estadistica['precioO']);
            
            $newDate = date("j-n-y", strtotime($estadistica['fechap']));
            array_push($fechas, $newDate);
        }
        $esph=array_reverse($esph);
        $espo=array_reverse($espo);
        $fechas=array_reverse($fechas);
        $ids=array_reverse($ids);
        echo '{"result":"true","esph":';
        echo json_encode($esph);
        echo ',"espo":';
        echo json_encode($espo);
        echo ',"fechas":';
        echo json_encode($fechas);
        echo ',"ofids":';
        echo json_encode($ids);
        echo '}';
?>