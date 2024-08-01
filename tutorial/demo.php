<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next MCU Movie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);



curl_close($ch);
?>

<body>
    <!-- <pre>
        <?php var_dump($data); ?>
    </pre> -->
    <header>
        When is the next MCU film?
    </header>
    <section>
        <div>
            <h3><?= $data["title"] . " releases in " . $data["days_until"] . " days!" ?></h3>
            <h4>Release date: <?= $data["release_date"] ?></h4>
            <h4>Production type: <?= $data["type"] ?></h4>
            <h4>What's next? <?= $data["following_production"]["title"] ?></h4>
            <img src="<?= $data["poster_url"] ?>" alt="">
        </div>
    </section>
    <footer>
        Made by "David Abed" &copy; 2024
    </footer>
</body>

</html>

<style>
    body {
        text-align: center;
        padding: 4px;
    }

    header {
        font-size: xx-large;
        font-weight: bold;
        width: 100%;
        background: #000;
    }
    img{
        border-radius: 20px;
        max-width: 350px;
    }

    div {
        margin-top: 1em;
        display: flex;
        flex-direction: column;
        place-items: center;
        gap: .5em;
    }

    pre {
        max-width: 80ch;
    }
</style>