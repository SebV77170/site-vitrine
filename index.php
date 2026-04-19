<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <title>Page d'accueil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
        <link rel="stylesheet" href="style-accueil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Roboto+Condensed&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="site-header">
            <a href="https://www.cloud.ressourcebrie.fr" class="logo-link">
                <img class="logo" src="image/logorondredim.gif" alt="le logo de l'association">
            </a>

            <div class="header-titles">
                <h1 class="titre">RESSOURCE'BRIE</h1>
                <h2>La ressourcerie de Brie-Comte-Robert</h2>
            </div>
        </header>

        <main class="home-layout">
            <div class="menu-column menu-left">
                <a href="sommes.php" class="menu-item">
                    <img class="picto" src="image/PictoQuiSommesNous.gif" alt="un oiseau avec un point d'interrogation">
                    <p class="menu-button bleu">Qui sommes-nous ?</p>
                </a>

                <a href="ressourcerie.php" class="menu-item">
                    <img class="picto" src="image/PictoQuestion.gif" alt="une famille d'oiseau">
                    <p class="menu-button vert">Qu'est ce qu'une ressourcerie ?</p>
                </a>

                <a href="projet.php" class="menu-item">
                    <img class="picto" src="image/PictoAvancement.gif" alt="un oiseau qui fait des travaux">
                    <p class="menu-button bleu">Le projet et son avancement</p>
                </a>
            </div>

            <div class="home-image-wrap">
                <img class="accueil" src="image/PageAccueil2redim.gif" alt="dessin d'un arbre et d'un batiment representant la ressourcerie">
            </div>

            <div class="menu-column menu-right">
                <a href="contact.php" class="menu-item">
                    <img class="picto" src="image/PictoContact.gif" alt="un oiseau au téléphone">
                    <p class="menu-button bleu">Contact, docs et adhésion</p>
                </a>

                <a href="ouverture.php" class="menu-item">
                    <img class="picto" src="image/PictoContact.gif" alt="un oiseau au téléphone">
                    <p class="menu-button vert">Ouverture et informations</p>
                </a>
            </div>
        </main>

        <footer>
            <a href="https://www.facebook.com/RessourceBrie-107609235066679/?view_public_for=107609235066679" target="_blank" rel="noopener noreferrer">
                <img class="facebook" src="image/pictoFacebook.png" alt="pictogramme facebook">
            </a>
            <p>Copyright Jean-Luc Bernard - Toute reproduction interdite.</p>
        </footer>
    </body>
</html>