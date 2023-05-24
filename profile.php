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
    <?php
    print "<div style='text-align: center;'>{$login['username'][$currentLanguage]}: <span style='font-weight: bold;'>{$username}</span></div>"
    ?>
</body>