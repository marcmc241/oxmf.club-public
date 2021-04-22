<?PHP
    header ("Cache-Control: no-cache, must-revalidate"); 
    header ("Pragma: no-cache");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT");

    header('Content-Type: application/json');

    require_once("checktkn.php");
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
    
    $id;
    $message;

    if(isset($decoded['id']) && $decoded['id'] != "" && is_int($decoded['id'])){
        $id = filter_var($decoded['id'], FILTER_SANITIZE_NUMBER_INT);
    }else{
        print '{"result":"false","msg": "No hay id"}';
        exit();
    }
    
    if(isset($decoded['type']) && $decoded['type'] != "" && is_int($decoded['type'])){
        $type = filter_var($decoded['type'], FILTER_SANITIZE_NUMBER_INT);
        if ($type == 1) {
            $message = "&#128308; "." Reportado como agotado:\noxmf.club/#/of/".$id;
        }else if($type == 2){
            $message = "&#128308; "." Reportado error en:\noxmf.club/#/of/".$id;
        }
    }else{
        print '{"result":"false","msg": "No hay typ"}';
        exit();
    }

    $url = $botUrlOxmfBot."sendMessage?chat_id=".$chatIdOxmfReports."&text=".urlencode($message)."&parse_mode=HTML&disable_web_page_preview=true";
    $response  = json_decode(file_get_contents($url));
        
    if (isset($response->result->message_id)) {
            echo '{"result":"true"}';
    }else{
        echo '{"result":"false","msg":"Error al reportar"}';
    }

?>