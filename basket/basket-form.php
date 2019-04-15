<?php require '../common.php';
require '../header.php';
require 'basket.php';
$result = Basket::getInstance();
$result->getProductsList();
var_dump($result);

foreach ($result as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}
?>
<table>
    <?php foreach($result as $key => $value): ?>
        <tr>
            <td>
                <?php echo "$key => $value\n";?>
            </td>
            <td>
                <?php echo $link?>
            </td>
            <td>
                <?php echo 'рублей' ?>
            </td>
        </tr>
    <?php endforeach;?>
</table>
<?php require '../footer.php'; ?>
