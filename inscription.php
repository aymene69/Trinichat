<html>
<head>
<title>Inscritpion - Trinichat</title>
 
<link rel="stylesheet" type="text/css" href="chat/css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="chat/css/bg.css">
</head>
 
<body>
<div class="okk">
<div class="text">
<form action="inscriptionv.php" method="post">
    <p>
    Pseudo :<input type="text" name="pseudoi" /><br>
    Mot de passe :<input type="password" name="mdpi" /><br> <!-- On affiche un formulaire qui demande un pseudo un mot de passe et confirmer le mot de passe (method="post" important pour les transmettre dans la prochaine page) et on affiche inscriptionv.php -->
    Confirmer le mot de passe :<input type="password" name="mdpic" /><br>
    <input type="submit" value="Valider" />
    </p>
</form>
</div>
</div>
</body>
</html>