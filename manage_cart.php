<?php
include('connection.inc.php');
include('function.inc.php');
include('add_to_cart.inc.php');

$pid="";
$type="";
$qty="";

$pid = get_safe_value($con,$_POST['pid']);
$qty=get_safe_value($con,$_POST['qty']);
$type = get_safe_value($con,$_POST['type']);

// to check the qty in stock 
$productSoldQtyByProductId=productSoldQtyByProductId($con,$pid);
$producQty = productQty($con,$pid);
$pending_qty= $producQty-$productSoldQtyByProductId;   
if($qty>$pending_qty)
{
    echo "not_avaliable";
    die();
}
$obj = new add_to_cart();

if($type == 'add')
{
    $obj->addProduct($pid,$qty);
    ?>
    <script>
         window.location.href=window.location.href;
    </script>
    <?php
}
if($type == 'remove')
{
    $obj->removeProduct($pid);
}
if($type == 'update')
{
    $obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();

?>