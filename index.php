<!DOCTYPE HTML>
<html lang="fr-FR">
    <head>
        <title>Page d'accueil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=5.0, minimum-scale=0.86">
        <link rel="stylesheet" href="style accueil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Roboto+Condensed&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="https://www.cloud.ressourcebrie.fr"><img class="logo" src="image/logorondredim.gif" alt="le logo de l'association" ></a>
            <h1 class="titre">RESSOURCE'BRIE</h1>
            <h2> La ressourcerie de Brie-Comte-Robert </h2> 
        </header>
        <div class="left"> 
            <a href="sommes.php"><p id="sommes" class="gauche bleu">Qui sommes-nous ?</p></a>
            <a href="ressourcerie.php"><p id="ressourcerie" class="gauche vert">Qu'est ce qu'une ressourcerie ?</p></a>
            <a href="projet.php"><p id="projet" class="gauche bleu">Le projet et son avancement</p></a>
            <img class="picto question" src="image/PictoQuiSommesNous.gif" alt="un oiseau avec un point d'interrogation">
            <img class="picto famille" src="image/PictoQuestion.gif" alt="une famille d'oiseau">
            <img class="picto avancement" src="image/PictoAvancement.gif" alt="un oiseau qui fait des travaux">
        </div>
        <img class="accueil" src="image/PageAccueil2redim.gif" alt="dessin d'un arbre et d'un batiment representant la ressourcerie">
        <div class="right"> 
            
            <a href="contact.php"><p id="contact" class="droite bleu">Contact, docs et adhésion</p></a>
            <a href="ouverture.php"><p id="ouverture" class="droite vert">Ouverture et informations</p></a>
            
            <img class="picto contactez" src="image/PictoContact.gif" alt="un oiseau au tel">
            <img class="picto ouverturez" src="image/PictoContact.gif" alt="un oiseau au tel">
        </div>
         <?php
        
          include('connexiondb_utf8.php');
          
          try{
            
            $sql = 'SELECT id, article FROM article_accueil ORDER BY id DESC';
            $selec = $connexion->prepare($sql);
            $selec->execute();
            $resultat = $selec->fetchAll(PDO::FETCH_ASSOC);
            
         
            
             foreach($resultat as $article){
              echo'<article class="actu">';
              echo nl2br($article[article]);
              echo'</article>';   
             }
            
            
          }
        
          catch(PDOException $e){
            echo 'une erreur s\'est produite : ' .$e->getMessage();
          }
        ?>
       
        <footer>
            <a href="https://www.facebook.com/RessourceBrie-107609235066679/?view_public_for=107609235066679" target="_blank"><img class="facebook" src="image/pictoFacebook.png" alt="pictogramme facebook"></a>
            <p>Copyright Jean-Luc Bernard - Toute reproduction interdite.</p>
        </footer>
    </body>
</html>