<?php
include 'sqlconfig.php';

function oyun_bilgileri($oyun_id) { 
    global $conn; 
    $sql = "SELECT * FROM oyunlar WHERE id = '{$oyun_id}'"; 
	
	$result = $conn->query($sql);     
    if ($result->num_rows > 0) { 
        return $result->fetch_assoc(); 
    } else {   
		return false;
    }
}


function oyunlari_getir($oyun, $baslik) {
    global $conn; //  
    $sql = "SELECT * FROM oyunlar WHERE oyun_tipi = '{$oyun}'"; 

	
	$result = $conn->query($sql); 
	
    if ($result->num_rows > 0) { 
        echo '<div class="movie-list-container">'; 
        echo '<h1 class="movie-list-title">' . $baslik . '</h1><br>';
        echo '<div class="movie-list-wrapper">';
        echo '<ul class="movie-list">';
        while ($row = $result->fetch_assoc()) { 
            echo '<li class="movie-item">';
            echo '<a href="oyun.php?id=' . $row["id"] . '">';
            echo '<div class="gamex">';
            echo '<img class="movie-item-img" src="' . $row["oyun_gorsel_kucuk"] . '" alt="" />';
            echo '</div>';
            echo '</a>';
            echo '<div class="movie-item-info">';
            echo '<span class="movie-item-title">' . $row["oyun_adi"] . '</span>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }    
}

function sql_baglantisini_kapat() {
    $conn->close();
} 
?>



