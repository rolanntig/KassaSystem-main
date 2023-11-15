<?php
function getCashiers($persons)
{
    $string = "";
    foreach ($persons as $person) {
        $username = $person['username'];
        $lastLogin = $person['last_login'];
        $string .= "
        <tr>
            <td>$username</td>
            <td id='cell'>$lastLogin</td>
            <td>
                <button class='btn btn-primary' id='editBtn'>Edit</button>
                <button class='btn btn-danger' id='deleteBtn'>Delete</button>
                <button class='btn btn-success' id='showBtn'>Show</button>
            </td>
        </tr>";
    }
    echo $string;
}
