<?php require '../common.php'; ?>
<?php require '../header.php'; ?>
<h1>Редактирование ссылок</h1>

<form action="/admin/link/create-link.php" method="post">
    <input type="submit" name="submit" value="Создать" />
</form>

<table>
    <?php foreach($db->query('SELECT id, name, url FROM menu_item ORDER BY sort DESC') as $link): ?>
    <tr>
        <td>
            <a><?php echo $link['name']?></a>
        </td>
        <td>
            <form action="/admin/link/edit-link.php?id=<?php echo $link['id']?>" method="post">
                <input type="submit" name="submit" value="Редактировать" />
            </form>
        <td>
            <form action="del-link.php" method="POST" name="deleteForm<?php echo $link['id']?>">
                <input type="hidden" name="id" value="<?php echo $link['id']?>" />
                <input type="submit" name="submit" value="Удалить" />
            </form>
        </td>
    </tr>
    <?php endforeach;?>
</table>

<?php require '../footer.php'; ?>
