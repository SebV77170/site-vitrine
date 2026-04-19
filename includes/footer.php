<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const menu = document.getElementById("menuPrincipal");
    const toggler = document.querySelector(".navbar-toggler");

    let timeout;

    function resetTimer() {
        clearTimeout(timeout);

        // Lance un nouveau timer de 5 secondes
        timeout = setTimeout(() => {
            // Si le menu est ouvert → on le ferme
            if (menu.classList.contains("show")) {
                const bsCollapse = bootstrap.Collapse.getInstance(menu)
                    || new bootstrap.Collapse(menu, { toggle: false });
                bsCollapse.hide();
            }
        }, 5000);
    }

    // Quand le menu s'ouvre → on démarre le timer
    menu.addEventListener("shown.bs.collapse", resetTimer);

    // Toute interaction dans le menu relance le timer
    menu.addEventListener("click", resetTimer);
    menu.addEventListener("mousemove", resetTimer);
    menu.addEventListener("touchstart", resetTimer);

    // Si on ferme manuellement → on annule le timer
    menu.addEventListener("hidden.bs.collapse", () => {
        clearTimeout(timeout);
    });
});
</script>
<footer>
    <a href="https://www.facebook.com/RessourceBrie-107609235066679/?view_public_for=107609235066679" target="_blank"><img class="facebook" src="image/pictoFacebook.png" alt="pictogramme facebook"></a>
    <p>« Un bon déchet reste cependant un déchet que l'on ne produit pas » ;-)</p>
    <p class="copyright" style="padding: 10px 0px">Copyright Jean-Luc Bernard - Toute reproduction interdite.</p>
    
    <!-- Cette dernière ligne de PHP permet de rajouter une ligne au footer en cas d'autre copyright sur une autre illustration -->
    
    <?php
        echo $linesupp;
    ?>
</footer> 
</body>