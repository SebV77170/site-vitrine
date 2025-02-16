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
        <?php include("includes/nav.php"); ?>
        <article class="doc">
            
            <h1 id="telechargement">Téléchargement de documents</h1>
            <p class="even">Cliquez sur les liens suivants pour lire les documents :</p>
            <ul>
                <li id="statuts"><a href="mise-a-jour.php" target="_blank">Nos statuts</a></li>
                <li id="statuts"><a href="mise-a-jour.php" target="_blank">Notre règlement intérieur</a></li>
            </ul>
            
            <h2 style="color:red; text-align : center">Pour toute adhésion en vue de venir nous aider dans la gestion du local, merci de venir nous voir à celui-ci au 28 avenue Carnot.</h2>
            <h2 style="color:red; text-align : center">Pour les personnes souhaitant venir à la boutique, ou souhaitant venir déposer des objets, aucune adhésion n'est nécessaire.</h2>

            <h1 id="formucontact">Formulaire de contact</h1>
            <p class="odd">N'hésitez pas à nous laisser un petit message, nous répondrons aussi rapidement que possible.</p>
            <form method="post" action="Traitement.php">
                <fieldset>
                    <label for="adresse">Question concernant :</label>
                    <select id="adresse" name="adresse">
                        <option value="communication@ressourcebrie.fr">Nos supports de communication</option>
                        <option value="r.humaine@ressourcebrie.fr">Votre volonté de rejoindre nos équipes</option>
                        <option value="partenaire@ressourcebrie.fr">Un partenariat pour un atelier ou autre</option>
                        <option value="tresorier@ressourcebrie.fr">La trésorerie</option>
                        <option value="logistique@ressourcebrie.fr">Les aspects logistiques</option>
                        <option value="magasin@ressourcebrie.fr">Toutes autres demandes</option>
                    </select>

                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom">

                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom">

                    <label for="mail">Adresse E-mail :</label>
                    <input type="email" id="mail" name="mail">

                    <label for="message">Entrez votre message :</label>
                    <textarea id="message" name="message"></textarea>

                    <!-- Google reCAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6LdLk4wqAAAAAPbONvYtG4v9HeiyuO4qZ-OXPKxP"></div>
                </fieldset>

                <input type="submit" value="Envoyer">
            </form>

            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            
            <h1 id="newsletter">Inscription Newsletter</h1>
            
            <iframe  width="540" height="400" src="https://93d9536a.sibforms.com/serve/MUIEAAflfQzPP0q8pHfTXqAN536vYaALnU2SJjYUBK1xDOl8vRYQI7TULiW3YPOV1JiBtEMmQXqA7kF8UOZpUxhY_Hg5A7c61xYjFrDpJXlj_nZPSA2mirXjXAx0BC5xivKgbPA9neo-czfXuZnCzONLwP4OHRLj5CmBJS_FJSPZ3o-8UXkPwS-SB1VBQBXAQ9T65WKg5OMVp484" frameborder="0" scrolling="none" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;max-width: 100%; border: none;">
            </iframe>
                        
        </article>
        <?php
            $linesupp = NULL;
            include("footer.php");
        ?>
    </body>
</html>