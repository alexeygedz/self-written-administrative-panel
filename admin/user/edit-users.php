<?php
require '../common.php';
require '../header.php';
?>
<h1>Редактирование пользователей</h1>

<form action="/admin/user/create-user.php" method="post">
    <input type="submit" name="submit" value="Создать" />
</form>

<table>
    <?php foreach($db->query('SELECT user_id, login, password FROM user ORDER BY user_id DESC') as $link): ?>
    <tr>
        <td>
            <a><?php echo $link['login']?></a>
        </td>
        <td>
            <form action="/admin/user/edit-user.php?id=<?php echo $link['user_id']?>" method="post">
                <input type="submit" name="submit" value="Редактировать" />
            </form>
        <td>
            <form action="del-user.php" method="POST" name="deleteForm<?php echo $link['id']?>">
                <input type="hidden" name="id" value="<?php echo $link['user_id']?>" />
                <input type="submit" name="submit" value="Удалить" />
            </form>
        </td>
    </tr>
    <?php endforeach;?>
</table>

<?php require '../footer.php'; ?>
