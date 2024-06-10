<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Profiel pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, profiel">
    <title>Pixel Playground - Profiel</title>
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
        ?>

        <!-- Logout button -->
        <a href="php/logout.php">Logout</a>

        <?php
            } else {
                // De gebruiker is niet ingelogd, terug naar de login pagina
                header("Location: login.php");
                exit;
            }
        ?>
    </main>

    <?php include "php/footer.php"; ?>
</body>
</html>