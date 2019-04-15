<?php require '../common.php'; ?>
<?php require '../header.php'; ?>
<table>
    <?php foreach($db->query('SELECT product_id, product_name, product_price FROM product ORDER BY product_id DESC') as $link): ?>
        <tr>
            <td>
                <a href="/catalog/good.php?id=<?php echo $link['product_id']?>"><?php echo $link['product_name']?></a>
            </td>
            <td>
                <?php echo $link['product_price']?>
            </td>
            <td>
                <?php echo 'рублей' ?>
            </td>
            <td>
                <form action="../basket/basket-skrypt.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $link['product_id']?>"/>
                    <input type="hidden" name="quantity" value="1"/>
                    <input type="submit" name="submit" value="Купить" />
                </form>
        </tr>
    <?php endforeach;?>
</table>
<?php require '../footer.php'; ?>
