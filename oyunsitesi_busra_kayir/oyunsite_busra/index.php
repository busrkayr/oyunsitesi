<?php
include 'tema.php';
include 'sqloyunlar.php';

ust_header("Oyun Sitesi");
menu("Game Glare", "Ana Sayfa", "Hakkımızda", "Destek", "Yönetim Paneli", "img/busra.jpg");
makale("img/dnm3.jpg", "Genç bir serseri, inzivaya çekilmiş bir banka soyguncusu ve ürkütücü
            bir psikopat, kendilerini suç dünyasının, ABD hükümetinin ve eğlence
            sektörünün karışık ağlarında buluyor. Kendileri de dahil, hiç
            kimseye güvenemedikleri acımasız bir şehirde tehlikeli soygunlar
            yapmayı başarmak zorundalar.");

oyunlari_getir("populer", "Popüler");
oyunlari_getir("gundem", "Gündemdekiler");
oyunlari_getir("onecikan", "Öne Çıkanlar");
?>



