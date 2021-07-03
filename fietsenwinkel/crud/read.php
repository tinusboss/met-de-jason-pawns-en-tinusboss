<?php
include 'functions.php';

$pdo = pdo_connect_mysql();

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

$records_per_page = 5;

$stmt = $pdo->prepare('SELECT * FROM fietsenmaker ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

$fietsen = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_fietsen = $pdo->query('SELECT COUNT(*) FROM fietsenmaker')->fetchColumn();
?>
<?=template_header('Read')?>

<div class="content read">
	<h2>Kijk fietsen</h2>
	<a href="create.php" class="create-fietsen">Create fiets</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Type</td>
                <td>Merk</td>
                <td>Created</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fietsen as $fiets): ?>
            <tr>
                <td><?=$fiets['id']?></td>
                <td><?=$fiets['merk']?></td>
                <td><?=$fiets['type']?></td>
                <td><?=$fiets['created']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$fiets['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$fiets['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_fietsen): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>