<?php 
session_start();
include "../dbConnect.php";

if(isset($_POST['adminlogin'])){
	$email=$_POST["user_mail"];
	$password=$_POST["user_password"];
	$encodedPassword=md5($password);

	$checkUser = $db->prepare("SELECT * FROM users where user_email=:email and user_password=:encodedPassword");
	$checkUser->execute(array(
		'email' => $email,
		'encodedPassword' => $encodedPassword));

	echo $matchedUserNumber=$checkUser->rowCount();
	if($matchedUserNumber==1){
		$_SESSION["user_email"]=$email;
		header("Location:../admin/admin-pages/index.php");
		exit;
	} else {
		header("Location:../admin/admin-pages/login.php?status=false");
		exit;
	}
}


if(isset($_POST["addCategory"])){
	$categoryName=$_POST["category_name"];
	$categoryOrder=$_POST["category_order"];

	$addNewCategory = $db->prepare("INSERT INTO categories SET category_name=:categoryName, category_order=:categoryOrder");
	$isSuccessfull=$addNewCategory->execute(array(
		"categoryName" => $categoryName,
		"categoryOrder" => $categoryOrder
	));

	if($isSuccessfull){
		header("Location:../admin/admin-pages/category.php?status=okay");
		exit;
	} else {
		header("Location:../admin/admin-pages/category.php?status=wrong");
		exit;
	}
}

if(isset($_GET["deleteCategory"])){
	$categoryId=$_GET["deleteCategory"];

	$categoryDelete = $db->prepare("DELETE from categories where category_id=:deleteCategoryId");
	$isDeleted=$categoryDelete->execute(array("deleteCategoryId"=>$categoryId));

	if($isDeleted){
		header("Location:../admin/admin-pages/category.php?status=okay");
		exit;
	} else {
		header("Location:../admin/admin-pages/category.php?status=wrong");
		exit;
	}
}

if(isset($_POST["updateCategory"])){
	$categoryName=$_POST["category_name"];
	$categoryOrder=$_POST["category_order"];
	$categoryId=$_POST["category_id"];

	$updateCategory=$db->prepare("UPDATE categories SET category_name=:name,category_order=:order where category_id=:id");
	$result=$updateCategory->execute(array("name"=>$categoryName,"order"=>$categoryOrder,"id"=>$categoryId));
	if($result){
		header("Location:../admin/admin-pages/updateCategory.php?categoryId=$categoryId&status=okay");
		exit;
	} else{
		header("Location:../admin/admin-pages/updateCategory.php?categoryId=$categoryId&status=wrong");
		exit;
	}
}



if (isset($_POST["addProduct"])) {
	$imageName = ($_FILES["product_image"]["name"]);
    $imageData = (file_get_contents($_FILES["product_image"]["tmp_name"]));
    $imageType = ($_FILES["product_image"]["type"]);
	$productName = $_POST["product_name"];
	$productCategory= $_POST["product_category"];
	$productPrice = $_POST["product_price"];


	$addProduct = $db->prepare("INSERT INTO products SET product_name=:productName,product_category=:productCategory,product_price=:productPrice,product_image=:product_image");

	$isAdded = $addProduct->execute(array(
		"product_image" => $imageData,
		"productName" => $productName,
		"productCategory" => $productCategory,
		"productPrice" => $productPrice
	));


	if($isAdded){
		header("Location:../admin/admin-pages/addProduct.php?status=ok");
		exit;
	} else {
		header("Location:../admin/admin-pages/addProduct.php?status=wrong");
		exit;
	}

}

if (isset($_GET["deleteProductId"])) {
	$deleteProduct = $db->prepare("DELETE FROM products where product_id=:id");
	$isDelted=$deleteProduct->execute(array("id"=>$_GET["deleteProductId"]));

	if ($isDeleted) {
		header("Location:../admin/admin-pages/products.php?status=ok");
		exit;
	} else {
		header("Location:../admin/admin-pages/products.php?status=wrong");
		exit;
	}
}

if (isset($_POST["editProduct"])) {
	$productId=$_POST["product_id"];

	$updateProduct = $db->prepare("UPDATE products SET product_name=:name,product_price=:price,product_category=:category WHERE product_id=:id");
	$isUpdate=$updateProduct->execute(array(
		"name" => $_POST["product_name"],
		"price" => $_POST["product_price"],
		"category" => $_POST["product_category"],
		"id" => $_POST["product_id"]
	));

		if ($isUpdate) {
		header("Location:../admin/admin-pages/editProduct.php?productId=$productId&status=ok");
		exit;
	} else {
		header("Location:../admin/admin-pages/editProduct.php?productId=$productId&status=wrong");
		exit;
	}
}

if (isset($_POST["register"])) {
	$password = $_POST["password"];
	$rePassword= $_POST["repassword"];
	$email = $_POST["email"];
	$encodedPassword = md5($password);
	if ($password != $rePassword) {
		header("Location:../index.php?status=match");
		exit;
	}

	$addUser = $db -> prepare("INSERT INTO normalUsers SET normalUser_email=:email,normalUser_password=:password");
	$isRegistered=$addUser->execute(array(
		"email" => $email,
		"password" => $encodedPassword
	));

	if ($isRegistered) {
		header("Location:../index.php?status=okRegister");
		exit;
	} else {
		echo $isRegistered;
		header("Location:../index.php?status=wrong");
		exit;
	}
	# code...
}

if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$encodedPassword = md5($password);

	$getUser = $db->prepare("SELECT * FROM normalUsers WHERE normalUser_email=:email and normalUser_password=:password");
	$isLogin = $getUser->execute(array(
		"email" => $email,
		"password" => $encodedPassword
	));
	
	if ($getUser->rowCount() == 1) {
		$_SESSION["normalUser_email"]=$email;
		header("Location:../index.php?status=login");
		exit;
	} else {
		header("Location:../index.php?status=notLogin");
		exit;
	}
}

if (isset($_GET["addToCart"])) {
	$productId = $_GET["addToCart"];
	$userEmail = $_SESSION["normalUser_email"];
	$user = $db->prepare("SELECT * FROM normalUsers where normalUser_email=:email ");
	$user->execute(array("email"=>$userEmail));
	$userData = $user->fetch(PDO::FETCH_ASSOC);
	if ($user->rowCount() != 1) {
		header("../index.php?status=paymentLogin");
		exit;
	}
	$addToCart = $db->prepare("INSERT INTO cart SET product_id=:prodId,user_id=:userId");
	$checkAdd=$addToCart->execute(array("prodId"=>$productId,"userId"=>$userData["normalUser_id"]));

	if ($checkAdd) {
		header("Location:../".$_GET["redirect"]);
		exit;
	} else {
		header("Location:../".$_GET["redirect"]);
		exit;
	}

}

if (isset($_GET["removeCartProduct"])) {
	$removeProduct = $db->prepare("DELETE FROM cart where product_id=:id LIMIT 1");
	$isRemoved=$removeProduct->execute(array("id"=>$_GET["removeCartProduct"]));

	if ($isRemoved) {
		header("Location:../".$_GET["redirect"]);
		exit;
	} else {
		header("Location:../".$_GET["redirect"]);
		exit;
	}
}

if (isset($_POST["payment"])) {
	$userEmail = $_SESSION["normalUser_email"];
	$user = $db->prepare("SELECT * FROM normalUsers where normalUser_email=:email ");
	$user->execute(array("email"=>$userEmail));
	$userData = $user->fetch(PDO::FETCH_ASSOC);

	$deleteCart = $db->prepare("DELETE FROM cart where user_id=:id");
	$isCartDeleted=$deleteCart->execute(array("id"=>$userData["normalUser_id"]));

	if ($isCartDeleted) {
		header("Location:../index.php?status=pay");
		exit;
	} else {
		header("Location:../index.php?status=notPay");
		exit;
	}
}


 ?>