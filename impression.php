<?php

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

$imagePath = '';
$x = 10; // Coordonnée X de l'image sur la page
$y = 10; // Coordonnée Y de l'image sur la page
$width = 50; // Largeur de l'image en millimètres
$height = 0; // Hauteur de l'image en millimètres (0 pour conserver le ratio)

$pdf->Image($imagePath, $x, $y, $width, $height);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Votre nom');
$pdf->SetTitle('Estimation immobilière');
$pdf->SetSubject('Récapitulatif du formulaire');
$pdf->SetKeywords('Estimation immobilière, formulaire, récapitulatif');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

// Connexion à la base de données
$user = "root";
$mdp = "";
$db = "registration";
$sever = "localhost";

$conn = mysqli_connect($sever, $user, $mdp, $db);
if (!$conn) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

// Récupérer les données de la base de données
$sql = "SELECT * FROM clients ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $tel = $row['tel'];
    $ville = $row['ville'];
    $adresse = $row['adresse'];
    $superficie = $row['superficie'];
    $type = $row['type'];
    $email = $row['email'];
    $estimation = $row['estimation']; 
    $estimation = intval($superficie) * 10000; // Exemple simple : 1000 euros par m²
    $content = "
        <h2>Récapitulatif du formulaire</h2>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Prénom :</strong> $prenom</p>
        <p><strong>Téléphone :</strong> $tel</p>
        <p><strong>Ville :</strong> $ville</p>
        <p><strong>Adresse :</strong> $adresse</p>
        <p><strong>Superficie :</strong> $superficie</p>
        <p><strong>Type de bien :</strong> $type</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Votre montant est :</strong> $estimation fcfa</p>
    ";

    

    $pdf->writeHTML($content, true, false, true, false, '');
    $pdf->Output('formulaire.pdf', 'D');
} else {
    echo "Aucune donnée trouvée dans la base de données.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
