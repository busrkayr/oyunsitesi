<?php
function ust_header_oyunlar($oyun_adi, $renk_kodu){ 
	echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $oyun_adi . '</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        img {
            display: block;
            width: 100%;
            height: auto;
        }

        header {
            background-color: #' . $renk_kodu . ';
            color: white;
            text-align: center;
            padding: 10px;
        }

        main {
            padding: 20px;
        }

        p {
            text-align: justify;
        }

        footer {
            background-color: #' . $renk_kodu . ';
            color: white;
            text-align: center;
            padding: 20px;
            bottom: 0;
            width: 100%;
        }
    </style>
    </head>
    <body>
    <header>
    <h1>' . $oyun_adi . '</h1>
    </header>';
}

function main_oyunlar($oyun_gorsel, $oyun_video, $oyun_aciklama, $copy_mesaj){
    echo '
    <main>
    <div style="position: relative; width: 100%">
        <img
        src="' . $oyun_gorsel . '"
        alt=""
        style="width: 100%; height: auto"
    />
    <video
        width="620"
        height="340"
        controls
        style="position: absolute; bottom: 200px; left: 195px"
        autoplay
        muted
        playsinline
    >
    <source src="' . $oyun_video . '" type="video/webm" />
        Tarayıcınız bu video formatını desteklemiyor.
    </video>
    <p
        style="
        position: absolute;
        bottom: 0;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        "
    >
    ' . $oyun_aciklama . '
    </p>
    </div>
    </main>
    <footer>
    <p>&copy; ' . $copy_mesaj . '</p>
    </footer>
  </body>
</html>';
}
?>





