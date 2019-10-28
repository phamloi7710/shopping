<?php

if (!function_exists('page_title')) {
    /**
     * @return active
     */
    function renderClassActive($url, $location)
    {
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path);
        $first_part = $components[$location];
        if($first_part == $url)
        {
            return "active";
        }
    }
}
