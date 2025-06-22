<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gestion_cabine", "root", "");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("ERROR DE CONNEXION".$e -> getMessage());
    }
?>