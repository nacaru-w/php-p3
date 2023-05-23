<?php 
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
        print linkBuilder("nada", $navMenu["login"][$currentLanguage], $currentLanguage);
        print linkBuilder("nada", $navMenu["profile"][$currentLanguage], $currentLanguage);
        print linkBuilder("nada", $navMenu["logout"][$currentLanguage], $currentLanguage);
        ?>
    </ul>
</div>