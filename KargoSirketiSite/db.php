<?php
session_start();

$conn = mysqli_connect("localhost","root","","kargo");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Bağlantı Başarılı";
}

?>
