<?php

function render1($file, $data)
{
    require "application/views/" . $file ;
}


$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
include 'application/controllers/'.$uri_segments[2].'.php';
