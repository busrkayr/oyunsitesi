<?php
$servername = "localhost";
$username = "adminisyeri";
$password = "aloneangel163";
$dbname = "oyunlar";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("MYSQL Bağlantısı sırasında bir hata meydana geldi. Hata içeriği : " . $conn->connect_error);
}
?>



