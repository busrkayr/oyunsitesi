<?php
function ust_header($baslik){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $baslik . '</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>';
}

function menu($logo, $anasayfa, $hakkimizda, $destek, $yonetici_paneli, $hesap_resim){
    echo '
    <div class="navbar">
        <div class="navbar-wrapper">
            <div class="logo-wrapper">
                <h1 class="logo">' . $logo . '</h1>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item active">
                        <a href="index.php">' . $anasayfa . '</a>   
                    </li>
                    <li class="menu-list-item">
                        <a href="hakkimizda.php">' . $hakkimizda . '</a>     
                    </li>    
                    <li class="menu-list-item">
                        <a href="iletisim.php">' . $destek . '</a>     
                    </li>
                    <li class="menu-list-item">
                        <a href="yonetici/index.php">' . $yonetici_paneli . '</a>     
                    </li>  
                </ul>
            </div>
            <div class="profile-container">
                <img class="profile-picture" src="' . $hesap_resim . '" alt="" />
                <div class="profile-text-container">
                    <span class="profile-text">Hesabım</span>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar"></div>';
}

function makale($resim, $icerik){
    echo '
    <div class="container">
        <div class="content-wrapper">
            <div class="featured-content">
                <img class="featured-title" src="' . $resim . '" alt="" />
                <p class="featured-desc">' . $icerik . '</p>
            </div>';
}
?>



