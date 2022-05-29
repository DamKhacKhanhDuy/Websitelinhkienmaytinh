<?php
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
		$login_check = Session::get('customer_login');
		if($login_check){
			header('Location:index.php');
		}
			?>
<?php
	$pd = new product();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		
		$insertCustomers = $cs->insert_customers($_POST);
	}
?>

<?php
	$pd = new product();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
		
		$login_Customers = $cs->login_customers($_POST);
	}
?>


 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng Nhập</h3>
			<?php
				if(isset($login_Customers)){
					echo $login_Customers;
				}
			?>
        	<form action="" method="POST" >
                	<input type="text" name="email" class="field" placeholder="Nhập email...">
                    <input type="password" name="password" class="field" placeholder="Nhập mật khẩu...">
                 
                 <p class="note"><a href="#">Quên mật khẩu?</a></p>
                    <div class="buttons"><div><input type="submit"class="grey" name="login" value="Đăng nhập" ></div></div>
					</form>
                    </div>
					<?php
					
					?>
    	<div class="register_account">
    		<h3>Tạo tài khoản mới</h3>
			<?php
				if(isset($insertCustomers)){
					echo $insertCustomers;
				}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập họ và tên...">
							</div>	  
							
							<div>
								<input type="text" name="email" placeholder="Nhập Email...">
							</div>
							<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ...">
							</div>
		    			 </td>
		    			<td>
						
		    		<div>
						<select id="country" name="city" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">-----Chọn thành phố------</option>         
							<option value="HN">Hà Nội</option>
							<option value="HCM">TPHCM</option>
							<option value="ĐN">Đà Nẵng</option>
							<option value="HP">Hải Phòng</option>
							<option value="UB">Uông Bí</option>
							<option value="V">Vinh</option>
							<option value="BL">Bạc Liêu</option>
							<option value="BG">Bắc Giang</option>

		         </select>
				 </div>		
				       
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Nhập mật khẩu...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php
	include 'inc/footer.php';
	

?>
