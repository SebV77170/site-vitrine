<!DOCTYPE HTML>
<html lang="fr-FR">
    <?php include("includes/head.php"); ?>
    <body>
        <?php
            $lineheight = "uneligne";
            $src = 'image/PictoContact.gif';
            $alt = 'un oiseau au telephone';
            $titre = 'Contact, docs et adhésion';
            $page = 5;
            include("includes/header.php");
        ?>
        <?php include("includes/nav.php");
        ?>
        <article class="doc">
            
            <h1>Téléchargement de documents</h1>
            <p class="even">Cliquez sur les liens suivants pour lire les documents :</p>
            <ul>
                <a href="documents/statuts.pdf" target="_blank"><li id="statuts">Nos statuts</li></a>
                <a href="documents/Appel_benevoles.pdf" target="_blank"><li id="adhesion">Appel bénévoles</li></a>
                <a href="documents/Bulletin_annee_complete.pdf" target="_blank"><li id="statuts">Bulletin d'adhésion pour l'année 2023</li></a>
                <a href="documents/Bulletin_sept-dec.pdf" target="_blank"><li id="adhesion">Bulletin d'adhésion pour Sept-Déc</li></a>
            </ul>
            
            <h1>Formulaire de contact</h1>
            <p class="odd"> N'hésitez pas à nous laisser un petit message, nous répondrons aussi rapidement que possible.</p>
            <form method="post" action="Traitement.php">
                
                <fieldset>
                    
                    <label for="adresse">Question concernant : </label>
                    <select id="adresse" name="adresse">
                        <option value="communication@ressourcebrie.fr">Nos supports de communication</option>
                        <option value="r.humaine@ressourcebrie.fr">Votre volonté de rejoindre nos équipes</option>
                        <option value="partenaire@ressourcebrie.fr">Un partenariat pour un atelier ou autre</option>
                        <option value="tresorier@ressourcebrie.fr">La trésorerie</option>
                        <option value="logistique@ressourcebrie.fr">Les aspects logistiques</option>
                        <option value="contact@ressourcebrie.fr">Toutes autres demandes</option>
                    </select>
            
                    <label for="prenom">Prénom : </label>
                    <input type="text" id="prenom" name="prenom">
            
                    <label for="nom">Nom : </label>
                    <input type="text" id="nom" name="nom">
            
                    <label for="mail">Adresse E-mail : </label>
                    <input type="email" id="mail" name="mail">
            
                    <label for="message">Entrez votre message : </label>
                    <textarea id="message" name="message"></textarea>
                
                </fieldset>
            
                <input type="submit" value="Envoyer">
                
            </form>
            
            <h1>Formulaire d'adhésion à l'association</h1>
            
            <iframe id="iframe_assoconnect" src="https://ressource-brie.assoconnect.com/collect/description/263609-b-formulaire-d-adhesion-a-la-ressource-brie?iframe=1" width="75%" style="overflow: hidden; border: 0; max-height: none;" scrolling="no";">
            </iframe>
            <script>window.addEventListener("message", function(event) {if(event.data.action === "iframe.height" && event.origin === "https://ressource-brie.assoconnect.com"){document.getElementById("iframe_assoconnect").height = event.data.height;}});
            </script>
            <style>#iframe_assoconnect{border: 0}
            </style>
            
            <h1 id="newsletter">Inscription Newsletter</h1>
            
            <iframe width="540" height="400" src="https://93d9536a.sibforms.com/serve/MUIEAAflfQzPP0q8pHfTXqAN536vYaALnU2SJjYUBK1xDOl8vRYQI7TULiW3YPOV1JiBtEMmQXqA7kF8UOZpUxhY_Hg5A7c61xYjFrDpJXlj_nZPSA2mirXjXAx0BC5xivKgbPA9neo-czfXuZnCzONLwP4OHRLj5CmBJS_FJSPZ3o-8UXkPwS-SB1VBQBXAQ9T65WKg5OMVp484" frameborder="0" scrolling="none" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;max-width: 100%; border: none;">
            </iframe>
            
            
            
            
            
            
            
        </article>
        <?php
            $linesupp = NULL;
            include("footer.php");
            ?>
    </body>
</html>