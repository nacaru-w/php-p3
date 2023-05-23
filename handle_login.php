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
<?php

$username = $_POST['username'];
$password = $_POST['password'];

$json = file_get_contents("users.json");
$data = json_decode($json);

if ($data -> Username == $username && password_verify($password, $data -> Password)) {
    print '<div class="warning"><p>' . $login['onSuccess'][$currentLanguage] . '</p></div>';
    $_SESSION['username'] = $username;
    exit;
}

print '<div class="warning"><p>' . $login['onFailure'][$currentLanguage] . '</p></div>';

?>
</body>