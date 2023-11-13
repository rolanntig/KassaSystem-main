<?php
    function console($data) {
        if (!empty($data)) {
            echo '<script>'.'console.log("'.$data.'")'.";</script>";
        }
    }
?>