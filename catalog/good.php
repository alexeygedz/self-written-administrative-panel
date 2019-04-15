<?php require '../common.php'; ?>
<?php require '../header.php';

if (!empty($_GET["id"])) {
    $id = (int)$_GET['id'];
    $data = $db->prepare('SELECT product_name, product_price FROM product WHERE product_id = :id');
    $data->execute([':id' => $id]);
    $result = $data->fetch(PDO::FETCH_ASSOC);

?>
<table>
        <tr>
            <td>
                <?php echo $result['product_name']?>
            </td>
            <td>
                <?php echo $result['product_price']?>
            </td>
            <td>
                <?php echo 'рублей' ?>
            </td>
            <td>
                <form action="../basket/basket-skrypt.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id?>"/>
                    <input type="hidden" name="quantity" value="1"/>
                    <input type="submit" name="submit" value="Купить" />
                </form>
            </td>
        </tr>
</table>
<?php } ?>
<?php require '../footer.php'; ?>