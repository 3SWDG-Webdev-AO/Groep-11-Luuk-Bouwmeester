<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta name="description" content="Vrienden pagina van Pixel Playground">
    <meta name="author" content="L. Bouwmeester">
    <meta name="keywords" content="pixel, playground, games">
    <title>Pixel Playground - Vrienden</title>
    <link rel="stylesheet" type="text/css" href="../../shared/css/style.css">
</head>

<body>
    <?php include "../../shared/php/header.php"; ?>

    <main>

        <?php
            // Gegevens van de database
            $host = "localhost";
            $dbname = "pixelplayground";
            $username = "root";
            $password = "";

            try {
                // Connect d.m.v. pdo
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                // Set pdo error mode
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Bereid de query voor
                $query = "SELECT * FROM gebruikers ORDER BY id DESC";

                // Voer de query uit
                $result = $pdo->query($query);

                // Fetch de gebruikers
                $gebruikers = $result->fetchAll(PDO::FETCH_BOTH);

                // Kijk of we wel gebruikers zijn
                if(count($gebruikers) > 0) {
                    // Loop door alle gebruikers
                    foreach($gebruikers as $gebruiker) {
                        echo $gebruiker["gebruikersnaam"];
                    }
                } else {
                    echo "Geen gebruikers gevonden!";
                }
            } catch (PDOException $e) {
                // Catch error
                echo "Foutmelding: " . $e->getMessage();
            }

            // Sluit connectie
            $pdo = null;
        ?>





    </main>

    <?php include "../../shared/php/footer.php"; ?>
</body>
</html>