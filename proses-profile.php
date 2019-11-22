<?php 
ob_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'paragon';

$koneksi = mysqli_connect($host, $user, $pass, $database);

$errors= array();
$id = addslashes($_POST['id']);
$tgl = addslashes($_POST['tgl']);
$jk = addslashes($_POST['jk']);
$alamat = addslashes($_POST['alamat']);
$foto = addslashes($_FILES['foto']['name']);

      $file_name = $_FILES['foto']['name'];
      $file_size = $_FILES['foto']['size'];
      $file_tmp = $_FILES['foto']['tmp_name'];
      $file_type = $_FILES['foto']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['foto']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }

      $query = mysqli_query($koneksi, "UPDATE user SET tgl='$tgl', jk='$jk', alamat='$alamat', foto='$foto' WHERE id = '$id' ");

	if ($query) 
		{
			$_SESSION['id'] = $query['id'];
			echo "
            <script>
                alert('Profile berhasil di Update');
                document.location.href ='dashboard';
            </script>
            ";
		}
			else 
			{
		        echo "
		        <script>
		        	alert('Profile Gagal di Update !');
		        	document.location.href ='dashboard';
		        </script>";
		    }
 
?>