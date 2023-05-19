<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blog post</title>
</head>
<body>
<?php
function dateParser ($date) {
    $parsedDate = date("d-m-Y", $date);
    return $parsedDate;
}

function turnToPost ($title, $date, $summary, $image) {
    print $imgInHTML = "<div class=\"snippet\"><div class=\"img-container\"><img src=\"{$image}\"></div>";
    print $titleInHTML = "<h2 class=\"title-teaser\">{$title}</h2>";
    print $dateInHTML = "<p class=\"date\"> Publicado el " .dateParser($date) ."</p>";
    print $summaryInHTML = "<p class=\"summary\">" .$summary ."</p></div>";
}

$id = $_GET['id'];

$api_url = "api/noticias/es/post_${id}.json";
$json= file_get_contents($api_url);
$data = json_decode($json);

turnToPost($data -> title -> es, $data -> date, $data -> description -> es, $data -> image);

?>
</body>
</html>