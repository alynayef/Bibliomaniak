<?php
$titrepage = 'ADMINITRATEUR';
$soustitre = 'LES LIVRES DE BIBLIOMANIAK';
require_once ('entete.php')?>
    <thead>
    <tr>
        <th>Reference</th>
        <th>Nom du Livre</th>
        <th>Nom de l Auteur</th>
        <th>Disponibilite</th>
        <th>Date de Publication</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($test as $livre): ?>
<tr>
    <td><input type="text"  value="<?=$livre->getReference()?>" readonly/></td>
    <td><input type="text"  value="<?= $livre->getNomLivre()?>" readonly/></td>
    <td><input type="text"  value="<?= $livre->getNomAuteur()?>" readonly/></td>
    <td><input type="text"  value="<?php if($livre->getDisponibilite()>0)
            echo'OUI';
        else
            echo'NON'?>" readonly/></td>
    <td><?= $livre->getDatePublication()?></td>
<?php endforeach; ?>
    </tbody>

</table>
</div>
</body>
</html>
