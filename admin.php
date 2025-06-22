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
        <h2 style="display: inline;">Bonjour <h1 style="color: cornflowerblue; display: inline;"><?= $_SESSION['user']['username']; ?></h1></h2>
        <h2 style="color: cornflowerblue;" class="mt-4">Voici votre patients :</h2>
    </div>
    
    <table class="table container mt-4">
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
  <tbody>
    <tr></tr>
  </tbody>
</table>    
    

</body>

</html>