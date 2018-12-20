<?php
$titrepage = 'GESTION DES LIVRES';
$soustitre = 'GESTION DES LIVRES';
$message = "Aucun livre n'a été proposé";
require_once ('entete.php')?>
<thead>
<tr>
    <th>id</th>
    <th>Nom de livre</th>
    <th>Reference</th>
    <th>Nom Auteur</th>
    <th>Date de publication</th>
    <th>Action</th>
</tr>
</thead>
<tbody>


<?php
$verif;
foreach ($test as $livre): ?>
    <form method="post">
        <tr>
            <td><input type="text" name="id[]" id="id" value="<?= $livre[0]; ?>" readonly/></td>
            <td><input type="text" name="reference[]" id="reference" placeholder="saisir la reference"/></td>
            <td><input type="text" name="nomLivre[]" id="nomLivre" value="<?= $livre[1]; ?>" readonly/></td>
            <td><input type="text" name="nomAuteur[]" id="nomAuteur" value="<?= $livre[2]; ?>" readonly/></td>
            <td><input type="text" name="date[]" id="date" value="<?= $livre[3] ?>" readonly/></td>
            <td><input type="submit" id="satisfait" name="satisfait[]" value='satisfaire proposition' class="button bleue"/></td>
    </form>
<?php
endforeach;

?>
</form>
</tbody>
</table>
</body>
</html>
