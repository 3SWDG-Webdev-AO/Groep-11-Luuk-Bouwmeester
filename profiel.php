<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Games pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, games">
    <title>Pixel Playground - Games</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include "php/header.php"; ?>

    <main>

    <?php
        // Controleer of de gebruiker is ingelogd
        if (isset($_SESSION["gebruikersnaam"]) && isset($_SESSION["id"])) {
            // Vang info op
            $gebruikersnaam = $_SESSION["gebruikersnaam"];
            $id = $_SESSION["id"];

            // Echo gebruiker
            echo "Welkom, " . $gebruikersnaam . "!";
        } else {
            // De gebruiker is niet ingelogd, terug naar de login pagina
            header("Location: login.php");
            
            // Exit
            exit;
        }
    ?>

    <?php include "php/footer.php"; ?>
</body>
</html>