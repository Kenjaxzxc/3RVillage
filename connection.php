<?php
$conn = mysqli_connect("localhost", "root", "", "3rvillage");
if(!$conn){
    die("Connection failed ".mysqli_connect_error());
}
