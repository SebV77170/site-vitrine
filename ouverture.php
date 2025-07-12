<!DOCTYPE HTML>
<html lang="fr-FR">
    <?php include("includes/head.php");
    include('actions/db.php');?>
    <body>
        <?php
            $lineheight = "uneligne";
            $src = 'image/PictoContact.gif';
            $alt = 'un oiseau au telephone';
            $titre = 'Horaires d\'ouverture et informations';
            $page = 6;
            include("includes/header.php");
        ?>
        <?php include("includes/nav.php");
        ?>
        <article class="doc">
            
            <?php
                $months = [
                'January'=>'Janvier',
                'February'=>'Février',
                'March'=>'Mars',
                'April'=>'Avril',
                'May'=>'Mai',
                'June'=>'Juin',
                'July'=>'Juillet',
                'August'=>'Aout',
                'September'=>'Septembre',
                'October'=>'Octobre',
                'November'=>'Novembre',
                'December'=>'Décembre'];
                
                $days = [
                'Monday'=>'Lundi',
                'Tuesday'=>'Mardi',
                'Wednesday'=>'Mercredi',
                'Thursday'=>'Jeudi',
                'Friday'=>'Vendredi',
                'Saturday'=>'Samedi',
                'Sunday'=>'Dimanche'];
                
                $datetoday=new DateTime('now');
                $datein2months=new DateTime('now + 2 months');
                $sql = 'SELECT start, end FROM events WHERE cat_creneau = 0 AND public = 1 ORDER by start ASC';
                $sth = $db->query($sql);
                $results = $sth->fetchALL();
            ?>
            
            <h1>Les jours d'ouvertures sur les 2 prochains mois.</h1>

            <h1 style="background-color: #fd7e14; color: white; padding: 1em; text-align: center; font-size: 1.5em; border-radius: 8px;">
  🔥 Canicule : dépôts fermés lors des alertes orange (ou plus) pour la sécurité de tous. Merci pour votre compréhension.
</h1>



            
            <h1 class="alert">Fermeture estivale du 11/08/25 au 31/08/25 inclus. Réouverture le lundi 01 Septembre 2025. Les dépôts ne reprendront que la semaine d'après, le 08 Septembre 2025. Bonnes vacances à tous !</h1>
            
            <table class='tableauouverture'>
                <tr class='ligneouverture'>
                    <th class='celluleheadouverture'>Date</th>
                    <th class='celluleheadouverture'>Heure d'ouverture</th>
                    <th class='celluleheadouverture'>Heure de fermeture</th>
                    <th class='celluleheadouverture'></th>
                </tr>
        
        <?php 
            
            foreach($results as $v){
                $datetimestart = new DateTime(''.$v['start'].'');
                $datetimeend = new DateTime(''.$v['end'].'');

                //essai pour utiliser la fonction sub mais je n'ai pas réussi du coup, 17:30 est passé dans mess1 sans calcul
                //$intervalle30min = new DateInterval('P30M');
                //$datetimeend30min = $datetimeend->sub($intervalle30min);
                
                $date = $datetimestart->format('l-d-F-Y');
                $datefrench = explode('-', $date);
                $semaine = $datetimestart->format('W');
                $test = $semaine/2;
                if(is_int($test)):
                    $mess="Vente uniquement";
                    $mess1="";
                else:
                    $mess="Vente + dépot";
                    $mess1="Limite Dépôt 17:30";
                endif;
                
                
                foreach($days as $k=>$v):
                    if($k==$datefrench[0]):
                        $datefrench[0]=$v;
                    endif;
                endforeach;
                foreach($months as $k=>$v):
                    if($k==$datefrench[2]):
                        $datefrench[2]=$v;
                    endif;
                endforeach;
                $datefrench=implode(' ',$datefrench);
                $heurestart = $datetimestart->format('G:i');
                $heureend = $datetimeend->format('G:i');   
                if($datetimeend>$datetoday AND $datetimeend<$datein2months):
                        echo '<tr>
                        
                            <td class="celluleouverture">'.$datefrench.'</td>
                            <td class="celluleouverture">'.$heurestart.'</td>
                            <td class="celluleouverture">'.$heureend.' - '.$mess1.'</td>
                            <td class="celluleouverture">'.$mess.'</td>
                            

                            
                          </tr>'  ;
                endif;
        }
        ?>
            </table>
        
        <h1>Les objets acceptés.</h1>
        
        <p class='odd justify'>
            Etant donné notre petite équipe, nous acceptons les objets de petites tailles (transportables à une personne), en bonne état de fonctionnement. Nous prenons tous types d'objet, mais nous insistons sur le fait que nous ne sommes pas une déchèterie.
            Les vêtements apportés doivent être propres, et en bon état. Les jeux de sociétés doivent être complets (ou il faut signaler les pièces manquantes) afin que ceux-ci puissent être réutilisés. Pour tout objet, il faut se poser la question : 
        </p>
        <p class="but">EST-CE QUE JE POURRAIS L'ACHETER ET L'UTILISER SANS SOUCI ?</p>
        <p class='even justify'>
            Si vous souhaitez vous décharger de gros objets, comme des gros meubles, vous pouvez toujours nous contacter et nous envoyer une photo, afin de faire le point directement avec vous. En effet, la place ainsi que la main d'oeuvre n'étant pas infinie, chaque gros objet doit avoir été autorisé au préalable. 
        </p>
        <p class='odd justify'>
            Nous ne pouvons pas nous déplacer chez vous pour venir retirer les objets. Les seules objets que nous acceptons pour le moment concernent vos apports volontaires à la ressourcerie sur les jours et horaires d'ouverture.
        </p>
            
        </article>
        <?php
            $linesupp = NULL;
            include("footer.php");
            ?>
    </body>
</html>