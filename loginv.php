<link rel="stylesheet" type="text/css" href="chat/css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="chat/css/sweetalert.css">
<?php
if (isset($_POST['pseudoc']) && isset($_POST['mdpc']) && $_POST['pseudoc'] !== "" && $_POST['mdpc'] !== ""){ // On vérifie si les champs ne sont pas vide
    try
{
    $connect = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root'); // On se connecte à la base de donnée via MySQL
}

catch(Exception $error){
        die('Il y a une erreur... '.$error->getMessage()); // Si erreur l'afficher
}
$cmd = $connect->prepare('SELECT pseudo, mdp FROM users WHERE pseudo = :pseudo'); // Demander de récupérer le pseudo et le mdp dans la table users
$cmd->execute(array(
	'pseudo' => $_POST['pseudoc'], // assigner pseudo au pseudo écris dans la page précédente
	));
$resultat = $cmd->fetch(); // Comparer les pseudos et continuer
$isPasswordCorrect = password_verify($_POST['mdpc'], $resultat['mdp']); // Vérifier si les mots de passes correspondent au pseudo choisi
if (!$resultat) // Si ils ne correspondent pas
{
    echo '<div class="header"><p>Informations de connexions incorrectes !</p><div class="f-modal-alert">
<div class="f-modal-icon f-modal-error animate"> 
		<span class="f-modal-x-mark">
			<span class="f-modal-line f-modal-left animateXLeft"></span>
			<span class="f-modal-line f-modal-right animateXRight"></span>
		</span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="5; URL=http://trinichat.ga/login.php"></div>'; // Afficher que les informations sont incorrectes et le V vert
}
else
{
    if ($isPasswordCorrect) {
    	session_start(); // Nécessaire pour les cookies
        $_SESSION['pseudo'] = $_POST['pseudoc']; // On créée un cookie avec le pseudo choisi plus tôt à l'intérieur
        echo '<div class="header"><p>Vous avez été connecté ' . $_SESSION['pseudo'] . ' !</p></div>
<div class="f-modal-alert">
	<div class="f-modal-icon f-modal-success animate">
		<span class="f-modal-line f-modal-tip animateSuccessTip"></span>
		<span class="f-modal-line f-modal-long animateSuccessLong"></span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="2; URL=https://trinichat.ga/chat/">'; // On affiche que l'utilisateur s'est connecté et le V vert

    }
    else {
        echo '<div class="header"><p>Informations de connexions incorrectes !</p><div class="f-modal-alert">
<div class="f-modal-icon f-modal-error animate">
		<span class="f-modal-x-mark">
			<span class="f-modal-line f-modal-left animateXLeft"></span>
			<span class="f-modal-line f-modal-right animateXRight"></span>
		</span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="5; URL=http://trinichat.ga/login.php"></div>'; // On affiche que les informations sont incorrectes et le X rouge
    }
}
}
else  // Si rien n'a été rentré, on affiche qu'aucun champ n'a été renseigné
{
	echo '<div class="header"><p>Vous n\'avez pas renseigné tous les champs !</p></div>
<div class="f-modal-alert">
<div class="f-modal-icon f-modal-error animate">
		<span class="f-modal-x-mark">
			<span class="f-modal-line f-modal-left animateXLeft"></span>
			<span class="f-modal-line f-modal-right animateXRight"></span>
		</span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="2; URL=http://trinichat.ga/login.php">'; // On redirige vers la page de connexion et on affiche le X rouge
}
?>