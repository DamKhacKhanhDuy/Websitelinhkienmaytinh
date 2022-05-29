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
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3>Thông tin khách hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
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
                <tr>
                    <td colspan="3"><a href="editprofile.php">Chỉnh sửa thông tin</a></td>
                </tr>
                
                
                <?php
                }
            }
                ?>
            </table>
 		</div>
 	</div>
	 <?php
	include 'inc/footer.php';
	

?>
