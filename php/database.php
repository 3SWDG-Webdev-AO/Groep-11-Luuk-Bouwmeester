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

        public function getLoginStatement($gebruikersnaam) {
            // Bereid de query voor
            $query = "SELECT * from gebruikers WHERE gebruikersnaam = '$gebruikersnaam'";

            // Prepare de query
            $statement = $this->pdo->prepare($query);
    
            // Voer de statement uit
            $statement->execute();
        
            // Return de statement zodat we die later kunnen gebruiken
            return $statement;
        }
        
        public function bestaatGebruiker($gebruikersnaam) {
            try {
                // Vang de login statement op
                $statement = $this->getLoginStatement($gebruikersnaam);
        
                // Row count is groter dan 0, er is dus een resultaat en de gebruikersnaam bestaat
                if ($statement->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                // Handle errors
                return "Foutmelding: " . $e->getMessage();
            }
        }
        
        public function login($gebruikersnaam, $wachtwoord) {
            // Vang de login statement op
            $statement = $this->getLoginStatement($gebruikersnaam);
        
            // Check of de gebruiker bestaat
            $gebruikerBestaat = $this->bestaatGebruiker($gebruikersnaam);
        
            if ($gebruikerBestaat === true) {
                //Verwerk resultaten
                $gebruiker = $statement->fetch(PDO::FETCH_ASSOC);
                $wachtwoord_database = $gebruiker["wachtwoord"];
        
                // Controleer of het wachtwoord overeenkomt
                if (password_verify($wachtwoord, $wachtwoord_database)) {
                    // Start de sessie en sla de gebruikersgegevens op
                    session_start();
                    $_SESSION["gebruikersnaam"] = $gebruiker["gebruikersnaam"];
                    $_SESSION["id"] = $gebruiker["id"];

                    return true;
                } else {
                    return "Login gefaald, wachtwoord is onjuist";
                }
            } else {
                return "Login gefaald, gebruikersnaam is niet gevonden";
            }
        }

        public function registreer($gebruikersnaam, $wachtwoord) {
            // Controleer of de gebruiker al bestaat, als die al bestaat stop dan
            if ($this->bestaatGebruiker($gebruikersnaam) === true) {
                return "Registreren gefaald, de gebruikersnaam is al in gebruik";
            }

            try {
                // 2 tot de macht 12 = 4096 encrypties
                $options = ["cost" => 12];

                // hash het wachtwoord
                $wachtwoord_encrypted = password_hash($wachtwoord, PASSWORD_BCRYPT, $options);

                // bereid de sql query voor
                $query = "INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('$gebruikersnaam', '$wachtwoord_encrypted')";

                // Prepare de query
                $statement = $this->pdo->prepare($query);

                // Voer de query uit
                $statement->execute();

                return true;
            } catch (PDOException $e) {
                // Handle errors
                return "Foutmelding: " . $e->getMessage();
            }
        }
    }
?>