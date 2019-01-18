<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';
if (isset($_POST["id"]) && isset($_POST["qty"]))
{
    $qty = $_POST["qty"];
    $id = $_POST["id"];
    $session_id = session_id();
    $cart_id = 0;
    $query = "select cart_id, price from cart where session_id = '$session_id' and id = '$id'";
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_array($result)) {
        $cart_id = $row["cart_id"];
    }
    if ($cart_id != 0) {
        $query = "update cart set qty = qty + $qty, sub_total = qty * price where session_id = '$session_id' and id = '$id'";
        mysqli_query($link, $query);
    } else {
        $query = "select price from product where id = '$id'";
        $result = mysqli_query($link, $query);
        if ($row = mysqli_fetch_array($result)) {
            $price = $row["price"];
        }
        $sub_total = $qty * $price;
        $query = "insert into cart (session_id, id, price, qty, sub_total) values ('$session_id', '$id', '$price', '$qty', '$sub_total')";
        mysqli_query($link, $query);
    }
}

?>