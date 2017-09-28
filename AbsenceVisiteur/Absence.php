<?php include "entete.html"; ?>
<?php include "menu.html";?>

<div>
	Ajouter une absence:

	<?php
	$bdd = new PDO('mysql:host=localhost;dbname=TP_visiteur;charset=utf8',
					'jeremy', 'linux');

					$reponse = $bdd->query('
						SELECT NomVisiteur
				FROM Visiteur
				');

echo'<form action="traitementAbsence.php" method="post">'
,'<p><label for="le_nom">Sélectionner un visiteur : </label><select name ="choixVisiteur"><option selected> ';
while ($donnees = $reponse->fetch())
{

echo'<option>'. $donnees['NomVisiteur'];
}
$reponse->closeCursor();
?>
</select></p>
<p><label>Nombre de jours : <input type="text" name="nombreJours" /></label></p></br>
<?php
$reponse = $bdd->query('
	SELECT libelleMotif
FROM Motif
');

echo'<p><label for="le_nom">Sélectionner un motif : </label><select name ="choixMotif"><option selected>';
while ($donnees = $reponse->fetch())
{

echo'<option>'. $donnees['libelleMotif'];
}
$reponse->closeCursor();
?>
</select></p>
<p><label>Ajouter un motif : <input type="text" name="ajoutMotif" /></label></p)>
	<input type="submit" value="Valider" />
</form>
</div>
