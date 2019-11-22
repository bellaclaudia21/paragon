<?php
ob_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'paragon';

$koneksi = mysqli_connect($host, $user, $pass, $database);

$email = addslashes(strip_tags ($_POST['email']));
$nama = addslashes(strip_tags ($_POST['nama'])); 
$password = addslashes(strip_tags ($_POST['password']));
$no = addslashes(strip_tags ($_POST['no'])); 

		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");
			if(mysqli_fetch_assoc($result)){
				echo "
				<script>
					alert('Email Sudah Terdaftar di Sistem');
					document.location.href ='register';
				</script>
				";
			return false;
		}
		
	$email = md5($email);
    $no = md5($no);

    $query = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$email', '$nama', '$password', '$no', NULL, NULL, NULL, NULL)");

	if ($query) 
		
		{
			$_SESSION['id'] = $query['id'];
			
			echo "
            <script>
                alert('Register Berhasil');
                document.location.href ='index';
            </script>
            ";
		}
			else 
			{
		        echo "
		        <script>
		        	alert('Register Gagal !');
		        	document.location.href ='register';
		        </script>";
		    }
?>