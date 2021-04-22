<?PHP
    require_once("conexion_PDO.php");

    if(!isset($_COOKIE['tkn'])) {
        print '{"result":"false","msg": "Error inesperado, recarga la página (code: t0)"}';
        exit();
    }
    
    $token = filter_var($_COOKIE['tkn'], FILTER_SANITIZE_STRING);
    
    $db = new Conexion();
    $date = date('Y-m-d');
    $prev_date = date('Y-m-d', strtotime($date .' -1 day'));

    $dbTabla="Oxmfclub";
    $consulta = "SELECT COUNT(*) FROM $dbTabla WHERE idSesion=:tkn AND fecha > :f";
    $result = $db->prepare($consulta);
    if($result->execute(array(":tkn" => $token, ":f" => $prev_date))){
        $no = $result->rowCount();
        if ($no == 1) {
            $db=NULL;
            //continue
        }else{
            print '{"result":"false","msg": "Error inesperado, recarga la página (code: t2)"}';
            $db=NULL;
            exit();
        }
    }else{
        print '{"result":"false","msg": "Error inesperado, recarga la página (code: t1)"}';
        $db=NULL;
        exit();
    }
    
    
?>