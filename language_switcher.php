<?php

$currentLanguage = $_GET['lang'] ?? 'es';

function generateLanguageSwitcher($currentLanguage)
    {
        $languages = ['es', 'en'];  

        $switcher = '';
        foreach ($languages as $language) {
            $switcher .= '<li class="lang-opt"><a href="' . getUrlWithLang($language) . '"';
            if ($currentLanguage === $language) {
                $switcher .= ' class="active"';
            }
            $switcher .= '>' . strtoupper($language) . '</a></li>';
        }

        return $switcher;
    }

    function getUrlWithLang($language)
    {
        $url = $_SERVER['PHP_SELF']; 

        $query = $_SERVER['QUERY_STRING'];
        parse_str($query, $queryParams);
        $queryParams['lang'] = $language;
        $queryString = http_build_query($queryParams);

        if ($queryString) {
            $url .= '?' . $queryString;
        }

        return $url;
    }

    print generateLanguageSwitcher($currentLanguage);

?>