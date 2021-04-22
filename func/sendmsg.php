<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");
    header('Content-Type: application/json');
    
    require_once("tgbotcredentials.php");

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


    $hitkn=trim($decoded['hitkn']);
    if ($hitkn == ('J3(21=k+fd*9')) {
        
    }else{
        print '{"result":"false","msg":"invalid content (1)"}';
        exit();
    }
    $rmail=trim($decoded['email']);
    $subject=trim($decoded['subject']);
    $message=trim($decoded['msg']);

    $rmail=filter_var($rmail, FILTER_SANITIZE_EMAIL);

    $message=filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);

    if ($message==""||$subject==""||$rmail=="") {
        print '{"result":"false","msg":"Error al enviar el mensaje"}';
        exit();
    }

    $msg = "<code>".$rmail."</code> ha enviado el siguiente #mensaje:\n\nAsunto: ".$subject."\n\n".$message;
    $url = $botUrlGeneratorBot."sendMessage?chat_id=".$groupIdAdminsOfertas."&text=".urlencode($msg)."&parse_mode=HTML";
    $response  = json_decode(file_get_contents($url));
    if (isset($response->result->message_id)) {
        print '{"result":"true"}';
    }else{
        print '{"result":"false","msg":"Error al enviar el mensaje"}';
    }

?>