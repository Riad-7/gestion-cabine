<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashbord</title>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>

<body class="container">
  <div style="text-align: center;">
    <?php
    $date = date("H");
    if ($date > 16) {
    ?>
      <h2 style="display: inline;">Bonjour <h1 style="color: cornflowerblue; display: inline;"><?= $_SESSION['user']['username']; ?></h1>
      </h2>
    <?php
    } else { ?>
      <h2 style="display: inline;">Bonsoir <h1 style="color: cornflowerblue; display: inline;"><?= $_SESSION['user']['username']; ?></h1>
      </h2>
    <?php
    }
    ?>
    <h2 style="color: cornflowerblue;" class="mt-4">Voici votre patients :</h2>
  </div>

  <table class="table container mt-5">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Nom complet</th>
        <th scope="col">Nº CNI</th>
        <th scope="col">Adresse e-mail</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Date</th>
        <th scope="col">Heure</th>
        <th scope="col">Type de consultation</th>
        <th scope="col">Message / Symptômes</th>
      </tr>
    </thead>
    <?php
    require_once "db-connexion/db.php";
    $infos = $pdo->query("SELECT * FROM patiants")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($infos as $info) {
    ?>
      <tbody>
        <td scope="col"><?php echo $info['Id'] ?></td>
        <td scope="col"><?php echo $info['name'] ?></td>
        <td scope="col"><?php echo $info['cni'] ?></td>
        <td scope="col"><?php echo $info['email'] ?></td>
        <td scope="col"><?php echo $info['tele'] ?></td>
        <td scope="col"><?php echo $info['date'] ?></td>
        <td scope="col"><?php echo $info['time'] ?></td>
        <td scope="col"><?php echo $info['consultation'] ?></td>
        <td scope="col"><?php echo $info['text'] ?></td>
      </tbody>
    <?php
    }

    ?>

  </table>


</body>

</html>
