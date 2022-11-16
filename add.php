<?php

include "connect.php";
//to check if we're connected
if (!connect()) {
    die("You're not connected ");
}
//to check if the datas are set and  valid 
if (!isset($_POST["first_name"]) || !isset($_POST["last_name"]) || !isset($_POST["email"]) || !isset($_POST["gender"]) || !isset($_POST["table"]) || !isset($_POST["date"])) {
    die("ya haaj hott l datas! ");
}
//storing the datas coming from the form to make it easier on the sql code so 
$name = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$table = $_POST["table"];
$date = $_POST["date"];

$conn = connect();

//checking the existence of an already reserved table
$check = "SELECT * FROM reser where tawla='$table' and date='$date'";

if ($result = $conn->query($check)) {
    if ($result->num_rows > 0) {

        die("This table is already reserved ! choose for another day ! ");
    }
}
//sql request 
$req = "INSERT INTO reser VALUES('','$name','$lname' , '$email' , '$gender' , '$table', '$date')";

//checking the connecion response 
//verifying if it is saved or nah ! 
if ($conn->query($req)) {
    print("Done saving the datas :')! ");
} else {
    die("error saving the datas :'(");
}
