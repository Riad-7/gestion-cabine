<?php

    // ------------------------------------------------------------------------------------------------- //

    $infoMiss = "username ou password incorect";
    $inputMiss = "Remplir tous les champs";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn'])) {
        if (!empty($_POST['username']) or !empty($_POST['password'])) {
            require_once "db-connexion\db.php";
            $stmt = $pdo -> prepare("SELECT * FROM admin WHERE username=? AND password=?");
            $stmt -> execute([$_POST['username'], $_POST['password']]);

            if ($stmt -> rowCount() >= 1) {
                session_start();
                $_SESSION['user'] = $stmt -> fetch();
                header("Location: admin.php");
            } else {
                echo $infoMiss;
            }
        } else {
            echo $inputMiss;
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de Connexion</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2980b9;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #2471a3;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Connexion</h2>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username"/>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password"/>
            </div>
            <button type="submit" name="btn" class="login-btn">Se connecter</button>
        </form>
    </div>

</body>

</html>