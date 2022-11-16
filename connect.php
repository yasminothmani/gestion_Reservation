<?php

function connect()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tablereservation";

    $conn = new mysqli($servername, $username, $password, $dbname);

    return $conn;
}

/*

    if (connect()) {
        print("Hello world");
    }
    else {
        die (mysql_error());  
    }

*/