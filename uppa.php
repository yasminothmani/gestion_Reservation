<?php


include "./connect.php";
$conn = connect();

if (!connect()) {
    die("You're not connected ");
}
//to check if the datas are set and  valid 
if (!isset($_POST["first_name"]) || !isset($_POST["last_name"]) || !isset($_POST["email"])  || !isset($_POST["table"]) || !isset($_POST["date"])) {
    die("ya haaj hott l datas! ");
}
//storing the datas coming from the form to make it easier on the sql code so 
$name = $_POST["first_name"];
$lname = $_POST["last_name"];
$email = $_POST["email"];
$table = $_POST["table"];
$date = $_POST["date"];
$target = $_POST["target"];
/*
$check = "SELECT * FROM reser where  id <> '$target' and tawla='$table' and date='$date'";

if ($result = $conn->query($check)) {
    if ($result->num_rows > 0) {

        die("This table is already reserved ! choose foe another day ! ");
    }
}
 */
$req = "UPDATE reser SET name='$name', lname='$lname', email='$email', tawla='$table' ,date='$date' where id='$target'";

if ($conn->query($req)) {
    echo "updated successfully";
} else {
    die("Error updating ! ");
}
