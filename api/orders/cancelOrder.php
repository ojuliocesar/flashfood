<?php

use Model\Order\Order;

$order = new Order();

if (isset($_POST['orderNumber'])) {

    echo json_encode($order->cancelOrder($_POST['orderNumber']), JSON_UNESCAPED_UNICODE);
    
}