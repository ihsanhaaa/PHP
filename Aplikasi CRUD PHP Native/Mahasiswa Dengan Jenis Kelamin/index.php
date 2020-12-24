<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <body>

    <div class="login-form">
      <div class="logo"><img src="img/Universitas-Tanjungpura-Pontianak.png" alt=""></div>

      <h6>Login</h6>

      <form method="post" action="cek_login.php">
        <div class="textbox">
         <input type="text" placeholder="username" name="username" id="username" autocomplete="off">
        </div>

        <div class="textbox">
          <input type="password" placeholder="password" name="password" id="password">
        </div>

        <input type="submit" value="LOGIN" class="login-btn">
      </form>

      <div class="pesan">
	  	<?php 

		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "Login gagal! username dan password salah!";
			}else if($_GET['pesan'] == "logout"){
				echo "Anda telah berhasil logout";
			}else if($_GET['pesan'] == "belum_login"){
				echo "Anda harus login untuk mengakses halaman admin";
			}

		}
		?>
  		</div>
	</div>

  </body>
</html>



