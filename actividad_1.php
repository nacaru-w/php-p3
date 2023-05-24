<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Actividad 1</title>
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
<?php

$api_url = "api/noticias/es/post_1.json";

$json= file_get_contents($api_url);
$data = json_decode($json);

?>

<div class="post">
    <h2 class="post-title"><?php print($data -> title -> es);?></h2>
    <div class="post-text"><p><?php print($data -> description -> es); ?></p></div>
</div>

<div class="post">
    <h2 class="post-title"><?php print($data -> title -> en);?></h2>
    <div class="post-text"><p><?php print($data -> description -> en); ?></p></div>
</div>
</body>
</html>
