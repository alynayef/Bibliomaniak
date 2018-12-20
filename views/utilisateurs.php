<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 24/11/2018
 * Time: 21:42
 */
$titrepage = 'GESTION UTILISATEURS';
$soustitre = 'GESTION UTILISATEURS';
require_once ('entete.php')?>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Pseudo</th>
            <th>Mot de passe</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($test as $utilisateur): ?>
            <form method="post">
                <tr>
                    <td><input type="text" name="nom[]" id="nom" value="<?=$utilisateur->getNom()?>" readonly/></td>
                    <td><input type="text" name="pseudo[]" id="pseudo" value="<?= $utilisateur->getPseudo()?>" readonly/></td>
                    <td><input type="password" name="mdp[]" id="mdp" value="<?=$utilisateur->getMdp()?>" /></td>
                    <td><input type="email" name="email[]" id="email" value="<?=$utilisateur->getEmail()?>" /></td>
                    <td><input type="submit" name="modifier[]" id="modifier" value="MODIFIER" class="button bleue"></td>
                    <td><input type="submit" name="supprimer[]" id="supprimer" value="SUPPRIMER" class="button rouge"></td>
            </form>
        <?php endforeach;?>

        </tbody>
    </table>
    <br>
    <br>
</div>
</body>
</html>
