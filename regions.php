<html>
<body>

<?php

try {

    $dns = 'mysql:host=localhost;dbname=serre'; // dbname : nom de la base
    $utilisateur = 'root'; // root sur vos postes
    $motDePasse = ''; // pas de mot de passe sur vos postes
    $connexion = new PDO( $dns, $utilisateur, $motDePasse );
  } catch (Exception $e) {
    echo "Connexion à MySQL impossible : ", $e->getMessage();
    die();
  
  }

if(!isset($_POST['btnEnvoyer'])) 
{/* L'entrée btnEnvoyer est vide = le formulaire n'a pas été posté, on affiche le formulaire */
    echo '
    <form action="" method="post">
    Numero : <input type="text" name="txtNumero"><br>
    Nom region : <input type="text" name="txtNomregion"><br>
    <input type="submit" name="btnEnvoyer" value="Envoyer" >
    </form>';
}
else {
/* L'utilisateur a cliqué sur Envoyer, l'entrée btnEnvoyer <> vide, on traite le formulaire */
    $stmt = $connexion->prepare("INSERT INTO region (noregion, nomregion) VALUES (:noregion, :nomregion)");
    $noregion = $_POST["txtNumero"];
    $nomregion = $_POST["txtNomregion"];


    $stmt->bindValue(':noregion', $noregion, PDO::PARAM_INT);
    $stmt->bindValue(':nomregion', $nomregion, PDO::PARAM_STR);

    $stmt->execute();
    $nb_ligne_affectees = $stmt->rowCount();
    echo $nb_ligne_affectees." ligne() insérée(s).<BR>";
}
?>
</body>
</html>