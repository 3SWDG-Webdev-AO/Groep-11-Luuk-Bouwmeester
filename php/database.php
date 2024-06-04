<?php
    class Database {
        private $pdo;

        public function __construct() {
            // Database gegevens
            $host = "localhost";
            $dbname = "pixelplayground";
            $username = "root";
            $password = "";

            try {
                // Maak de PDO connectie
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                // Stel de foutafhandeling in
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Laat de foutmelding zien
                echo "Foutmelding: " . $e->getMessage();

                // Doe niks anders meer
                exit;
            }
        }

        public function sluitConnectie() {
            $this->pdo = null;
        }

        public function getGebruikers() {
            $query = "SELECT * FROM gebruikers ORDER BY id DESC";

            $result = $this->pdo->query($query);

            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getHighscores() {
            $query = "SELECT * FROM highscores ORDER BY timestamp DESC";
            
            $result = $this->pdo->query($query);
            
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function login($gebruikersnaam, $wachtwoord) {
            // Bereid de query voor
            $query = "SELECT * from gebruikers WHERE gebruikersnaam = '$gebruikersnaam'";

            // Prepare de query
            $statement = $this->pdo->prepare($query);
    
            // Voer de statement uit
            $statement->execute();
    
            // Controleer of we een resultaat hebben gevonden
            if ($statement->rowCount() == 1) {
                // Verwerk de resultaten
                $gebruiker = $statement->fetch(PDO::FETCH_ASSOC);
                $wachtwoord_database = $gebruiker["wachtwoord"];
    
                // Controleer of het wachtwoord overeenkomt
                if (password_verify($wachtwoord, $wachtwoord_database)) {
                    return true;
                } else {
                    return "Login gefaald, wachtwoord is onjuist";
                }
            } else {
                return "Login gefaald, gebruikersnaam is niet gevonden";
            }
        }
    }
?>