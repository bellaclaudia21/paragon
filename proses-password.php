<?php 
include 'koneksi.php';

$errors= array();
$id = addslashes($_POST['id']);
$password = addslashes($_POST['password']);

      $query = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE id = '$id' ");

	if ($query) 
		{
			$_SESSION['id'] = $query['id'];
			echo "
            <script>
                alert('Password berhasil di Update');
                document.location.href ='password';
            </script>
            ";
		}
			else 
			{
		        echo "
		        <script>
		        	alert('Password Gagal di Update !');
		        	document.location.href ='password';
		        </script>";
		    }
 
?>