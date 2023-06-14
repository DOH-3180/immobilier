<!DOCTYPE html>
<html>
<head>
    <title>Estimation immobilière - Résultat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Résultat de l'estimation</h1>
    
    <?php 
    // Vérifier si le formulaire a été soumis
    if (isset($_GET['envoyer'])) {
        // Récupérer les valeurs du formulaire
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $tel = $_GET['phone'];
        $ville = $_GET['ville'];
        $adresse = $_GET['adresse'];
        $superficie = $_GET['Superficie'];
        $type = $_GET['type'];
        $mail = $_GET['mail'];
        
        $estimation = intval($superficie) * 10000; // Exemple simple : 10000 fcfa par m²
        
        // Afficher les informations de l'utilisateur dans un tableau
        echo '<table>';
        echo '<tr><td>Nom</td><td>' . $nom . '</td></tr>';
        echo '<tr><td>Prénom</td><td>' . $prenom . '</td></tr>  <br>';
        echo '<tr><td>Téléphone</td><td>' . $tel . '</td></tr>';
        echo '<tr><td>Ville</td><td>' . $ville . '</td></tr>';
        echo '<tr><td>Adresse</td><td>' . $adresse . '</td></tr>';
        echo '<tr><td>Superficie recherchée</td><td>' . $superficie . ' m²</td></tr>';
        echo '<tr><td>Type immobilier</td><td>' . $type . '</td></tr>';
        echo '<tr><td>Email</td><td>' . $mail . '</td></tr>';
        echo '<tr><td>Montant total</td><td>' . $estimation . ' frcfa</td></tr>';
        echo '</table>';

        // Insérer les informations dans la base de données
        // Assurez-vous de configurer correctement votre connexion à la base de données
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'registration';

        // Créer une connexion à la base de données
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué: " . $conn->connect_error);
        }

        // Préparer la requête SQL pour l'insertion des données
        $sql = "INSERT INTO clients(nom, prenom, tel, ville, adresse, superficie, type, email, estimation)
                VALUES ('$nom', '$prenom', '$tel', '$ville', '$adresse', '$superficie', '$type', '$mail', '$estimation')";

        // Exécuter la requête SQL
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Erreur lors de l'insertion des informations dans la base de données: " . $conn->error;
        }

        // Fermer la connexion à la base de données
        $conn->close();

        
        // Afficher le lien de téléchargement du PDF
        echo ' <div class="pdf">
        <p><a href="client.php">modification ici</a></p>
         <p><a href="impression.php?nom=' . $nom . '&prenom=' . $prenom . '&tel=' . $tel . '&ville=' . $ville . '&adresse=' . $adresse . '&superficie=' . $superficie . '&type=' . $type . '&mail=' . $mail . '&estimation=' . $estimation . '">Télécharger le PDF</a></p>;
        </div>'; 
    }
    ?>
</body>
</html>
