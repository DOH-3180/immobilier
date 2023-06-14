<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">



</head>
<body>
 <header> 
<h1>FAITE VOTRE EXPERTISE</h1>
 <p><a href="maman.html">Cliquez ici pour voire notre site</a></p>
 </header> 
<form action="pa.php" method="GET">
    <fieldset>
        <legend>Faite votre expertise</legend>
    <label>Nom</label><input type="text" name="nom" placeholder="Votre Nom"/><br>
    <label>Prenom</label><input type="text" name="prenom" placeholder="Votre Prenom"/><br>
    <label>telephone</label><input type="number" name="phone" placeholder="Votre numero telephone"/><br>
    <label>Ville</label><input type="text" name="ville" placeholder="Votre Ville"/><br>
    <label>Adresse</label><input type="text" name="adresse" placeholder="Votre Adresse"/><br>
    <label>Superficie Rechercher</label><input type="number" name="Superficie" placeholder="en m2"/><br>
    <label>Type Immobilier</label><input type="text" name="type" placeholder="Ecrivez votre choix"/><br>
    <label>Email</label><input type="email" name="mail" placeholder="Votre Email"/><br>
    <input type="submit" name="envoyer" value="Valider"/>
</fieldset>
</form>
</body>
</html>

