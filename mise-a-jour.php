<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <title>Documents en cours de mise à jour</title>
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
            $titre = 'Documents en cours de mise à jour';
            include("includes/header.php");
            $page = 5;
        ?>
        <?php include("includes/nav.php"); ?>
        <article class="doc">
            <h1>Documents en cours de mise à jour</h1>
            <p>Les documents que vous cherchez sont actuellement en cours de mise à jour. Merci de revenir plus tard.</p>
        </article>
        <?php
            $linesupp = NULL;
            include("footer.php");
        ?>
    </body>
</html>