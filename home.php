<html>

<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Bienvenue sur notre site</h1>
<form action="register.php" method="post">
    <label for="email">Adresse email :</label>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="S'inscrire">
</form>
<br><br>
<form action="login.php" method="post">
    <label for="username">Nom d'utilisateur admin :</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Mot de passe admin :</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Se connecter en tant qu'admin">
</form>
</body>
</html>
