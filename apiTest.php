<?php
/*
 * Copyright (c) 2012, IDM
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are permitted
 * provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright notice, this list of
 *       conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright notice, this list
 *       of conditions and the following disclaimer in the documentation and/or other materials
 *       provided with the distribution.
 *     * Neither the name of the IDM nor the names of its contributors may be used to endorse or
 *       promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR
 * IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND
 * FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 * WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

require 'include/SkPublishAPI.php';

class RequestHandler implements SkPublishAPIRequestHandler {
    public function prepareGetRequest($curl, $uri, &$headers) {
        print($uri."\n");
        $headers[] = "Accept: application/json";
    }
}



list($script, $baseUrl, $accessKey) = $argv;

$requestHandler = new RequestHandler();
$baseUrl = 'https://dictionary.cambridge.org';
$accessKey = 'y2QHNmJd6mFyy0Dbi6dEdsONqnCO4BbEgKdhR9S7b9ec7iTcbmG1vWH1dUPnab6S';
$api = new SkPublishAPI($baseUrl.'/api/v1', $accessKey);
$api->setRequestHandler($requestHandler);

print "*** Dictionaries\n";
$dictionaries = json_decode($api->getDictionaries(), true);
var_dump($dictionaries);
echo "<br/><br/><br/>";
$dict = $dictionaries[0];
var_dump($dict);
$dictCode = $dict["dictionaryCode"];
echo "<br/><br/><br/>";
print "*** Search\n";
print "*** Result list\n";
$results = json_decode($api->search($dictCode, "ca", 1, 1), true);
var_dump($results);
echo "<br/><br/><br/>";
print "*** Spell checking\n";
$spellResults = json_decode($api->didYouMean($dictCode, "dorg", 3), true);
var_dump($spellResults);
echo "<br/><br/><br/>";
print "*** Best matching\n";
$bestMatch = json_decode($api->searchFirst($dictCode, "ca", "html"), true);
var_dump($bestMatch);
echo "<br/><br/><br/>";
print "*** Nearby Entries\n";
$nearbyEntries = json_decode($api->getNearbyEntries($dictCode, $bestMatch->{"entryId"}, 3), true);
var_dump($nearbyEntries);
echo "<br/><br/><br/>";
?>

<link rel="stylesheet" type="text/css" href="https://dictionary-api.cambridge.org/resources/cdo-api-html5.css">


<article class=\"entry\"><header><h1 class=\"hw\">change</h1> <span class=\"info\"><span class=\"posgram\"><span class=\"pos\">verb</span></span> <span class=\"info\"><a class=\"playback\" href=\"#\"><img alt=\"change: listen to American pronunciation\" src="https://dictionary.cambridge.org/external/images/us_pron.png?version=3.1.89"/></a><audio><source type=\"audio/mpeg\" src="https://dictionary.cambridge.org/media/learner-english/us_pron/c/cha/chang/change.mp3\"/><source type=\"audio/ogg\" src=\"https://dictionary.cambridge.org/media/learner-english/us_pron_ogg/c/cha/chang/change.ogg\"/>Your browser does not support HTML5 audio.</audio></span><span class=\"info\"><a class=\"playback\" href=\"#\"><img alt=\"change: listen to British English pronunciation\" src="https://dictionary.cambridge.org/external/images/uk_pron.png?version=3.1.89\"/></a><audio><source type=\"audio/mpeg\" src=\"https://dictionary.cambridge.org/media/learner-english/uk_pron/u/ukc/ukcha/ukchamo016.mp3\"/><source type=\"audio/ogg\" src=\"https://dictionary.cambridge.org/media/learner-english/uk_pron_ogg/u/ukc/ukcha/ukchamo016.ogg\"/>Your browser does not support HTML5 audio.</audio><span class=\"pron\">/<span class=\"ipa\">tʃeɪndʒ</span>/</span> </span></span></header><section class=\"senseGrp\"><section class=\"senseEntry\"><header><span class=\"gw\">DIFFERENT</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">I</span></span>, <span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header>  <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">A2</span> </span><span class=\"def\">to become different, or to make someone or something become different: </span></span><span class=\"examp\"><span class=\"eg\">I hadn't seen her for twenty years, but she hadn't changed a bit.</span></span><span class=\"examp\"><span class=\"eg\">Meeting you has changed my life.</span></span><span class=\"examp\"><span class=\"eg\">She's <span class=\"cl\">changed from</span> being a happy, healthy child <span class=\"cl\">to</span> being ill all the time.</span></span><span class=\"examp\"><span class=\"eg\">Since he met her, he's a changed man.</span></span><span class=\"examp\"><span class=\"eg\">changing attitudes</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">FROM ONE THING TO ANOTHER</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">I</span></span>, <span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header> <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">A1</span> </span><span class=\"def\">to stop having or using one thing, and start having or using another: </span></span><span class=\"examp\"><span class=\"eg\">The doctor has recommended changing my diet.</span></span><span class=\"examp\"><span class=\"eg\">I'll have to ask them if they can change the time of my interview.</span></span><span class=\"examp\"><span class=\"eg\">You'll have to change gear to go up the hill.</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">CLOTHES</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">I</span></span>, <span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header> <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">A2</span> </span><span class=\"def\">to take off your clothes and put on different ones: </span></span><span class=\"examp\"><span class=\"eg\">He <span class=\"cl\">changed out of</span> his school uniform <span class=\"cl\">into</span> jeans and a T-shirt.</span></span><span class=\"examp\"><span class=\"eg\">Is there somewhere I can <span class=\"cl\">get changed</span>?</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">JOURNEY</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">I</span></span>, <span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header> <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">A2</span> </span><span class=\"def\">to get off a bus, plane, etc and catch another, in order to continue a journey: </span></span><span class=\"examp\"><span class=\"eg\">I have to change trains in Paris.</span></span><span class=\"examp\"><span class=\"eg\">Is there a direct service, or do we have to change?</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">IN SHOP</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">T</span></span>]</span> <span class=\"lab\"><span class=\"region\">UK</span> </span></span></header><section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">B1</span> </span><span class=\"def\">to take something you have bought back to a shop and exchange it for something else: </span></span><span class=\"examp\"><span class=\"eg\">If the dress doesn't fit, can I <span class=\"cl\">change</span> it <span class=\"cl\">for</span> a smaller one?</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">MONEY</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header> <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">A2</span> </span><span class=\"def\">to get or give someone money in exchange for money of a different type: </span></span><span class=\"examp\"><span class=\"eg\">Where can I change my dollars?</span></span><span class=\"examp\"><span class=\"eg\">Can you <span class=\"cl\">change</span> a 20 euro note <span class=\"cl\">for</span> two tens?</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">BED</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header> <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">›</span> </span><span class=\"def\">to take dirty sheets off a bed and put on clean ones: </span></span><span class=\"examp\"><span class=\"eg\">to change the bed/sheets</span></span></section></section><section class=\"senseEntry\"><header><span class=\"gw\">BABY</span> <span class=\"info\"><span class=\"gram\">[<span class=\"gcs\"><span class=\"gc\">T</span></span>]</span></span></header> <section class=\"def-block\"><span class=\"definition\"><span class=\"info\"><span class=\"lvl\">›</span> </span><span class=\"def\">to put a clean nappy (= thick cloth worn on a baby's bottom) on a baby</span></span> <span class=\"entry-xref\">→ <span class=\"lab\">See also</span> <a class=\"xr\" href=\"https://dictionary.cambridge.org/dictionary/learner-english/chop-and-change\" data-resource=\"learner-english\" data-topic=\"chop-and-change\"><span class=\"f\">chop and change</span></a>, <a class=\"xr\" href=\"https://dictionary.cambridge.org/dictionary/learner-english/change-hands\" data-resource=\"learner-english\" data-topic=\"change-hands\"><span class=\"f\">change hands</span></a>, <a class=\"xr\" href=\"https://dictionary.cambridge.org/dictionary/learner-english/change-your-tune\" data-resource=\"learner-english\" data-topic=\"change-your-tune\"><span class=\"f\">change your tune</span></a></span></section></section></section>        <span class=\"entry-xref\">→ <span class=\"lab\">See also</span> <a class=\"xr\" href=\"https://dictionary.cambridge.org/dictionary/learner-english/change-sth-around-round\" data-resource=\"learner-english\" data-topic=\"change-sth-around-round\"><span class=\"f\">change sth around/round</span></a>, <a class=\"xr\" href=\"https://dictionary.cambridge.org/dictionary/learner-english/change-over\" data-resource=\"learner-english\" data-topic=\"change-over\"><span class=\"f\">change over</span></a></span><footer><small>(Definition of change verb from the <a href=\"https://dictionary.cambridge.org/dictionary/learner-english/\" title=\"Cambridge Learner's Dictionary\n\">Cambridge Learner's Dictionary\n</a> © Cambridge University Press)</small></footer></article>\n",


<script type="text/javascript">

if (window.addEventListener) {
	window.addEventListener('load',addPlayBack, false);
}
else {
	window.attachEvent && window.attachEvent('onload',addPlayBack);
}
function addPlayBack() {
	var anchors = document.getElementsByClassName ('playback');
	for (var i = 0; i < anchors.length; i++) {
		var anchor = anchors[i];
		anchor.onclick = function(){
			var audio = this.nextElementSibling;
			var audioclone = audio.cloneNode(1);
			audioclone.onended = function() {
				audioclone.pause();
				audioclone = null; 
			};
			audioclone.play();
			return false;
		};
	}
}

</script>