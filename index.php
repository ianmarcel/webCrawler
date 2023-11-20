<?php 
function crawler($url,$depth= 2) {
 if ($depth > 0) {
    $html = file_get_contents($url);
    preg_match_all('~<a.*?href="(.*?)".*?>~',$html,$matches);
    foreach($matches[1] as $newurl) {
        crawler($newurl,$depth- 1);
    }
    file_put_contents('results.html',"\n\n".$html."\n\n",FILE_APPEND);


 }
}
crawler('https://www.foxsports.com/soccer/scores',2);
 //É so ir em localhost/3crawler/results.html N precisa fazer mais nada
?>