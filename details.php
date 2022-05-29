<?php
	include 'inc/header.php';
	// include 'inc/slider.php';

?>
<?php
	if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script>'window.location = '404.php' </script>";
    }else{
        $id = $_GET['proid'];
    }
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
		$Addtocard = $ct->add_to_card($id, $quantity);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
				$get_product_details = $product->get_details($id);
				if($get_product_details){
					while($result_details = $get_product_details->fetch_assoc()){

				
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image']?>" width="200px" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName']?></h2>
					<p><?php echo $fm->textShorten($result_details['product_desc'],350)?></p>					
					<div class="price">
						<p>Giá sản phẩm: <span><?php echo $fm->format_currency ($result_details['price'])." "."VNĐ"?></span></p>
						<p>Danh mục: <span><?php echo $result_details['catName']?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
	
					</form>	
					<?php
							if(isset($Addtocard)){
								echo '<span style="color:red; font-size: 18px;">Sản phẩm đã có trong giỏ hàng</span';
							}
						?>			
				</div>
			</div>
				<div class="product-desc">
				<h2>Thông tin chi tiết sản phẩm</h2>
				<?php echo $fm->textShorten($result_details['product_desc'],350)?>
			</div>
				
	</div>
	<?php
		}
	}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>Các sản phẩm liên quan</h2>
					<ul>
						<?php
						$getall_category = $cat->show_category_fontend();
						if($getall_category){
							while($result_allcat = $getall_category->fetch_assoc()){
						?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName']?></a></li>
				    <?php
							}
						}
					?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	 <?php
	include 'inc/footer.php';
	

?>
