<?php
$titrepage = 'GESTION DES LIVRES';
$soustitre = 'GESTION DES LIVRES';
$message = "vous n'avez aucun livre a rendre";
require_once ('entete.php')?>
    <thead>
    <tr>
        <th>id</th>
        <th>Reference du livre</th>
        <th>Nom du Client</th>
        <th>Nom de livre</th>
        <th>Reçu</th>
    </tr>
    </thead>
    <tbody>


        <?php
        $verif;
        foreach ($test as $livre): ?>
    <form method="post">
        <tr>
            <td><input type="text" name="id[]" id="id" value="<?= $livre[0]; ?>" readonly/></td>
            <td><input type="text" name="reference[]" id="reference" value="<?= $livre[1]; ?>" readonly/></td>
            <td><input type="text" name="pseudo[]" id="reference" value="<?= $livre[2]; ?>" readonly/></td>
            <td><input type="text" name="livre[]" id="livre" value="<?= $livre[3] ?>" readonly/></td>
            <td><input type="submit" id="rendre" name="rendre[]" value='Rendre' class="button bleue"/></td>
    </form>
            <?php
            endforeach;

            ?>
    </form>
    </tbody>
</table>
    </div>
</body>
</html>
