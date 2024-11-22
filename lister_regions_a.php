<?php
require_once('connexion.php');
$stmt = $connexion->prepare("SELECT * FROM region");
$stmt->setFetchMode(PDO::FETCH_OBJ);
// Les résultats retournés par la requête seront traités en 'mode' objet
$stmt->execute();
echo '<TABLE border = 2>';
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $stmt->fetch())
{
  // Affichage des champs noregion et nomregion de la table 'region'
  
    echo '<TR>';
        echo '<TD>'.$enregistrement->noregion.'</TD>';
        echo '<TD>'.$enregistrement->nomregion.'</TD>';
    echo '</TR>';
    
}echo '</TABLE>';
?>