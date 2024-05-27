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
</head>

<body>
    <?php include "../../shared/php/header.php"; ?>

    <main>

        <form method="POST" action="index.php" class="account_formulier">
            <label class="account_label_bold">Inloggen</label>

            <label for="gebruikersnaam">Gebruikersnaam</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam"required>

            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord"required>

            <a href="#" class="login_link_text right-align">Wachtwoord vergeten?</a>
            <input type="submit" name ="submit" value="Inloggen">

            <a href="../registratie/index.php" class="login_link_text left-align">Nog geen account? Maak een account.</a>
        </form>

    </main>

    <?php include "../../shared/php/footer.php"; ?>
</body>
</html>