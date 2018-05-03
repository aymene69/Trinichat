<link rel="stylesheet" type="text/css" href="chat/css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="chat/css/sweetalert.css">
<?php
if (isset($_POST['pseudoi']) && isset($_POST['mdpi']) && isset($_POST['mdpic']) && $_POST['pseudoi'] !== "" && $_POST['mdpi'] !== "" && $_POST['mdpic'] !== "") // On regarde si les champs ont été remplis
{
	if ($_POST['mdpi'] == $_POST['mdpic']) { // Si le mot de passe a bien été confirmé
    try
{
    $connect = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root'); // On se connecte a la base de donnée via MySQL
}

catch(Exception $e)
{
        die('Il y a une erreur...'.$error->getMessage()); // Si erreur l'afficher
}
$hashedpass = password_hash($_POST['mdpi'], PASSWORD_DEFAULT); // On hache le mot de passe pour des raisons de sécurité
$cmd = $connect->prepare('INSERT INTO users(pseudo, mdp) VALUES(:pseudo, :mdp)'); // On insère le pseudo et le mot de passe dans la table users
$cmd->execute(array(
	'pseudo' => $_POST['pseudoi'],
	'mdp' => $hashedpass,
	));

echo '<div class="header"><p>Vous avez été inscrit !</p></div>
<div class="f-modal-alert">
	<div class="f-modal-icon f-modal-success animate">
		<span class="f-modal-line f-modal-tip animateSuccessTip"></span>
		<span class="f-modal-line f-modal-long animateSuccessLong"></span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="2; URL=https://trinichat.ga/login.php">'; // Afficher qu'on a bien été inscrit et le V vert puis on va rediriger l'utilisateur vers le site principal
?>
<?php
	}
	else
	{
		echo '<div class="header"><p>Les mots de passes ne correspondent pas !</p><div class="f-modal-alert">
<div class="f-modal-icon f-modal-error animate">
		<span class="f-modal-x-mark">
			<span class="f-modal-line f-modal-left animateXLeft"></span>
			<span class="f-modal-line f-modal-right animateXRight"></span>
		</span>
		<div class="f-modal-placeholder"></div>
		<div class="f-modal-fix"></div>
	</div>
</div>
<meta http-equiv="refresh" content="5; URL=https://trinichat.ga/inscription.php"></div>'; // Sinon afficher que les mots de passes ne correspondent pas et le X rouge et rediriger vers le formulaire d'inscription
	}
}

else 
{
	echo '<div class="header"><p>Vous n\'avez pas renseigné tous les champs !</p></div>'; // Si rien n'est remplis, afficher qu'on n'a pas remplis tous les champs et le X rouge puis rediriger vers le formulaire d'inscription
	?>
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
<meta http-equiv="refresh" content="2; URL=http://trinichat.ga/inscription.php">
	<?php
}
?>