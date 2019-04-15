<?php
if(isset($_POST['order_id'])) {
    require '../common.php';
    $order_id = (int) $_POST['order_id'];
    $order_status = (string) $_POST['order_status'];
    $stmt = $db->prepare("UPDATE orders SET order_status = :order_status WHERE order_id = :order_id");
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':order_status', $order_status);
    $stmt->execute();
}
header ('Location: /admin/order/orders.php');

