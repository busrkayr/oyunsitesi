<?php
include 'sqloyunlar.php'; 
include 'temaoyunlar.php'; 

$oyun_id = $_GET['id']; 
$oyun_bilgileri = oyun_bilgileri($oyun_id); 

$oyun_adi = $oyun_bilgileri["oyun_adi"]; 
$oyun_gorsel = $oyun_bilgileri["oyun_gorsel_buyuk"]; 
$oyun_video = $oyun_bilgileri["oyun_video"];   
$oyun_aciklama = $oyun_bilgileri["oyun_aciklama"];
$copy_mesaj = $oyun_bilgileri["oyun_copy_mesaj"];
$renk_kodu = $oyun_bilgileri["oyun_arkaplan_renk"];


ust_header_oyunlar($oyun_adi, $renk_kodu);
main_oyunlar($oyun_gorsel, $oyun_video, $oyun_aciklama, $copy_mesaj);

?>




