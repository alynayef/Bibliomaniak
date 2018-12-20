<?php
$titrepage = 'GESTION DES LIVRES';
$soustitre = 'GESTION DES LIVRES';
require_once ('entete.php')?>
        <thead>
        <tr>
            <th>Reference</th>
            <th>Nom du Livre</th>
            <th>Nom de l Auteur</th>
            <th>Disponibilite</th>
            <th>Date de Publication</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($test as $livre): ?>
        <form method="post">
            <tr>
            <td><input type="text" name="reference[]" id="reference" value="<?=$livre->getReference()?>" readonly/></td>
            <td><input type="text" name="nomlivre[]" id="nomlivre" value="<?= $livre->getNomLivre()?>" /></td>
            <td><input type="text" name="nomauteur[]" id="nomauteur" value="<?=$livre->getNomAuteur()?>" /></td>
            <td><input type="text" name="disponibilite[]" id="disponibilite" value="<?=$livre->getDisponibilite()?>" /></td>
            <td><input type="date" name="date[]" id="date" value="<?= $livre->getDatePublication()?>" /></td>
                <td><input type="submit" name="modifier[]" id="modifier" value="MODIFIER" class="button bleue"></td>
            <td><input type="submit" name="supprimer[]" id="supprimer" value="SUPPRIMER" class="button rouge"></td>
        </form>
            <?php endforeach;?>
            <form method="post">
                <br><input type="submit" name="ajouter" id="ajouter" value="AJOUTER UN LIVRE" class="button vert"/><br><br>
            </form>

        </tbody>
    </table>
    <br>
    <br>
</div>
</body>
</html>
