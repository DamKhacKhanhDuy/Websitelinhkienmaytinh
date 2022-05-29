<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?>
<?php
	// if(isset($_GET['cartid'])){ 
    //     $cartid = $_GET['cartid'];
	// 	$delcart = $ct->del_product_cart($cartid);
    // }

	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	// 	$cartId = $_POST['cartId'];
	// 	$quantity = $_POST['quantity'];
	// 	$update_quantity_card = $ct->update_quantity_card($cartId, $quantity);
	// 	if($quantity<=0){
	// 		$delcart = $ct->del_product_cart($cartId);
	// 	}
	// }
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Chi tiết đơn hàng của bạn</h2>
						<table class="tblone">
							<tr>
                                <th width="10%">ID</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Ảnh sản phẩm</th>
								<th width="15%">Giá</th>
                                <th width="25%">Số lượng</th>
                                <th width="10%">Ngày đặt</th>
                                <th width="10%">Trạng thái</th>	
							</tr>
							<?php
                            $customer_id = Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
                                    $i++;
							?>
							<tr>
                                <td><?php echo $i; ?></td>
								<td><?php echo $result['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></td>
								<td><?php echo $fm->format_currency ($result['price'])." "."VNĐ"?></td>
								<td>
									
										<?php echo $result['quantity']?>
									
								</td>
								
								<td><?php echo $fm->formatDate($result['date_order']) ?></td>
                                <td><?php 
                                    if($result['status']=='0'){
                                        echo 'Đang xử lý';
                                    }else{
                                        echo 'Đã xử lý';
                                    }
                                ?></td>
							</tr>
							
							<?php
								}
							}
							?>
							
							
						</table>
					
						
					   
					</div>
					
						
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';
	

?>
