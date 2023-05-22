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
    <div class="sort-menu">
        <p>Ordenar:</p>
        <ul class="sort-options">
            <li><a href="blog.php?sortType=title">A-Z</a></li>
            <li><a href="blog.php?sortType=title&sortDir=reverse">Z-A</a></li>
            <li><a href="blog.php?sortType=date&sortDir=reverse">más reciente</a></li>
            <li><a href="blog.php?sortType=date">más antiguo</a></li>
        </ul>
    </div>
<?php 

$sortType = $_GET['sortType'];
$sortDir = $_GET['sortDir'];

$snippetArray = [];

function dateParser ($date) {
    $parsedDate = date("d-m-Y", $date);
    return $parsedDate;
}

function textTrimmer ($string) {
    $wordArray = preg_split('/\s+/', $string);
    $wordArray120 = array_slice($wordArray, 0, 120);
    $finalString = implode(' ', $wordArray120);
    return $finalString;
}

function turnToSnippet ($title, $date, $summary, $image, $id) {

    $imgInHTML = "<div class=\"snippet\"><div class=\"img-container\"><img src=\"{$image}\"></div>";
    $titleInHTML = "<h2 class=\"title-teaser\">{$title}</h2>";
    $dateInHTML = "<p class=\"date\"> Publicado el " .dateParser($date) ."</p>";
    $summaryInHTML = "<p class=\"summary\">" .textTrimmer($summary) ."... <em><a href=\"post.php?id={$id}\">saber más</a></em></p></div>";

    $finalSnippet = $imgInHTML . $titleInHTML . $dateInHTML . $summaryInHTML;

    print $finalSnippet;

}

for ($i = 1; $i <= 5; $i++) {
    $api_url = "api/noticias/es/post_${i}.json";
    $json = file_get_contents($api_url);
    $data = json_decode($json);

    switch($sortType) {
        case 'title':
            $snippetArray[$i] = $data -> title -> es;
            continue;

        case 'date':
            $snippetArray[$i] = $data -> date;
            continue;

        default:
            turnToSnippet($data -> title -> es, $data -> date, $data -> description -> es, $data -> image, $i);
            break;
    }

}

if ($sortType) {

    function sorter($a, $b) {
        return $a <=> $b;
    }

    uasort($snippetArray, "sorter");

    if ($sortDir == 'reverse') {
        $snippetArray = array_reverse($snippetArray, true);
    }

    foreach($snippetArray as $key => $value) {
        $api_url = "api/noticias/es/post_${key}.json";
        $json = file_get_contents($api_url);
        $data = json_decode($json);

        turnToSnippet($data -> title -> es, $data -> date, $data -> description -> es, $data -> image, $key);

    }
}

?>
</div>
</body>
</html>