<?php

$databa = null;

function getFullHost() {
    $protocole = $_SERVER['REQUEST_SCHEME'] . '://';
    $host = $_SERVER['HTTP_HOST'] . '/';
    $project = explode('/', $_SERVER['REQUEST_URI'])[1];
    return $protocole . $host . $project;
}

function public_url($url = '') {
    return getFullHost() . '/public/' . $url;
}

function require_controler($path) {
    require 'application/controller/' . $path . '.php';
}

function view_site($path = '') {
    return 'application/views' . $path . '.php';
}

function pre($list, $exit = true) {
    echo '<pre>';
    print_r($list);
    if ($exit) {
        die();
    }
}

function displayPhone($phone) {
    $phone = preg_replace("/[^\d]/", "", $phone);
    // get number length.
    $length = strlen($phone);
    if ($length == 10) {
        $phone = preg_replace("/^1?(\d{4})(\d{3})(\d{3})$/", "$1.$2.$3", $phone);
    }
    return $phone;
}

function get_date($time, $full_time = true) {
    $date = new DateTime($time);
    if ($full_time) {
        return $date->format('d-m-Y H:i:s');
    } else {
        return $date->format("d-m-Y");
    }
}

function get_month($time) {
    $format = '%m';
    $date = mdate($format, $time);
    return $date;
}

function get_rgetment($local) {
    $uri = $_SERVER["REQUEST_URI"];
    $uriArray = explode('/', $uri);
    return $page_url = $uriArray[$local];
}

function format_content($data) {
    $array_content = explode("-", $data);
    foreach ($array_content as $con) {
        echo '<br>';
        echo "<li>- " . $con . "</li>";
    }
}

function format_content_service($data) {
    $array_content = explode("enter", $data);
    foreach ($array_content as $con) {
        echo '<br>';
        echo "<li>- " . $con . "</li>";
    }
}
