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
    }
?>