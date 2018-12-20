<?php
$titrepage = 'historique des emprunt';
$soustitre = 'PROPOSER UN LIVRE';
require_once ('entete.php')?>
            <form method="post">
                <center>

                    <br>NOM DU LIVRE:      <input type="text" name="nomlivre" id="nomlivre" placeholder="renseigner le nom du livre"/><br>
                    <br>NOM DE L AUTEUR:   <input type="text" name="nomauteur" id="nomauteur" placeholder="renseigner le nom de l'auteur "/><br>
                    <br>DATE DE PUBLICATION:   <input type="date" name="date" id="date" /><br><br>
                    <br><input type="submit" name="proposer" id="proposer" value="PROPOSER" class="button bleue"/><br>
                    <br><br><br>
                </center>
            </form>
</div>
        </tbody>
</body>
</html>
