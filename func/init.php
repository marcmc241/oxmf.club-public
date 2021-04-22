<?PHP
    header ("Cache-Control: no-cache"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');
    session_start();
    
    //Generate a random string.
    $token = openssl_random_pseudo_bytes(64);
    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    
    require_once("conexion_PDO.php");
    
    $tk=trim($_GET['tk']);
    if (is_numeric($tk)) {
    
    } else {
        print '{"result":"false","msg": "Error inesperado (code: 1)"}';
        exit();
    }

    $db = new Conexion();
    
    $date = date("Y-m-d H:i:s");

    $dbTabla="Oxmfclub";
    $consulta = "INSERT INTO $dbTabla(idSesion,fecha) VALUES (:ids, :f)";
    $result = $db->prepare($consulta);
    if($result->execute(array(":ids" => $token, ":f" => $date))){
        setcookie("tkn", $token, time() + (86400 * 30), "/");
        $_SESSION['oxmfuser'] = $db->lastInsertId();
    }else{
        print '{"result":"false","msg": "Error inesperado (code: 2)"}';
        $db=NULL;
        exit();
    }
    
    $promotext;
    $promoimg;

    $dbTabla="Configuracion";
    $consulta = "SELECT promotxt,promoimg FROM $dbTabla WHERE Idconfig = 4";
    $result = $db->prepare($consulta);
    if($result->execute()){
        foreach ($result as $proo){
            $promotext=$proo['promotxt'];
            $promoimg=$proo['promoimg'];
        }
    }else{
        print '{"result":"false","msg": "Error inesperado (code: 3)"}';
        $db=NULL;
        exit();
    }

    

    echo '{"result":"true","tkn":"'.$token; //token
    if (isset($promotext) && $promotext!=NULL && trim($promotext) != '') {
        echo '","promotxt":"'.$promotext.'","promoimg":"https://oxmf.club/images/'.$promoimg; //promo
    }
    echo '"}';
    $db=NULL;
    
    

?>