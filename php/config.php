<?php

    if(session_id() == ''){
        session_start();
    }

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "cbr_opdracht";
    
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    }
    
    $con = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    ?>