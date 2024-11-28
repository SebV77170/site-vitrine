<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <title>Contact et docs.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=5.0, minimum-scale=0.86">
        <link rel="stylesheet" href="base.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Roboto+Condensed&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            $lineheight = "uneligne";
            $src = 'image/PictoContact.gif';
            $alt = 'un oiseau au telephone';
            $titre = 'Contact et docs.';
            include("includes/header.php");
        ?>
        <?php include("includes/nav.php"); ?>
        
        <!--Pour créer une fonction de sécurisation des champs saisis par l'utilisateur. Empèche la saisi de caractères spéciaux html, ou la saisi d'espaces intempestifs par exemple -->
        
        <?php
$prenom = $nom = $mail = $message = "";

function securisation($donnees) {
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}

$prenom = securisation($_POST['prenom']);
$nom = securisation($_POST['nom']);
$mail = securisation($_POST['mail']);
$message = securisation($_POST['message']);
$adresse = $_POST['adresse'];

// Vérification du reCAPTCHA
$recaptcha_secret = '6LdLk4wqAAAAAODISf3PIkqwk-2fnuwMnomxh93q';
$recaptcha_response = $_POST['g-recaptcha-response'];

$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
$recaptcha = json_decode($recaptcha);

if ($recaptcha->success && isset($message)) {
    $position_arobase = strpos($mail, '@');
    if ($position_arobase === false) {
        echo '<p>Attention, votre email n\'est pas valide, l\'adresse doit comporter un arobase. Veuillez cliquer <a href="contact.php">ici</a> pour corriger, merci.</p>';
    } else {
        $retour = mail($adresse, 'Envoi depuis la page Contact', $message, 'From: ' . $mail);
        if ($retour) {
            echo '<p style="text-align: center">Merci ' . $prenom . ' pour votre intérêt pour notre projet. Votre message a bien été envoyé. Nous vous répondrons dès que possible. À bientôt !</p>';
        } else {
            echo '<p>Erreur.</p>';
        }
    }
} else {
    echo '<p>Erreur de vérification reCAPTCHA. Veuillez réessayer.</p>';
}
?>



        <?php
            $linesupp = NULL;
            include("footer.php");
            ?>
    </body>
</html>