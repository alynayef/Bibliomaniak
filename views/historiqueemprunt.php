<?php

$titrepage = 'historique des emprunt';
$soustitre = 'HISTORIQUE DES LIVRES EMPRUNTER';
require_once ('entete.php')?>


    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>Reference du livre</th>
            <th>Nom du Client</th>
            <th>Nom de livre</th>
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
                    <td><input type="text" name="pseudo[]" id="pseudo" value="<?= $livre[2]; ?>" readonly/></td>
                    <td><input type="text" name="nomlivre[]" id="nomlivre" value="<?= $livre[3] ?>" readonly/></td>
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
