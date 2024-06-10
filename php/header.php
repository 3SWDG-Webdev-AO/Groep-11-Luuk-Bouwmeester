<header>
    <section class="header_logo">
        <img src="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/Groep-11-Luuk-Bouwmeester/img/pixel_playground_logo.png"; ?>" alt="Pixel Playground Logo">
    </section>

    <nav class="header_navigatie">
        <a href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/Groep-11-Luuk-Bouwmeester/"; ?>">Home</a>

        <?php
            session_start();
            // Controleer of de gebruiker is ingelogd
            if (isset($_SESSION['gebruikersnaam']) && isset($_SESSION['id'])) {
                // De gebruiker is ingelogd, laat de "Profiel" link zien
                echo '<a href="' . "http://" . $_SERVER["HTTP_HOST"] . "/Groep-11-Luuk-Bouwmeester/profiel.php" . '">Profiel</a>';
            } else {
                // De gebruiker is niet ingelogd, laat de "Login" link zien
                echo '<a href="' . "http://" . $_SERVER["HTTP_HOST"] . "/Groep-11-Luuk-Bouwmeester/login.php" . '">Login</a>';
            }
        ?>

        <a href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/Groep-11-Luuk-Bouwmeester/games.php"; ?>">Games</a>
        <a href="<?php echo "http://" . $_SERVER["HTTP_HOST"] . "/Groep-11-Luuk-Bouwmeester/vrienden.php"; ?>">Vrienden</a>
    </nav>
</header>