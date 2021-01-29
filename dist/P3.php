<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/P3.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <title>KLoops</title>
</head>

<body>
    <header id="main-header">
        <div class="headings">
            <h1 class="bg-header">KL<span class="bg-header-text">∞</span>ps</h1>
            <h3 class="sm-header">A simple looping program</h3>
        </div>
    </header>
    <main class="main-content">
        <div class="number-content">
            <?php
            for ($i = 1; $i <= 9; $i++) {
                for ($j = 0; $j <= 9; $j++) {
                    if ($j === 0) {
                        echo "<span class='numbers p-tens'>" . $i . $j . " </span>";
                    } else {
                        echo "<span class='numbers'>" . $i . $j . " </span>";
                    }
                }
            }


            ?>
        </div>

    </main>
</body>

</html>