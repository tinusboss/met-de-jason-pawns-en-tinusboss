<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the fiets id exists, for example update.php?id=1 will get the fiets with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $merk = isset($_POST['merk']) ? $_POST['merk'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE fietsenmaker SET id = ?, merk = ?, type = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $merk, $type, $created, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the fiets from the fietss table
    $stmt = $pdo->prepare('SELECT * FROM fietsenmaker WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $fiets = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$fiets) {
        exit('verdomme man');
    }
} else {
    exit('Geen id ');
}
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Update fiets #<?=$fiets['id']?></h2>
    <form action="update.php?id=<?=$fiets['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Merk</label>
        <input type="text" name="id" placeholder="1" value="<?=$fiets['id']?>" id="id">
        <input type="text" name="merk" placeholder="" value="<?=$fiets['merk']?>" id="merk">
        <label for="title">Type</label>
        <label for="created">Created</label>
        <input type="text" name="type" placeholder="" value="<?=$fiets['type']?>" id="type">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($fiets['created']))?>" id="created">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>