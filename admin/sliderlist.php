<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php
$product = new product();
if(isset($_GET['del_slider']) && isset($_GET['type'])){
	$id = $_GET['del_slider'];
	$type = $_GET['type'];
	$update_type_slider = $product->update_type_slider($id,$type);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách slider</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên Slider</th>
					<th>Ảnh Slider</th>
					<th>Hiển thị</th>
					<th>Lựa chọn</th>
				</tr>
			</thead>
			<tbody>
						<?php
						$product = new product();
						$get_slider = $product->show_slider_list();
						if($get_slider){
							$i= 0;
							while($result_slider = $get_slider->fetch_assoc()){
								$i++;
						?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result_slider['sliderName'] ?></td>
					<td><img src="uploads/<?php echo $result_slider['slider_image'] ?>" height="120px" width="400px"/></td>			
					<td><?php
						if($result_slider['type']==1){
							?>
							<a href="?del_slider=<?php echo $result_slider['sliderId'] ?>&type=0" >Ẩn</a> 
							<?php
						}else{
							?>
							<a href="?del_slider=<?php echo $result_slider['sliderId'] ?>&type=1" >Hiển thị</a> 
							<?php
						}
							?>
						
					</td>	
				<td>
					<a href="?del_slider=<?php echo $result_slider['sliderId'] ?>" onclick="return confirm('Bạn có muốn xóa mục này?!');" >Xóa</a> 
				</td>
					</tr>	
					<?php
							}
						}
						?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
