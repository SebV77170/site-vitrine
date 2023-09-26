<nav>
    <div class="table">
        <ul>
            <li id="sommes" <?php if($page == 1){echo 'class="vert"';}else{echo 'class="bleu"';} ?>><a href="sommes.php">Qui sommes-nous ?</a></li>
            <li id="ressourcerie"<?php if($page == 2){echo 'class="vert"';}else{echo 'class="bleu"';} ?>><a href="ressourcerie.php">Qu'est ce qu'une ressourcerie ?</a></li>
            <li id="projet" <?php if($page == 3){echo 'class="vert"';}else{echo 'class="bleu"';} ?>><a href="projet.php">Le projet et son avancement</a></li>
            <li id="evenement" <?php if($page == 6){echo 'class="vert"';}else{echo 'class="bleu"';} ?>><a href="ouverture.php">Ouvertures du local</a></li>
            
            <li id="contact" <?php if($page == 5){echo 'class="vert"';}else{echo 'class="bleu"';} ?>><a href="contact.php">Contact, docs et adhésion</a></li>
        </ul>
    </div>
</nav>