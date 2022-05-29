<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?>
<?php
	// if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
    //     $customer_id = Session::get('customer_id');
    //     $insertOrder = $ct->insertOrder($customer_id);
    //     $delCart = $ct->del_all_data_cart();
    //     header('Location:success.php');
    // }
?>
<style>
    h3.payment{
        text-align: center;
        font-size:20px;
        font-weight:bold;
        text-decoration:underline;
    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding:20px;
        background: cornsilk;
    }
    .wrapper_method a{
        padding: 10px;
        background: red;
        color: #fff;
    }
    .wrapper_method h3{
        margin-bottom:20px;
    }
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="heading">
    		<h3>Trang thanh toán Online</h3>
    		</div>
    		<div class="clear"></div>
            <div class="wrapper_method">
                <h3 class="payment">Chọn cổng thanh toán</h3>
                <p>Đang trong quá trình phát triển xin vui lòng chờ thêm....</p><br><br>
                <a style="background:grey" href="payment.php"> << Quay về </a>
            </div>
            
 		</div>
 	</div>
</div>
</form>
	 <?php
	include 'inc/footer.php';
	

?>
