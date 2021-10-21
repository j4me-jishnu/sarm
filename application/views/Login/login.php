<!DOCTYPE>
<html>

<head>    
    <title>SAFA METALS</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/bootstrap/css/login_css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-image: url('<?php echo base_url();?>images/back.jpg');">
    
	<div class="login-page">
		<div class="alert alert-success" align="center" style="opacity: 0.7;">
            <img src="<?php echo base_url();?>Images/logo.jpg" style="max-width:300px">
		</div>
	  <div class="form" style="border-radius: 15px;background: #504250;">
		<form class="login-form" method='post'>
		  <input type="text" name="username" placeholder="name"/>
		  <span style="color:#f8f9f9"><?php echo form_error('username'); ?></span>
		  <input type="password" name="password" placeholder="password"/>
		  <span style="color:#f8f9f9"><?php echo form_error('password'); ?></span>
		  <button style="border-radius: 10px;">login</button>
		  <span style="color:#f8f9f9"><?php if(isset($message)) echo $message; ?><span>
		</form>
	  </div>
	  <div class="row" style="margin-top: -70px;">
	  	<!-- <div class="col-md-6">04792370017</div>
	  	<div class="col-md-6">safametalsllp@outlook.com</div> -->
	  </div><br>
	  <div class="row">
	  	<div class="col-md-12" align="center">
	  		
	  	</div>
	  </div>
	</div>
	 <script src='<?php echo base_url();?>/assets/js/jquery.min.js'></script>
	 <script src='<?php echo base_url();?>assets/bootstrap/js/bootstrap.js'></script>

        <script src="<?php echo base_url();?>/assets/js/login_js/index.js"></script>
</body>
</html>



