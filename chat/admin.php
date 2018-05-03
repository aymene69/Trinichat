<html>
<head>
	<title>Panel administrateur</title>
<link rel="stylesheet" type="text/css" href="css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="css/bg.css">
</head>
<body>
    <div class="okk"><div class="text">
    	<form class="content" action="panel.php" method="post">
		<p>
		Mot de passe :<input type="password" name="mdp" /> <!-- Formulaire pour accéder a la page panel.php si le mot de passe est correct (method="post" important pour récupérer le mot de passe dans la page prochaine) -->
		<input type="submit" value="Valider" />
		</p>
		</form>
    </div>
</div>
</body>
</html>