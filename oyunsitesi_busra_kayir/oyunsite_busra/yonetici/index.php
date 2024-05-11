<?php
session_start(); 
include '../sqlconfig.php';   
global $conn; 

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = $_POST["kullanici_adi"]; 
    $password = $_POST["sifre"]; 
    $sql = "SELECT * FROM admin WHERE kullanici_adi = '$username' AND sifre = '$password'";  
    $result = $conn->query($sql); 
    if ($result->num_rows == 1) { 
        $_SESSION["admin_logged_in"] = true; 
        header("Location: yoneticipanel.php"); 
    } else { 
        $error_message = "Kullanıcı adı veya şifre yanlış!"; 
    }
} 
?>

<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi</title>
    <link rel="stylesheet" href="../css/yoneticigiris.css">
    <style>
        .error-message {
            color: rgba(205, 92, 92, 0.8);
            text-align: center;
        }
    </style>
</head>

    <form action="index.php" method="post"> 
        <?php 
        if (!empty($error_message)) { 
            echo '<p class="error-message">' . $error_message . '</p>';  
        }
        ?>
        <h2> Yönetici Girişi </h2>
        <br>
        <label for="kullanici_adi">Kullanıcı Adı</label>
        <input type="text" name="kullanici_adi" required>
        <label for="sifre">Şifre</label>
        <input type="password" name="sifre" required>
        <br><br>
        <input type="submit" value="Giriş Yap">
        <p><a class="exit-button" href="../index.php">Anasayfa'ya Dön</a></p>
    </form>
</body>
</html>
