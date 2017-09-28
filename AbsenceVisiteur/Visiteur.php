<?php include "entete.html";?>
<?php include "menu.html";?>

<div>
	Ajouter un visiteur:

	<form action="traitementVisiteur.php" method="post">
<p>
    <label> Id : <input type="text" name="id" /></label></br>
    <label>Nom : <input type="text" name="nom" /></label></br>
    <input type="submit" value="Valider" />
</p>
</form>
