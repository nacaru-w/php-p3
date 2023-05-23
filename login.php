<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página de login</title>
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
    <div class="login-screen">
        <?php print "<form action='handle_login.php?lang={$currentLanguage}' method='post'>"?>
            <label for="username">
                <?php print $login["username"][$currentLanguage] ?>
            </label>
            <input type="text" name="username" id="username" required>
            <label for="password">
                <?php print $login["password"][$currentLanguage]?>
            </label>
            <input type="password" name="password" id="password" required>
            <button type="submit">
                <?php print $login["submit"][$currentLanguage]?>
            </button>

        </form>
    </div>
</body>
</html>