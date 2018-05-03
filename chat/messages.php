<div class="content">
<?php
try
{
	$connect = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root'); // Connexion à la base de donnée via MySQL
}
catch(Exception $error)
{
        die('Erreur : '.$error->getMessage()); // Si erreur l'afficher
}

$reponse = $connect->query('SELECT * FROM chat ORDER BY `id` DESC'); // On assigne a $reponse la commande MySQL qui demande de tout séléctioner dans la table chat et d'arranger par l'id (le plus haut sera situé en haut)

while ($reponse2 = $reponse->fetch())
{
?>
<?php echo $reponse2['date'] . " - <strong>" . $reponse2['pseudo'] . "</strong>: " .  $reponse2['message'] . "<br>" ?> <!-- On affiche la date, puis le pseudo et le message et on saute de ligne -->
<?php
}

$reponse->closeCursor(); // On ferme la connexion pour des raisons de sécurité

?>
</div>