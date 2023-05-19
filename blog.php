<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Blog</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Página principal</h1>
<div class="blog">
<?php 


function dateParser ($date) {
    $parsedDate = date("Y-m-d", $date);
    return $parsedDate;
}

function textTrimmer ($string) {
    $wordArray = preg_split('/\s+/', $string);
    $wordArray120 = array_slice($wordArray, 0, 120);
    $finalString = implode(' ', $wordArray120);
    return $finalString;
}

function turnToSnippet ($title, $date, $summary, $image) {
    print $imgInHTML = "<div class=\"snippet\"><div class=\"img-container\"><img src=\"{$image}\"></div>";
    print $titleInHTML = "<h2 class=\"title-teaser\">{$title}</h2>";
    print $dateInHTML = "<p class=\"date\"> Publicado el " .dateParser($date) ."</p>";
    print $summaryInHTML = "<p class=\"summary\">" .textTrimmer($summary) ."...<em><a href=\"\"> saber más</a></em></p></div>";
}

for ($i = 1; $i <= 5; $i++) {
    $api_url = "api/noticias/es/post_${i}.json";
    $json= file_get_contents($api_url);
    $data = json_decode($json);
    turnToSnippet($data -> title -> es, $data -> date, $data -> description -> es, $data -> image);
}

?>
</div>
</body>
</html>