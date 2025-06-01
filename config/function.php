<?php

function base_url($url = null)
{
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
    if ($url != null) {
        return $base_url . $url;
    } else {
        return $base_url;
    }
}
