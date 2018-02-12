<?php
$url = 'https://dictionary.cambridge.org/api/v1';
$accessKey = 'y2QHNmJd6mFyy0Dbi6dEdsONqnCO4BbEgKdhR9S7b9ec7iTcbmG1vWH1dUPnab6S';

if(isset($_POST['palabras'])){
	$palabras = $_POST['palabras'];
	$busqueda = setUri('dictionaries/learner-english/search/first/?q='.$palabras);
	if(!empty($busqueda->entryContent) && !is_null($busqueda->entryContent)){
		echo json_encode($busqueda->entryContent);
	}else{
		echo json_encode("error al buscar: ".$palabras);
	}

}



/**
 * Método que setea y realiza el llamado a la api
 *
 * @param $metodo = Nombre del método que se invocará
 * @return Respuesta de la api
 * @author Jorge Velarde
 * @version 1.0 - 08/02/2017
 **/
function setUri($metodo){
	global $url;
	global $accessKey;
	$uri =  $url.'/'.$metodo;
	//echo "<br/><br/>";
	//print_r($uri);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $uri);
	$headers = array();
	$headers[] = "accessKey: ".$accessKey;
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	return json_decode(curl_exec($curl));
}
?>