<link rel="stylesheet" type="text/css" href="css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
<?php
session_start(); //Nécessaire pour les cookies
    try
{
    $connect = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root'); // On se connecte a la base de donnée via MySQL
}

catch(Exception $e)
{
        die('Il y a une erreur...'.$error->getMessage()); // Si il y a une erreur, l'afficher
}

$cmd = $connect->prepare('INSERT INTO chat(pseudo, message, date) VALUES (:pseudo, :message, CURRENT_TIME());'); // On assigne a $cmd la commande qui va insérer dans chat dans la catégorie pseudo, message et date le pseudo, le message et l'heure actuelle

$cmd->execute(array(
    'pseudo' => $_SESSION['pseudo'], // On récupère le pseudo dans le cookie
    'message' => $_POST['message'], // On récupère le message de la dernière page visitée
    ));

echo '<div class="header"><p>Message envoyé !</p></div>' // On affiche bien que le message est envoyé
?>

<div class="f-modal-alert"> <!-- Le petit V vert qui s'affiche -->
	<div class="f-modal-icon f-modal-success animate">
		<span class="f-modal-line f-modal-tip animateSuccessTip"></span>
		<span class="f-modal-line f-modal-long animateSuccessLong"></span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="2; URL=https://trinichat.ga/chat/chat.php"> <!-- La page s'actualise après 2 seconde et se rend dans la page chat.php -->