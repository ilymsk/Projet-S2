<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="test.css"/>
	</head>
	<body>
		<?php

try
{
	// On se connecte à MySQL
  $bdd = new PDO('mysql:host=localhost;dbname=Users;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Utilisateurs ORDER BY Score DESC');

// On affiche chaque entrée une à une

?>
<table>
   <thead>
     <tr>
       <th>Pseudo</th>
       <th>Score</th>
     </tr>
   </thead>
   <tbody>
     <?php while ($donnees = $reponse->fetch()) : ?>
     <tr>
       <td><?php echo $donnees['Pseudo']; ?></td>
       <td><?php echo $donnees['Score']; ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>

<?php


$reponse->closeCursor(); // Termine le traitement de la requête

?>
</body>
</html>
