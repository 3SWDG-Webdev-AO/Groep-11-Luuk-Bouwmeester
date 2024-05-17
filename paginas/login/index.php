<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Login pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, login">
    <title>Pixel Playground - Login</title>
    <link rel="stylesheet" type="text/css" href="../../shared/css/style.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <?php include "../../shared/php/header.php"; ?>

    <main>

        <form method="POST" action="index.php" class="login_formulier">
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam"required>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord"required>

            <input type="submit" name ="submit" value="Inloggen">
        </form>

    </main>

    <?php include "../../shared/php/footer.php"; ?>
</body>
</html>