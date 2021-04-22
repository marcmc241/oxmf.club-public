<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');
    
    require_once("checktkn.php");
    require_once("conexion_PDO.php");
    require_once("afilliate.php");

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

    $link=trim($decoded['link']);

    if (strlen($link)>249) {
        $link = substr($link,0,249);
    }

    if(!isset($link)){
        print '{"result":"false","msg": "Introduce un link"}';
        exit();
    }

    $db = new Conexion();
    //protect
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$urlrp = removeparameters($link);

    if (strlen($link)<=35) {
        $link=unsh($link);
    }

    $result = addafilliate($link);
    $afurl = $result[0];
    $tienda = $result[1];
    $err = $result[2];
    $data = date("Y-m-d H:i:s");

    //devolver un bitlink
    $bit = make_bitly_url($afurl);
    //store all to DB
    $consulta = "INSERT INTO Bitlink(tienda,bitlink,linklargo,fechap) VALUES (:t,:b,:l,:f)";
    $result = $db->prepare($consulta);
    if($result->execute(array(":t" => $tienda,":b" => $bit,":l" => $link,":f" => $data))){
        if($err==1){
            print '{"result":"false","msg": "Vaya, no tenemos esta tienda entre nuestros afiliados :("}';
            exit();
        }else if($err==2){
            print '{"result":"false","msg": "Error, inténtalo más tarde"}';
            exit();
        }
        $encoded = json_encode($bit);
        print '{"result":"true","bitlink": '.$encoded.'}';
    }else{
        print '{"result":"false","msg": "Error procesando link"}';
        exit();
    }
    
    $db=NULL;  

?>