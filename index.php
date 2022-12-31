<?php
require_once 'login_controller.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DESS - Login Page</title>
	<link rel="stylesheet" type="text/css" href="asset/css/main.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   <!-- Theme style -->
   <link rel="icon" href="asset/img/Logo.ico" type="image/x-icon" />

</head>
<body>

	<div class="container">
		
	<center><img src="asset/img/Brand.png" alt="DSMS Logo" width="200"> </center>
		<form method="post" id="login">
		<?php
               if (isset($_SESSION['info'])) {
               ?>
                  <div class="alert alert-danger text-center">
                     <?php echo $_SESSION['info']; ?>
                  </div>
               <?php
               }
               ?>

               <?php if (count($errors) > 0) {
               ?>
                  <div class="alert alert-danger text-center">
                     <b>
                        <?php
                        foreach ($errors as $showerror) {
                           echo $showerror;
                        }
                        ?>
                     </b>
                  </div>
               <?php
               }
               ?>
			<div class="main">
			<input type="text" name="email" class="form-control" placeholder="Username">
				<span></span>
				
			</div>

			<div class="main">
			<input type="password" name="password" class="form-control" placeholder="Password">
				<span></span>
				
			</div>

			<input type="submit" name="login" value="Log In">

		</form>
	</div>

</body>
</html>