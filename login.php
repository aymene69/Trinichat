<html>
<head>
<title>Connexion - Trinichat</title>
 
<link rel="stylesheet" type="text/css" href="chat/css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="chat/css/bg.css">
</head>
 
<body>
<div class="okk">
<div class="text">
<form action="loginv.php" method="post">
    <p>
    Pseudo :<input type="text" name="pseudoc" /><br> <!-- Formule de connexion (avec method="post" important pour récupérer les infos dans la page prochaine) -->
    Mot de passe :<input type="password" name="mdpc" /><br>
    <input type="submit" value="Valider" />
    </p>
</form>
</div>
</div>
</body>
</html>