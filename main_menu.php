<?php 
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

function linkBuilder($fileName, $optionName, $language) {
    return "<li><a href='{$fileName}?lang={$language}'>" . $optionName . "</a></li>";
}
?>

<div class="menu-options">
    <ul class="menu-list">
        <?php
        print linkBuilder("blog.php", $navMenu["home"][$currentLanguage], $currentLanguage);
        print linkBuilder("actividad_1.php", "Act 1", $currentLanguage);
        print linkBuilder("nada", "API", $currentLanguage);
        if (!isset($_SESSION['username'])) {
            print linkBuilder("login.php", $navMenu["login"][$currentLanguage], $currentLanguage);
        }
        print linkBuilder("nada", $navMenu["profile"][$currentLanguage], $currentLanguage);
        print linkBuilder("nada", $navMenu["logout"][$currentLanguage], $currentLanguage);
        print "<li class='greeting'>{$greeting[$currentLanguage]}, {$username}</li>";
        ?>
    </ul>
</div>