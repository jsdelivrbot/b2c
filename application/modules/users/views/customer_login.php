

<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/styles.css" type="text/css">
   
</head>
<body>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		 <?php
					$error = $this->session->flashdata('error');
					$message = $this->session->flashdata('message');
					if(!empty($error)){
						echo '<div class="alert alert-danger">'.$error.'</div>';
					}
					if(!empty($message)){
						echo '<div class="alert alert-info">'.$message.'</div>';
					}
				?>
	</div>
</div>
<center>
<div id="main">
<div id="login">
<h2> Customer Login</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text"><br>


<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password"><br>
<input name="submit" type="submit" value=" Login ">

</form>
</div>
</div>
</center>>
</body>
</html>

