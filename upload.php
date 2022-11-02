<?php


// if (isset($_POST['submit'])){
// //    $file_name=$_FILES['file']['name'];
// //    $file_type=$_FILES['file']['type'];
// //    $file_size=$_FILES['file']['size'];
// //    $file_loc=$_FILES['file']['tmp_name'];
// //    $file_store="/var/www/html/test/images/newimage/".$file_name;

// $uploaddir = 'uploads/';
// $uploadfile = $uploaddir . basename($_FILES['file']['name']);
// if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

// // if(move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name'])){
//     echo "uploaded ";
// }
// else{
//     echo "error";
// }
// // $uploaddir = '/var/www/uploads/';
// }

class uploader{
    function upload(){
           $errors= array();
           $file_name = $_FILES['image']['name'];
           $file_size = $_FILES['image']['size'];
           $file_tmp = $_FILES['image']['tmp_name'];
           $file_type = $_FILES['image']['type'];
           $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
           
           $extensionss= array("jpeg","jpg","png","mp4","webp");
           
           if(in_array($file_ext,$extensionss)=== false){
              $errors[]="extension not allowed, please choose a JPEG or PNG file.";
           }
           
           if($file_size > 2097152) {
              $errors[]='File size must be excately 2 MB';
           }
           
           if(empty($errors)==true) {
              move_uploaded_file($file_tmp,"uploads/".$file_name);
              echo "FIle UPloaded";
           }else{
              print_r($errors);
           }
           
    }
   
   }
   if(isset($_FILES['image'])){
   
       $uploader   =   new uploader();
       $uploader->upload();
      }
      $files = scandir("uploads");
 
      // If you are using windows, first 2 indexes are "." and "..",
      // if you are using Mac, you may need to start the loop from 3,
      // because the 3rd index in Mac is ".DS_Store" (auto-generated file by Mac)
      for ($a = 2; $a < count($files); $a++)
      {
          ?>
          <p>
              <!-- Displaying file name !-->
              <?php echo $files[$a]; ?>
       
              <!-- href should be complete file path !-->
              <!-- download attribute should be the name after it downloads !-->
              <a href="uploads/<?php echo $files[$a]; ?>" >
                  View
              </a>
              <!-- <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;">
Delete
</a> -->
          </p>
          <?php
      }
      
?>

<html>
   <body>
      
      <form method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit" name='submit' value='upload image'/>
			
      
      </form>
      <img src="<?php "uploads/".$_FILES['image']['name'];?>"alt="image">
   </body>
</html>

