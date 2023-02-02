<!DOCTYPE HTML>
<html lang="fr-FR">
    <?php include("includes/head.php"); ?>
    <body>
        <?php
            $lineheight = "deuxlignes";
            $src = 'image/PictoQuestion.gif';
            $alt = 'un oiseau avec un point d\interrogation';
            $titre = 'Qu\'est-ce qu\'une ressourcerie ?';
            $page = 2;
            include("includes/header.php");
        ?>
        <?php include("includes/nav.php");
        ?>
        <article>
            
            <p class="odd"> N’avez-vous pas des objets dans votre maison, votre garage ou votre grenier que vous n’avez pas envie de <strong>jeter</strong> et qui vous encombrent ? La <strong>ressourcerie</strong> est faite pour ça. Notre objectif ? Faire en sorte que ces <strong>objets</strong> soient
            utiles à d’autres, en les remettant en état et en les revendant à <strong>bas prix</strong>.
            </p>
            <p class="even">Une <strong>ressourcerie</strong>, c’est :
            <ul>
                <li>Une structure ancrée dans le territoire, à proximité des lieux de vie ;</li>
                <li>Une structure créatrice de nouveaux emplois non délocalisables ;</li>
                <li>Un espace boutique, des <strong>ateliers de bricolage</strong> et/ou <strong>créatifs</strong>, un lieu d’échange ;</li>
                <li>Une <strong>sensibilisation</strong> des populations aux <strong>enjeux écologiques</strong>.</li>
            </ul>
            </p>
            <h1>Comment ça marche ?</h1>
            <p style="text-align: center" class="odd">Une <strong>ressourcerie</strong> fonctionne selon 4 axes principaux qui sont :</p>
            <ul id="marche">
                <li class="but even"><strong>Collecter</strong></li>
                <li class="but odd"><strong>Valoriser</strong></li>
                <li class="but even"><strong>Distribuer</strong></li>
                <li class="but odd"><strong>Sensibiliser</strong></li>
            </ul>
             <p style="text-align: center" class="even">Voici un petit dessin explicatif :</p>
            <img class="explication" src="image/ressourcerie.png">
            <p class="even">Afin de bien comprendre, imaginez-vous sur une île déserte. <strong>Des déchets</strong> arrivent par l'océan mais deviennent 
            une vraie <strong>ressource</strong> capable de suppléer les éléments naturels présents sur l'île. Ces déchets peuvent alors vous être utiles, pour vous
            construire un abri ou des outils par exemple.
            </p>
            <p class="but odd">C'est le but de la <strong class="changevision">ressourcerie</strong> : changer la vision de tous sur ce qu'est un <strong class="changevision">déchet</strong>.</p>
        </article>
        <?php
            $linesupp = '<p class="copyright" style="padding-bottom: 10px">Illustrations <a class="copyright" href="https://fr.dreamstime.com/homme-des-activités-ménage-réparation-en-divers-personnages-dessin-animé-vecteur-situations-d-appartement-réglés-image116073395" target="blank">116073395</a>,
            <a class="copyright" href="https://fr.dreamstime.com/caissière-détail-femme-à-checkout-contre-vendeuse-supermarché-l-appartement-intérieur-achat-uniforme-m-image141145436" target="blank">141145436</a>
            © <a class="copyright" href="https://fr.dreamstime.com/microvone_info" target="blank">Microvone</a> | <a class="copyright" href="https://fr.dreamstime.com/" target="blank">Dreamstime.com</a>
            </p>';
            include("footer.php");
            ?>
    </body>
</html>