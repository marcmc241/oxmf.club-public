<?PHP
require_once("conexion_PDO.php");


function removeparameters($url){
	$url = strtok($url, '?');
	return $url;
}


function addafilliate($url){
	$err=0;
	$url = substr($url,0,249);
	$iurl=$url;
	$db = new Conexion();
	$dbTabla="Tienda";
				$consulta = "SELECT COUNT(*) FROM $dbTabla"; 
				$result = $db->prepare($consulta);
				$result->execute();
				$total = $result->fetchColumn();

				if ($total>0) {

					$consulta = "SELECT * FROM $dbTabla";
					$result = $db->prepare($consulta);
					$result->execute();
					foreach ($result as $tienda){
						$pos=false;
						$pos = strpos($url, $tienda['busqueda']);
						if ($pos !== false) {
							//l'ha trobat
						     
						     	//buscar amazon
						     	$amazn=false;
								$amzn = strpos($url, "amazon");
								if ($amzn !== false) {
									//l'ha trobat
									//invertim l'ordre en els links d'amazon
								     $url=$url.$tienda['referido'];
								} else {
								    //no l'ha trobat
								    //posem l'ordre correcte
								    $url=$tienda['referido'].$url;
								}

								$tie = $tienda['Idt'];
						} else {
						    //no l'ha trobat
						}
					}
					if ($iurl==$url) {
						//no s'ha trobat cap coincidencia
						$err=1;
					}
	
				}else{
					$err=2;
					//Error: No se han podido recuperar los datos de la BBDD.
				}
				$db=NULL;
				return array($url, $tie, $err);
 }



function make_bitly_url($url)
{
	$signature = '';
	$api_url =  'https://oxmf.club/l/yourls-api.php';

	// Init the CURL session
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_url);
	curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
	curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(     // Data to POST
	        'url' => $url,
	        'format'   => 'json',
	        'action'   => 'shorturl',
	        'signature' => $signature
	    ));

	// Fetch and return content
	$data = curl_exec($ch);
	curl_close($ch);

	$data = json_decode( $data );
	return $data->shorturl;
}

function unsh($url, $maxRequests = 10)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, $maxRequests);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Link Checker)');

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);

    $url=curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

    curl_close ($ch);
    return $url;
}

?>