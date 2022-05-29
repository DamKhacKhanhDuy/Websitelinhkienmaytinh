<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
?>
<style type="text/css">
    .box_left{
        width: 50%;
        border: 1px solid #666;
        float: left;
        padding: 4px;
    }
    .box_right{
        width: 47%;
        border: 1px solid #666;
        float: right;
        padding: 4px;
    }
    a.a_order{
        background: red;
        padding: 7px 20px;
        color: #fff;
        font-size: 21px;
    }
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="heading">
    		<h3>Trang thanh toán Offline</h3>
    		</div>
    		<div class="clear"></div>
            <div class="box_left">
            <div class="cartpage">
			    	
					<?php
						if(isset($update_quantity_card)){
							echo $update_quantity_card;
						}
					?>
					<?php
						if(isset($delcard)){
							echo $delcard;
						}
					?>
						<table class="tblone">
							<tr>

								<th width="5%">ID</th>
								<th width="15%">Tên sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
                                $i=0;
								while($result = $get_product_cart->fetch_assoc()){
                                    $i++;
							?>
							<tr>
                                <td><?php echo $i?></td>
								<td><?php echo $result['productName']?></td>
								
								<td><?php echo $fm->format_currency ($result['price'])." "."VNĐ"?></td>
								<td>
                                <?php echo $result['quantity']?>
								</td>
								<td><?php
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total).' '.'VNĐ';
								?></td>
								
							</tr>
							<?php
									$subtotal += $total;
									
								?>
							<?php
								}
							}
							?>
							
							
						</table>
						<?php
								$check_cart = $ct->check_cart();
								if($check_cart){
								
								?>
						<table style="float:right;text-align:left;margin:5px" width="40%">
							<tr>
								<th>Tổng tiền : </th>
								<td><?php
								 echo $fm->format_currency($subtotal).' '.'VNĐ';
								 Session::set('sum',$subtotal);
								 ?></td>
							</tr>
							
							<tr>
								<th></th>
								<td>(Đã bao gồm VAT nếu có)</td>
							</tr>
					   </table>
					   <?php
								}else{
									echo 'Giỏ hàng của bạn trống, hãy trở lại mua hàng';
								}
					   ?>
					</div>
            </div>
            <div class="box_right">
            <table class="tblone">
                <?php
                $id = Session::get('customer_id');
                $get_customers = $cs->show_customers($id);
                if($get_customers){
                    while($result = $get_customers->fetch_assoc()){

                    
                ?>
                <tr>
                    <td>Tên khách hàng</td>
                    <td>:</td>
                    <td><?php echo $result['name']?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td>Thành Phố</td>
                    <td>:</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td>:</td>
                    <td><?php echo $result['phone']?></td>
                </tr>

                <?php
                }
            }
                ?>
            </table>
            </div>
            
 		</div>
 	</div>
     <center> <a href="?orderid=order" class="a_order">Đặt hàng ngay</a></center>
</div>
</form>
	 <?php
	include 'inc/footer.php';
	

?>
