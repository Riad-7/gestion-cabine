<?php
session_start();
require_once "db-connexion/db.php";

// Valeurs par défaut si pas définies
$_SESSION['color'] = $_SESSION['color'] ?? 'btn-success';
$_SESSION['completer'] = $_SESSION['completer'] ?? 'Marquer comme fait';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body class="container my-4">
  <div class="text-center">
    <?php
    $date = date("H");
    $salutation = ($date > 16) ? "Bonsoir" : "Bonjour";
    ?>
    <h2><?= $salutation ?> <span style="color: cornflowerblue;"><?= htmlspecialchars($_SESSION['user']['username']) ?></span></h2>
    <h4 class="mt-4 text-primary">Voici vos patients :</h4>
  </div>

  <div class="table-responsive mt-5">
    <table class="table table-hover table-bordered align-middle text-center">
      <thead class="table-light">
        <tr>
          <th>#ID</th>
          <th>Nom complet</th>
          <th>Nº CNI</th>
          <th>Adresse e-mail</th>
          <th>Téléphone</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Consultation</th>
          <th>Message / Symptômes</th>
          <th>Etat</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $infos = $pdo->query("SELECT * FROM patiants")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($infos as $info):
        ?>
          <tr>
            <td><?= $info['Id'] ?></td>
            <td><?= htmlspecialchars($info['name']) ?></td>
            <td><?= htmlspecialchars($info['cni']) ?></td>
            <td><?= htmlspecialchars($info['email']) ?></td>
            <td><?= htmlspecialchars($info['tele']) ?></td>
            <td><?= $info['date'] ?></td>
            <td><?= $info['time'] ?></td>
            <td><?= htmlspecialchars($info['consultation']) ?></td>
            <td><?= htmlspecialchars($info['text']) ?></td>
            <td>
              <a href="fait_non.php?id=<?= $info['Id']; ?>" class="btn <?= $info['etat'] ? 'btn-success' : 'btn-danger'; ?>">
                <?= $info['etat'] ? 'Compléter' : 'Pas encore'; ?>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>
