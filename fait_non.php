<?php
require_once "db-connexion/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // On inverse l'état de la tâche
    $stmt = $pdo->prepare("UPDATE patiants SET etat = NOT etat WHERE id = ?");
    $stmt->execute([$id]);

    // Retour au dashboard
    header("Location: admin.php");
    exit;
}
