<?php require '../common.php'; ?>
<?php require '../header.php'; ?>
<?php require '../paginator.php'?>
<h1>Редактирование текста</h1>

<form action="/admin/text/create-text.php" method="post">
    <input type="submit" name="submit" value="Создать" />
</form>

<?php
$currentPageNumber = (int) $_GET['page'];
$paginator = new Paginator($db);
$start = $paginator->startMessageNumbers($currentPageNumber);
$number = $paginator->howManyLinks();
?>

<table>
    <?php foreach($db->query("SELECT id, title, text FROM text LIMIT $start, $number") as $link): ?>
    <tr>
        <td>
            <a><?php echo $link['title']?></a>
        </td>
        <td>
            <form action="/admin/text/edit-text.php?id=<?php echo $link['id']?>" method="post">
                <input type="submit" name="submit" value="Редактировать" />
            </form>
        <td>
            <form action="del-text.php" method="POST" name="deleteForm<?php echo $link['id']?>">
                <input type="hidden" name="id" value="<?php echo $link['id']?>" />
                <input type="submit" name="submit" value="Удалить" />
            </form>
        </td>
    </tr>
    <?php endforeach;?>
</table>

<?php echo $paginator->outputPaginatorLinks($currentPageNumber); ?>

<?php require '../footer.php'; ?>
