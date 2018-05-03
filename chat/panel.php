<html>
<head>
    <title>Panel administrateur</title>
<link rel="stylesheet" type="text/css" href="css/main.css"> <!-- On importe les styles -->
<link rel="stylesheet" type="text/css" href="css/bg.css">
</head>
<body>
    <div class="okk"><div class="text">
        <p>Bienvenue sur le panel administrateur !</p>
<?php
try
{
    $connect = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', 'root'); // On se connecte à la base de donnée
}
catch(Exception $error)
{
        die('Erreur : '.$error->getMessage()); // Si erreur l'afficher
}

if(!empty($_POST['envoyer'])) {
    $connect->query('TRUNCATE TABLE `chat`'); // Si le bouton précédant à été cliqué, alors éxecuter la commande TRUNCATE TABLE chat (vider la table chat)
    echo "Messages supprimés !";
    ?>
    <meta http-equiv="refresh" content="2"; URL="https://trinichat.ga/chat/panel.php/"> <!-- Actualiser la page -->
    <?php
}
?>
 
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> <!-- Execute les commandes PHP pour qu'il réagit avec le code PHP ci dessus -->
    <input type="submit" id="envoyer" name="envoyer" value="Supprimer tous les messages"> <!-- Affiche le bouton pour supprimer le message -->
<form>
    </div>
</div>
</body>
</html> 