<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM fietsenmaker WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $fiets = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$fiets) {
        exit('fiets gaat niet met die id');
    }
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM fietsenmaker WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Je hebt de fiets gedelete!';
        } else {

            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('geen id gespecifeerd');
}
?>
<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Fiets #<?=$fiets['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Weet je zeker je wil verwijderen?#<?=$fiets['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$fiets['id']?>&confirm=yes">Ja</a>
        <a href="delete.php?id=<?=$fiets['id']?>&confirm=no">Nee</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>