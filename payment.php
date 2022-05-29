<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?>
<?php
    
    $login_check = Session::get('customer_login');
    if($login_check==false){
       header('Location:login.php');
   }
?>
<?php
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
    //     echo "<script>'window.location = '404.php' </script>";
    // }else{
    //     $id = $_GET['proid'];
    // }
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
	// 	$Addtocard = $ct->add_to_card($id, $quantity);
	// }
?>
<style>
    h3.payment{
        font-weight:bold;
        text-decoration: underline;
        text-align: center;
        font-size: 20px;
        
    }
    .warpper_method{
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
    .warpper_method a{
        background: red;
        color: #fff;
        padding: 10px;     
    }
    .warpper_method h3{
        margin-bottom: 20px;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3>Trang thanh toán</h3>
    		</div>
    		<div class="clear"></div>
            <div class="warpper_method">
                <h3 class="payment">Chọn phương thức thanh toán</h3>
                <a  href="offlinepayment.php">Thanh toán khi nhận hàng</a>
                <a  href="onlinepayment.php">Thanh toán online</a><br><br><br>
                <a style="background:grey" href="cart.php"> << Quay lại giỏ hàng</a>
            </div>
    	</div>
            
 		</div>
 	</div>
	 <?php
	include 'inc/footer.php';
	

?>
