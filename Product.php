<?php
	class Product
	{
		$p = new Product();
		$products = $p->findProducts();
		
		if($products){
			print_r($products);
		}
		else
		{
			echo "No Products Found<br>";
		}
		function findProducts()
		{
			$db = new Database();
			
			
			$sql_query = "SELECT * FROM l426moc0o088s6g9.Product";
			
			$connection = $db->getConnection();
			
			$result = $connection->query($sql_query);
			
			if(! $result){
				echo "Assume the SQL statement has an error";
				return null;
				exit();
			}
			
			if($result->num_rows == 0){
				echo "0";
				return null;
			}
			else
			{
				
				$product_array = array();
				
				while($product = $result->fetch_assoc()){
					array_push($product_array,$product);	
				}
				return $product_array;
			}
		}
	}
?>