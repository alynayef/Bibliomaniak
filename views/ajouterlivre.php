<?php
$titrepage = 'BIBLIOTHEQUE DES MANIAQUES';
$soustitre = 'AJOUTER UN LIVRE';
$retour ='';
require_once ('entete.php')?>
    <form method="post">
        <center>
            <p>veuillez creer une reference inexistante</p>
            <br>REFERENCE DU LIVRE:  <input type="text" name="reference" id="reference"  placeholder="Reference" autofocus/><br>
            <br>NOM DU LIVRE:  <input type="text" name="nomlivre" id="nomlivre" placeholder="Nom de livre" autofocus/><br>
            <br>NOM DE L AUTEUR: <input type="text" name="nomauteur" id="nomauteur" placeholder="Nom de l'auteur" autofocus/><br>
            <br>DATE DE PUBLICATION: <input type="date" name="date" id="date" /><br>
            <br><input type="submit" name="ajouter" id="ajouter" value="AJOUTER" class="button bleue"/><br>
            <br><br><br>
        </center>
    </form>
</div>
</tbody>
</body>
</html>
