<?php
session_start();  
if (!isset($_SESSION["admin_logged_in"]) || !$_SESSION["admin_logged_in"]) { 

    header("Location: index.php"); 
    exit(); 
}
include '../sqlconfig.php';

if (isset($_POST['oyun_duzenle'])) { 
    $duzenle_id = $_POST['oyun_duzenle']; 
    $duzenle_oyun_tipi = $_POST['oyun_tipi_' . $duzenle_id]; 
    $duzenle_oyun_adi = $_POST['oyun_adi_' . $duzenle_id]; 
    $duzenle_oyun_gorsel_kucuk = $_POST['oyun_gorsel_kucuk_' . $duzenle_id];
    $duzenle_oyun_gorsel_buyuk = $_POST['oyun_gorsel_buyuk_' . $duzenle_id];
    $duzenle_oyun_video = $_POST['oyun_video_' . $duzenle_id];
    $duzenle_oyun_aciklama = $_POST['oyun_aciklama_' . $duzenle_id];
    $duzenle_oyun_copy_mesaj = $_POST['oyun_copy_mesaj_' . $duzenle_id];
    $duzenle_oyun_arkaplan_renk = $_POST['oyun_arkaplan_renk_' . $duzenle_id];     
    if(empty($duzenle_oyun_tipi) || empty($duzenle_oyun_adi) || empty($duzenle_oyun_gorsel_kucuk) || empty($duzenle_oyun_gorsel_buyuk) || empty($duzenle_oyun_video) || empty($duzenle_oyun_aciklama) || empty      ($duzenle_oyun_copy_mesaj) || empty($duzenle_oyun_arkaplan_renk)) {
        echo '<script>alert("Lütfen tüm alanları doldurun!");</script>'; 
    } else { 
		$duzenle_sorgu = "UPDATE oyunlar SET 
                        oyun_tipi = '$duzenle_oyun_tipi', 
                        oyun_adi = '$duzenle_oyun_adi', 
                        oyun_gorsel_kucuk = '$duzenle_oyun_gorsel_kucuk', 
                        oyun_gorsel_buyuk = '$duzenle_oyun_gorsel_buyuk', 
                        oyun_video = '$duzenle_oyun_video', 
                        oyun_aciklama = '$duzenle_oyun_aciklama', 
                        oyun_copy_mesaj = '$duzenle_oyun_copy_mesaj', 
                        oyun_arkaplan_renk = '$duzenle_oyun_arkaplan_renk' 
                        WHERE id = $duzenle_id";
        if ($conn->query($duzenle_sorgu) === TRUE) { 
            echo '<script>alert("Oyun başarıyla güncellendi!");</script>';
        } else { 
            echo "Hata: " . $duzenle_sorgu . "<br>" . $conn->error;  
        }
    }
}

if (isset($_POST["oyun_sil"])) { 
    $oyun_id = $_POST["oyun_sil"]; 
    $sil_sorgu = "DELETE FROM oyunlar WHERE id = $oyun_id";
    if ($conn->query($sil_sorgu) === TRUE) { 
        echo '<script>alert("Oyun başarıyla silindi!");</script>'; 
    } else {  
        echo "Hata: " . $sil_sorgu . "<br>" . $conn->error; 
    }
}

if (isset($_POST['yeni_oyun_ekle'])) { 
    $oyun_tipi = $_POST['yeni_oyun_tipi']; 
    $oyun_adi = $_POST['yeni_oyun_adi'];  
    $oyun_gorsel_kucuk = $_POST['yeni_oyun_gorsel_kucuk']; 
    $oyun_gorsel_buyuk = $_POST['yeni_oyun_gorsel_buyuk'];
    $oyun_video = $_POST['yeni_oyun_video']; 
    $oyun_aciklama = $_POST['yeni_oyun_aciklama'];
    $oyun_copy_mesaj = $_POST['yeni_oyun_copy_mesaj'];
    $oyun_arkaplan_renk = $_POST['yeni_oyun_arkaplan_renk'];
    if(empty($oyun_tipi) || empty($oyun_adi) || empty($oyun_gorsel_kucuk) || empty($oyun_gorsel_buyuk) || empty($oyun_video) || empty($oyun_aciklama) || empty($oyun_copy_mesaj) || empty($oyun_arkaplan_renk)) {

		echo '<script>alert("Lütfen tüm alanları doldurun!");</script>';
    } else { 
        $insert_query = "INSERT INTO oyunlar (oyun_tipi, oyun_adi, oyun_gorsel_kucuk, oyun_gorsel_buyuk, oyun_video, oyun_aciklama, oyun_copy_mesaj, oyun_arkaplan_renk) 
        VALUES ('$oyun_tipi', '$oyun_adi', '$oyun_gorsel_kucuk', '$oyun_gorsel_buyuk', '$oyun_video', '$oyun_aciklama', '$oyun_copy_mesaj', '$oyun_arkaplan_renk')";
        if ($conn->query($insert_query) === TRUE) { 
            echo '<script>alert("Yeni oyun başarıyla eklendi!");</script>'; 
        } else {
            echo "Hata: " . $insert_query . "<br>" . $conn->error; 
        }
    }
}

$query = "SELECT * FROM oyunlar"; 
$result = $conn->query($query); 
$form = '<form action="#" method="post"> 
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Oyun Tipi</th>
                    <th>Oyun Adı</th>
                    <th>Oyun Görsel Küçük</th>
                    <th>Oyun Görsel Büyük</th>
                    <th>Oyun Video</th>
                    <th>Oyun Açıklama</th>
                    <th>Oyun Copy Mesaj</th>
                    <th>Oyun Arkaplan Renk</th>
                    <th></th>
                    <th></th>
                </tr>';

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {  
        $form .= '<tr>
                    <td><label for="id">' . $row['id'] . '</label></td>
                    <td><input type="text" name="oyun_tipi_' . $row['id'] . '" value="' . $row['oyun_tipi'] . '"></td>
                    <td><input type="text" name="oyun_adi_' . $row['id'] . '" value="' . $row['oyun_adi'] . '"></td>
                    <td><input type="text" name="oyun_gorsel_kucuk_' . $row['id'] . '" value="' . $row['oyun_gorsel_kucuk'] . '"></td>
                    <td><input type="text" name="oyun_gorsel_buyuk_' . $row['id'] . '" value="' . $row['oyun_gorsel_buyuk'] . '"></td>
                    <td><input type="text" name="oyun_video_' . $row['id'] . '" value="' . $row['oyun_video'] . '"></td>
                    <td><input type="text" name="oyun_aciklama_' . $row['id'] . '" value="' . $row['oyun_aciklama'] . '"></td>
                    <td><input type="text" name="oyun_copy_mesaj_' . $row['id'] . '" value="' . $row['oyun_copy_mesaj'] . '"></td>
                    <td><input type="text" name="oyun_arkaplan_renk_' . $row['id'] . '" value="' . $row['oyun_arkaplan_renk'] . '"></td>
                    <td><button type="submit" name="oyun_duzenle" value="' . $row['id'] . '" class="edit-button" onclick="return confirm(\'Bu oyunu düzenlemek istediğinize emin misiniz?\')">Düzenle</button></td>
                    <td><button type="submit" name="oyun_sil" value="' . $row['id'] . '" class="delete-button" onclick="return confirm(\'Bu oyunu silmek istediğinize emin misiniz?\')">Sil</button></td>
				</tr>';				
    }
} else { 
    $form .= '<tr><td colspan="9">Tabloda herhangi bir veri bulunamadı.</td></tr>';
}
$form .= '<tr>
            <td><label for="yeni_oyun_tipi"><font color="#45a049">Yeni Ekle</font></label></td>
            <td><input type="text" name="yeni_oyun_tipi" value=""></td>
            <td><input type="text" name="yeni_oyun_adi" value=""></td>
            <td><input type="text" name="yeni_oyun_gorsel_kucuk" value=""></td>
            <td><input type="text" name="yeni_oyun_gorsel_buyuk" value=""></td>
            <td><input type="text" name="yeni_oyun_video" value=""></td>
            <td><input type="text" name="yeni_oyun_aciklama" value=""></td>
            <td><input type="text" name="yeni_oyun_copy_mesaj" value=""></td>
            <td><input type="text" name="yeni_oyun_arkaplan_renk" value=""></td>
            <td><input type="submit" name="yeni_oyun_ekle" value="Yeni Oyun Ekle"></td>
            </tr>';

$conn->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/yoneticipanel.css">
    <title>Oyunlar Tablosu</title> 
</head>
<body>
    <?php echo $form; ?>
    <div style="text-align: center;">
    <p><a class="exit-button" href="cikis.php">Yönetim panelinden çıkış yapmak için tıklayın.</a></p> 
	</div>
    <br><br><br>
</body>
</html>



