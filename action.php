<?php
session_start();
include("connect.php");
if(isset($_POST["category"])){
	$category_query="SELECT * FROM categories";
	$run_query=mysqli_query($con,$category_query);
	echo "
				<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='index.php' style='background-color: #00b3b3;'><h4>Products </h4></a></li>
	";
//category sql
	if(mysqli_num_rows($run_query)>0){
		while($row=mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
				<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
//brand sql

	if(isset($_POST["brand"])){
	$brand_query="SELECT * FROM brand";
	$run_query=mysqli_query($con,$brand_query);
	echo "
				<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>brand</h4></a></li>
	";
	if(mysqli_num_rows($run_query)>0){
		while($row=mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
				<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
// page ng bawat aircon


// product picture at iba pa sql
if(isset($_POST["getProduct"])){
	$product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id = $row['product_id'];
			$pro_cat = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_desc = $row['product_desc'];
			$pro_image = $row['product_image'];


			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading title_pro'>$pro_title</div>
								<div class='panel-body'>
									<img src='image/$pro_image' style='width:170px; height:250px;' /><br> 
									<div class='title_pro'>
									$pro_desc
									</div>

								</div>
								<div class='panel-heading'>₱$pro_price.00

								</div>
							</div>
						</div>
			";
		}
	}
}
///category and brand pindot pindot
if(isset($_POST["get_selected_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_Category"])){
		$id=$_POST["cat_id"];
		$sql = "SELECT * from products WHERE product_cat = '$id' ";
	}else if(isset($_POST['selectBrand'])){
		$id=$_POST["brand_id"];
		$sql = "SELECT * from products WHERE product_brand = '$id' ";
	}else {
		$keyword=$_POST["keyword"];
		$sql = "SELECT * from products WHERE product_keywords LIKE '%$keyword%' ";
	}


	$run_query = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($run_query)){
			$pro_id = $row['product_id'];
			$pro_cat = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_desc = $row['product_desc'];
			$pro_image = $row['product_image']; 
			$qty = $row['stocks'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading title_pro'>$pro_title</div>
								<div class='panel-body'>
									<img src='image/$pro_image' style='width:220px; height:250px'; /> <div class='title_pro'>$pro_desc </div> <br><b>$qty</b>
								</div>
								<div class='panel-heading'>₱$pro_price.00
								<button pid='$pro_id' style='float: right;' id = 'product' class='btn btn-danger btn-xs'>Add to Cart</button>
								</div>
							</div>
						</div>
			";
		}
	}	


		

	// error kapag may product ng pwede
	if(isset($_POST["addProduct"])){
		$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id' ";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0 ){
			echo "
				<div class='alert alert-danger'>
						<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Product is already added into the cart Continue Shopping.</b>
				</div>
				";
		} else {

			// add ng product
			$sql = "SELECT * FROM products WHERE product_id = '$p_id' LIMIT 30 ";
			$run_query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($run_query);
			$id = $row["product_id"];
			$pro_name = $row["product_title"];
			$pro_image = $row["product_image"];
			$pro_price = $row["product_price"];
			$sql = "INSERT INTO `cart` (`id`, `p_id`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) VALUES (NULL, '$p_id', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price')";
			if(mysqli_query($con,$sql)){
				echo "
				<div class='alert alert-success'>
						<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Product is added</b>
				</div>
				";
			}

		}
	}
		//                                  add to cart na                            //
 	if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"]) || isset($_POST["cart_summary"])){
 		$uid = $_SESSION["uid"];

 		$sql = "SELECT * From cart WHERE user_id = '$uid' ";
 		$run_query = mysqli_query($con,$sql);
 		$count = mysqli_num_rows($run_query);
 		if($count > 0){
 			$no = 1;
 			$total_amount =0;
 			while($row=mysqli_fetch_array($run_query)){
 				$id = $row["id"];
 				$pro_id = $row["p_id"];
 				$pro_name = $row["product_title"];
 				$pro_image = $row["product_image"];
 				$qty = $row["qty"];
 				$pro_price = $row["price"];
 				$total =$row["total_amount"];

 			/// total ammount process
 				$price_array = array($total);
 				$total_sum = array_sum($price_array);
 				$total_amount = $total_amount + $total_sum;

 				if(isset($_POST["get_cart_product"])){
					echo "
 								<div class='row'>
									<div class='col-md-3'>$no.</div>
									<div class='col-md-3'><img src='image/$pro_image' width='50px' height='60px'></div>
									<div class='col-md-3'>$pro_name</div>
									<div class='col-md-3'>₱$pro_price</div>
									
								</div>
 				";
 				$no = $no + 1;

 			// interface ng cart

 				}

 				elseif(isset($_POST["cart_checkout"])){

					echo "
 						<div class='row'>
								<div class='col-md-2'>
									<div class='btn-group'>
										<a href ='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
										<a href ='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
									</div>
								</div>


								<div class='col-md-2'><img src='image/$pro_image' width='110' height='80'></div>
								<div class='col-md-2'>$pro_name</div>


								<div class='col-md-2'><input type='text' class='form-control quantity' pid='$pro_id' id='quantity-$pro_id' value='$qty'></div>


								<div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>


								<div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
							</div>
 					";
 				}

 				
 			}
 		
 	
 			// process lang para makita yung total price sa cart
 	if(isset($_POST["cart_checkout"])){
 		echo "
 				

										<div class='row'>
											<div class='col-md-8'></div>
											<div>
													<b>Total Amount : ₱.$total_amount</b>
											</div>
										</div> 

							
					
 		";
 	
		

	
 	
		}
	}
}

if(isset($_POST["cart_count"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * from cart where user_id = '$uid' ";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}

 			// delete cart process
 	if(isset($_POST["removeFromCart"])){
 		$pid = $_POST["removeId"];
 		$uid = $_SESSION["uid"];
 		$sql = "DELETE From cart where user_id ='$uid' AND p_id = '$pid' ";
 		$run_query = mysqli_query($con,$sql);
 		if($run_query){
 			echo "<div class='alert alert-danger'>
						<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Product is removed from cart</b>
				</div>

				";
 		}
 	}
 		// update product process
 	if(isset($_POST["updateProduct"])){
 		$uid = $_SESSION["uid"];
 		$pid = $_POST["updateId"];
 		$quantity = $_POST["quantity"];
 		$price = $_POST["price"];
 		$total = $_POST["total"];

 		$sql = "UPDATE cart Set qty='$quantity',price='$price',total_amount='$total' where user_id='$uid'
 		 And p_id='$pid' ";
 		$run_query = mysqli_query($con,$sql);
 		if($run_query){
 			echo "
 				<div class='alert alert-success'>
						<a href='#' class = 'close' data-dismiss='alert' arial-label='close'>&times;</a><b>Product is Updated</b>
				</div>
 			";
 		}
 	}


//                    cart summary process
 	
?>




