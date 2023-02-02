<nav>
    <div class="table">
        <ul>
            <li id="sommes" class="bleu"><a href="forum.php">Les discussions</a></li>
            <li id="ressourcerie"class="vert" ><a href="my-questions.php">Mes publications</a></li>
            <li id="projet" class="bleu"><a href="publish-question.php">Publier une question</a></li>
            <?php
            if(isset($_SESSION['auth'])){
                ?>
                <li id="evenement" class="vert"><a href="actions/users/logoutAction.php">Logout</a></li>
                <?php
            }
            ?>
            
        </ul>
    </div>
</nav>