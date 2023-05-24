<?php

function getPosts() {

    $posts = [];

    for ($i = 1; $i <= 5; $i++) {
        $api_url = "api/noticias/es/post_${i}.json";
        $json = file_get_contents($api_url);
        $data = json_decode($json);

        $posts[]= $data -> description -> en;
    }

    header('Content-Type: application/json');
    print json_encode($posts);

}

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    getPosts();
}

?>