<?php //fichier public/index.php

//on ajoute la config du site

require_once('../config/settings.php');

require_once('header.php');





$tarif = executeSQL("SELECT * FROM hair ORDER BY name");
if( $tarif->rowCount() > 0){
    $iTarif = $tarif->fetchAll();
}

?>
<?php foreach ($iTarif as $value) { ?>
    <div class="table__ligne">
        <p><?= $value['name'] ?></p>
        <?php
        if(isset($_SESSION['admin'])){?>
            <a href="updatetarif.php?tarifid=<?php echo $value['id']; ?>">Modifier</a>
        <?php } ?>
        <p><?php echo number_format($value['men'],2,',','')."€"; ?></p>
        <p><?php if(!isset($value['women']) || trim($value['women']) === '') echo '-'; ?><?php if(isset($value['women'])) echo number_format($value['women'],2,',','')."€"; ?></p>
        <p><?php if(!isset($value['kid']) || trim($value['kid']) === '') echo '-'; ?><?php if (isset($value['kid'])) echo number_format($value['kid'],2,',','')."€"; ?></p>
    </div>
<?php } ?>
<?php
if(isset($_SESSION['admin'])){?>
    <a href="../admin/addtarif.php">Ajouter un hair</a>
<?php } ?>
