<?php
$url = 'https://dictionary.cambridge.org/api/v1';
$accessKey = 'y2QHNmJd6mFyy0Dbi6dEdsONqnCO4BbEgKdhR9S7b9ec7iTcbmG1vWH1dUPnab6S';

/*Método que explotará todas las funciones de la API*/
function explotaApi(){
	$palabras = $_POST['buscar'];
	$def = array();
	$i = 0;
	//$diccionarios = setUri('dictionaries');
	$busqueda = setUri('dictionaries/learner-english/search/?q='.$palabras);
	//var_dump($diccionarios);
	if(!is_null($busqueda)){
		foreach($busqueda->results as $busca){
			$def[$i]['busqueda'] = $busca->entryLabel;
			$resultado = setUri('dictionaries/learner-english/entries/'.$busca->entryId.'?format=xml');
			// https://dictionary.cambridge.org/api/v1/dictionaries/learner-english/entries/rose_1/pronunciations/?lang=us&format=mp3
			$pronunciacionUs = setUri('dictionaries/learner-english/entries/'.$busca->entryId.'/pronunciations/?lang=us&format=ogg');
			$pronunciacionUk = setUri('dictionaries/learner-english/entries/'.$busca->entryId.'/pronunciations/?lang=uk&format=ogg');
			$def[$i]['definiciones'] = $resultado->entryContent;
			$def[$i]['pronunciaciones'] = ['US' => $pronunciacionUs[0]->pronunciationUrl, 'UK' => $pronunciacionUk[0]->pronunciationUrl];
			$i++;
		}

		if(empty($def)){
			$mean = setUri('dictionaries/learner-english/search/didyoumean/?q='.$palabras);
			$def[$i]['mean'] = $mean->suggestions;
		}
	}
	return $def;
}

/**
 * Método para llamar a la función search first para el popover de la búsqueda on de fly
 *
 * @return Respuesta de la api
 * @author Jorge Velarde
 * @version 1.0 - 11/02/2018
 **/
function searchFirst($palabras)
{
	$busqueda = setUri('dictionaries/learner-english/search/first/?q='.$palabras);
	return $busqueda;
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