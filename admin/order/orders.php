<?php require_once '../common.php'; ?>
<?php require '../header.php'; ?>
<h1>Заказы</h1>

<table>
    <?php foreach($db->query('SELECT order_id, order_status, order_date FROM orders ORDER BY order_date DESC') as $link): ?>
        <?php $order_id = $link['order_id'];?>
        <tr>
            <td>
                <a><?php echo $link['order_id']?></a>
            </td>
            <td>
                <a><?php echo $link['order_status']?></a>
            </td>
            <td>
                <a><?php echo $link['order_date']?></a>
            </td>
            <td>
                <form action="/admin/order/upd-order.php" method="post">
                    <select name="order_status">
                        <option selected disabled>Состояние заказа</option>
                        <option value="Новый">Новый</option>
                        <option value="В обработке">В обработке</option>
                        <option value="Закрыт">Закрыт</option>
                    </select>
                    <input type="hidden" name="order_id" value="<?php echo $order_id?>" />
                    <input type="submit" value="Сохранить">
                </form>
            </td>
        </tr>
    <?php endforeach;?>
</table>


<?php require '../footer.php'; ?>
