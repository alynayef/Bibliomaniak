<?php
$titrepage = 'BIBLIOTHEQUE DES MANIAQUES';
$soustitre = $_SESSION['user'];
$retour ='ok';
require_once ('entete.php')?>

  <div class="cards">

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]" data-link="proposer">
        <span>Proposer livre</span>
        <img src="public/ressources/sigin.png" height="42" width="42">
          <i class="fa fa-folder-o"></i>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]" data-link="deconnexion">
        <span>deconnexion</span>
        <img src="public/ressources/login.png" height="42" width="42">
        <i class="fa fa-folder-o"></i>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]" data-link="rechercher">
          <span>Rechercher</span>
          <img src="public/ressources/shearch.png" height="42" width="42">
          <i class="fa fa-folder-o"></i>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]" data-link="livre">
          <span>Voir Livre</span>
          <img src="public/ressources/livre.jpg" height="42" width="42">
        <i class="fa fa-folder-o"></i>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]" data-link="emprunter">
        <span>Emprunter</span>
          <img src="public/ressources/ob_69923a_bibliothecaire.png" height="42" width="42">
        <i class="fa fa-folder-o"></i>
      </div>
    </div>

    <div class=" card [ is-collapsed ] ">
      <div class="card__inner [ js-expander ]" data-link="rendre">
        <span>Rendre</span>
          <img src="public/ressources/retourner.png" height="42" width="42">
        <i class="fa fa-folder-o"></i>
      </div>
    </div>


  </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="public/js/index.js"></script>

</body>
</html>
