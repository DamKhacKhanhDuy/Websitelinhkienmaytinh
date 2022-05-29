<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?>
<?php
	if(isset($_GET['cartid'])){ 
        $cartid = $_GET['cartid'];
		$delcart = $ct->del_product_cart($cartid);
    }

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$cartId = $_POST['cartId'];
		$quantity = $_POST['quantity'];
		$update_quantity_card = $ct->update_quantity_card($cartId, $quantity);
		if($quantity<=0){
			$delcart = $ct->del_product_cart($cartId);
		}
	}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
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

								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Ảnh sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Lựa chọn</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								while($result = $get_product_cart->fetch_assoc()){
							
							?>
							<tr>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $fm->format_currency ($result['price'])." "."VNĐ"?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td><?php
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total)." "."VNĐ";
								?></td>
								<td><a href="?cartid=<?php echo $result['cartId']  ?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng tiền : </th>
								<td><?php
								 echo $fm->format_currency($subtotal)." "."VNĐ";
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
					<div class="shopping">
						<div class="shopleft">
							<!-- <a href="index.php"> <img src="images/shop.png" alt="" /></a> -->
						</div>
						<div class="shopright">
							<center><a href="payment.php"> <img src="images/downcart.png"   alt="" /></a></center>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
	

?>
