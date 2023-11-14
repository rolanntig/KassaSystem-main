<?php

    if (!function_exists('console')) {
    function console($data) {
        echo '<script>'.'console.log("'.$data.'")'.";</script>";

    }

}

?>