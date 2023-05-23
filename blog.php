<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Blog</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'term_dictionary.php'?>
    <nav>
        <div class="lang-options"> 
            <ul>
                <?php
                include 'language_switcher.php';
                ?>
            </ul>
        </div>
        <?php include "main_menu.php"; ?>
    </nav>
    <h1>
        <?php
        print $pageTitles['main'][$currentLanguage];
        ?>
    </h1>
    
<div class="blog">
    <div class="sort-menu">
        <p>
            <?php
            print $sortOpts['mainLabel'][$currentLanguage].":";
            ?>
        </p>
        <ul class="sort-options">
            <?php
            print $AZOption = "<li><a href='blog.php?sortType=title&lang={$currentLanguage}'>A-Z</a></li>";
            print $ZAOption = "<li><a href='blog.php?sortType=title&sortDir=reverse&lang={$currentLanguage}'>Z-A</a></li>";
            print $recentOption = "<li><a href='blog.php?sortType=date&sortDir=reverse&lang=${currentLanguage}'>" . $sortOpts['recentLabel'][$currentLanguage] . "</a></li>";
            print $oldOption = "<li><a href='blog.php?sortType=date&lang=${currentLanguage}'>" . $sortOpts['oldLabel'][$currentLanguage] . "</a></li>"
            ?>
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
    global $knowMore;
    global $publishedLabel;
    global $currentLanguage;

    $imgInHTML = "<div class=\"snippet\"><div class=\"img-container\"><img src=\"{$image}\"></div>";
    $titleInHTML = "<h2 class=\"title-teaser\">{$title}</h2>";
    $dateInHTML = "<p class=\"date\"> {$publishedLabel[$currentLanguage]} " .dateParser($date) ."</p>";
    $summaryInHTML = "<p class=\"summary\">" .textTrimmer($summary) ."... <em><a href=\"post.php?id={$id}&lang={$currentLanguage}\">{$knowMore[$currentLanguage]}</a></em></p></div>";

    $finalSnippet = $imgInHTML . $titleInHTML . $dateInHTML . $summaryInHTML;

    print $finalSnippet;

}

for ($i = 1; $i <= 5; $i++) {
    $api_url = "api/noticias/es/post_${i}.json";
    $json = file_get_contents($api_url);
    $data = json_decode($json);

    switch($sortType) {
        case 'title':
            $snippetArray[$i] = $data -> title -> $currentLanguage;
            continue;

        case 'date':
            $snippetArray[$i] = $data -> date;
            continue;

        default:
            turnToSnippet($data -> title -> $currentLanguage, $data -> date, $data -> description -> $currentLanguage, $data -> image, $i);
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

        turnToSnippet($data -> title -> $currentLanguage, $data -> date, $data -> description -> $currentLanguage, $data -> image, $key);

    }
}

?>
</div>
</body>
</html>