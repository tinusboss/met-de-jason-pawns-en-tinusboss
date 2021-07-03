<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// kijken of post leeg is
if (!empty($_POST)) {
    // post data niet leeg voeg dan een niewe fiets toe
    // maak de variabelen die toegevoegd moeten worden, kijk of de post variabele bestaat anders staat er niks
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // checken of post variabele merk bestaat en ook voor type
    $merk = isset($_POST['merk']) ? $_POST['merk'] : '';
    $type= isset($_POST['type']) ? $_POST['type'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // voeg een nieuwe fiets toe in fietsenmaker
    $stmt = $pdo->prepare('INSERT INTO fietsenmaker VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $merk, $type, $created]);
    // zeg dit
    $msg = 'Succesvol gecreëerd';
}
?>
<?=template_header('Create')?>

<div class="content update">
	<h2>Create fiets</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="" value="" id="id">
        <label for="name">Merk</label>
        <input type="text" name="merk" placeholder="" id="merk">
        <label for="email">Type</label>
        <input type="text" name="type" placeholder="" id="type">
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>