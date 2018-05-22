<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "fkzdb");
if(isset($_POST["product_id"]))
{
	$order_table = '';
	$message = '';
	if($_Post["action"] == "add")
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$is_available = 0;
			foreach ($_SESSION["shopping_cart"] as $key => $value) 
			{
				if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])
				{
					$is_available++;				
				}
			}
			if($is_available < 1)
			{
				$item_array = array(
						'product_id' => $_POST["product_id"]
						'product_name' => $_POST["product_name"]
						'product_price' => $_POST["product_price"]
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
						'product_id' => $_POST["product_id"]
						'product_name' => $_POST["product_name"]
						'product_price' => $_POST["product_price"]
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
		$order_table .= '
			<table class="table table-bordered">
				<
		'
	}
}
?>