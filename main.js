$(document).ready(function(){
//category
	cat();
	brand();
	product();
	function cat(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {category:1},
			success : function(data){
				$("#get_category").html(data); 
			}
		})
	}
// brand para dun sa colomun
	function brand(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {brand:1},
			success : function(data){
				$("#get_brand").html(data); 
			}
		})
	}
// products images
		function product(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {getProduct:1},
			success : function(data){
				$("#get_product").html(data); 
			}
		})
	}
//pindot bawat category
	$("body").delegate(".category","click",function(event){
		event.preventDefault(); 
		var cid = $(this).attr('cid');
			$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_selected_Category:1,cat_id:cid},
			success : function(data){
				$("#get_product").html(data); 
			}
		})
	})
	//selecting brand
	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault(); 
		var bid = $(this).attr('bid');
			$.ajax({
			url : "action.php",
			method : "POST",
			data : {selectBrand:1,brand_id:bid},
			success : function(data){
				$("#get_product").html(data); 
			}
		})
	})
	// search process
	$("#search_btn").click (function(){
		var keyword = $("#search").val();
		if(keyword !=""){
			$.ajax({
			url : "action.php",
			method : "POST",
			data : {search:1,keyword:keyword},
			success : function(data){
			$("#get_product").html(data); 
			}
		})
		}
	})

	//sign up process
	$("#signup_button").click(function(event){
		event.preventDefault();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("form").serialize(),
			success : function(data){
				$("#signup_msg").html(data);
					
			}
		})
	})


	//login process
	$("#login").click(function(){
		event.preventDefault();
		var email = $("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url : "customer_login.php",
			method : "POST",
			data : {userLogin:1,userEmail:email,userPassword:pass},
			success : function(data){
				if (data == "balerrr") {}
					window.location.href = "customer_homepage.php";
			}
		})
	})
	
		// mag add ng product sa db
		cart_count();
	$("body").delegate("#product","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr("pid");
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addProduct:1,proId:p_id},
			success : function(data){
				$("#product_msg").html(data);
				cart_count(); 
			}

		})
	}) 
		// number ng airconn sa cart
	cart_container();
	function cart_container(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data); 
			}
		})
		
	}; 
	// number sign
	function cart_count(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {cart_count:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}

		// cart process
	$("#cart_container").click(function(event){
		event.preventDefault();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data); 
			}
		})
	})

		//total ammount process
	cart_checkout();
	function cart_checkout(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {cart_checkout:1},
			success : function(data){
				$("#cart_checkout").html(data);
			}
		})
	}

	cart_summary();
	function cart_summary(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {cart_summary:1},
			success : function(data){
				$("#cart_summary").html(data);
			}
		})
	}


		/// multiply ng quantity sa price process
	$("body").delegate(".quantity","keyup",function(){
		var pid = $(this).attr("pid");
		var quantity = $("#quantity-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = quantity * price;
		$("#total-"+pid).val(total);
	})
		// delete cart process
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("remove_id");
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {removeFromCart:1,removeId:pid},
			success : function(data){
				$("#cart_msg").html(data);
				cart_checkout();
				cart_summary();
			}
		})
		
	})
		//update cart process
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("update_id");
		var quantity = $("#quantity-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = $("#total-"+pid).val();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {updateProduct:1,updateId:pid,quantity:quantity,price:price,total:total},
			success : function(data){
				$("#cart_msg").html(data);
				cart_checkout();
				cart_summary();
			}
		})
	})
	
})
$("#submit_button").click(function(event){
		event.preventDefault();
		$.ajax({
			url : "member.php",
			method : "POST",
			data : $("form").serialize(),
			success : function(data){
				$("#signup_msg").html(data);
					
			}
		})
	})
