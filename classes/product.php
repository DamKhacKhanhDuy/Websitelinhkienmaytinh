<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>


<?php
    class product {
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data, $files){
            
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
//kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName =="" || $brand =="" || $category  =="" || $product_desc =="" || $price =="" || $type =="" || $file_name =="" ){
                $alert = "<span class='error'>Không để trống</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'> Thêm thành công </span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'> Không thêm thành công </span>";
                    return $alert;
                }
                
            }
        }
        public function insert_slider($data, $files){
            $sliderName = mysqli_real_escape_string($this->db->link,$data['sliderName']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($sliderName =="" || $type =="" ){
                $alert = "<span class='error'>Không để trống</span>";
                return $alert;

            }else{
                if(!empty($file_name)){
                    //Neu nguoi dung chon anh
                if($file_size>2048000){
                    $alert = "<span class='error'>Kích thước không vượt quá 2MB</span>";
                return $alert;
                }
               elseif(in_array($file_ext,$permited)=== false)
               {
                   
                   $alert = "<span class='error'>Chỉ được phép up các định dạng sau:-".implode(',',$permited)."</span>";
                   return $alert;
               }
               move_uploaded_file($file_temp,$uploaded_image);
              
                $query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'> Thêm slider thành công </span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'> Chưa thêm slider thành công </span>";
                    return $alert;
                }
               
           }
            }
                
        }
        public function show_slider(){
            $query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_slider_list(){
            $query = "SELECT * FROM tbl_slider order by sliderId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function show_product(){
            // $query = " SELECT p.*,c.catName, b.brandName FROM tbl_product as p,tbl_category as c,tbl_brand as b where p.catId = c.catId AND p.brandId = b.brandId order by p.productId desc";

            $query = "
            
            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId

            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
            
            order by tbl_product.productId desc";

            // $query = "SELECT * FROM tbl_product order by productId desc";

            $result = $this->db->select($query);
            return $result;
        }
        public function update_type_slider($id,$type){
            $type = mysqli_real_escape_string($this->db->link,$type);
            $query = "UPDATE tbl_slider SET type='$type' where sliderId='$id' ";
            $result = $this->db->update($query);
            return $result;
        }
        public function update_product($data,$files, $id){

            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

//kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg','jpeg','png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName =="" || $brand =="" || $category  =="" || $product_desc =="" || $price =="" || $type ==""){
                $alert = "<span class='error'>Không để trống</span>";
                return $alert;

            }else{
                if(!empty($file_name)){
                    //Neu nguoi dung chon anh
                if($file_size>2048){
                    $alert = "<span class='error'>Kích thước không vượt quá 2MB</span>";
                return $alert;
                }
               elseif(in_array($file_ext,$permited)=== false)
               {
                   
                   $alert = "<span class='error'>Chỉ được phép up các định dạng sau:-".implode(',',$permited)."</span>";
                   return $alert;
               }
               move_uploaded_file($file_temp,$uploaded_image);
               $query = "UPDATE tbl_product SET 
               productName = '$productName',
               brandId = '$brand',
               catId = '$category',
               type = '$type',
               price = '$price',
               image = '$unique_image',
               product_desc = '$product_desc'

               WHERE productId = '$id'";
            }else{
                //Neu nguoi dung khong chon anh
                $query = "UPDATE tbl_product SET 

               productName = '$productName',
               brandId = '$brand',
               catId = '$category',
               type = '$type',
               price = '$price',
               product_desc = '$product_desc'

               WHERE productId = '$id'";
            }
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='success'> Sửa thành công </span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'> Chưa sửa thành công </span>";
                    return $alert;
                }
                
            }
        }
        public function del_product($id){
            $query = "DELETE FROM tbl_product where productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'> Xóa thành công </span>";
                return $alert;
            }else{
                $alert = "<span class='error'> Chưa xóa thành công </span>";
                return $alert;
            }
        }
        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        //Ket thuc back end


        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '0' LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function getproduct_new(){
            $sp_tungtrang = 4;
            if(!isset($_GET['trang'])){
                $trang = 1;
        }else{
            $trang = $_GET['trang'];
        }
        $tung_trang = ($trang-1)*$sp_tungtrang;

            $query = "SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang,$sp_tungtrang ";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product(){
            $query = "SELECT * FROM tbl_product ";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_details($id){
            // $query = " SELECT p.*,c.catName, b.brandName FROM tbl_product as p,tbl_category as c,tbl_brand as b where p.catId = c.catId AND p.brandId = b.brandId order by p.productId desc";

            $query = "
            
            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId

            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'";
            
            

            // $query = "SELECT * FROM tbl_product order by productId desc";

            $result = $this->db->select($query);
            return $result;
        }
        
     }

    


?>