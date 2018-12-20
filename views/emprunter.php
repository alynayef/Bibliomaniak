<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 24/11/2018
 * Time: 21:16
 */
$titrepage = 'EMPRUNTER';
$soustitre = 'EMPRUNTER UN LIVRE';
require_once ('entete.php')?>

    <thead>
    <tr>
        <th>Reference</th>
        <th>Nom du Livre</th>
        <th>Nom de l Auteur</th>
        <th>Date de Publication</th>
        <th>Emprunter un Livre</th>
    </tr>
    </thead>
    <tbody>



    <?php
    foreach ($test as $livre): ?>
        <form method="post">
    <tr>
        <td><input type="text" name="reference[]" id="reference" value="<?= $livre->getReference() ?>" readonly/></td>
        <td><input type="text" name="nomlivre[]" id="nomlivre" value="<?= $livre->getNomLivre() ?>" readonly/></td>
        <td><input type="text" name="nomauteur[]" id="nomauteur" value="<?= $livre->getNomAuteur() ?>" readonly/></td>
        <td><input type="date" name="date[]" id="date" value="<?= $livre->getDatePublication() ?>" readonly/></td>
        <td><input type="submit" name="emprunter[]" id="emprunter" value="EMPRUNTER" class="button vert"/></td>
    </form>
            <?php
            endforeach;
            ?>

    </tbody>
</table>
</body>
</html>
