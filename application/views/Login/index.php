<body id="particles-js"></body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" method="post" action="<?php echo base_url(); ?>index.php/login/">
      <h2>Admin</h2>
      <h5>Sign in to your account.</h5>
        <input type="text" name="username" placeholder="Username" autocomplete="off">
        <span style="color:#f8f9f9"><?php echo form_error('username'); ?></span>
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        <span style="color:#f8f9f9"><?php echo form_error('password'); ?></span>

        <!-- <label>
          <input type="checkbox">
          <span></span>
          <small class="rmb">Remember me</small>
        </label> -->
        <!-- <a href="#" class="forgetpass">Forget Password?</a> -->
        <input type="submit" value="Sign in" class="btn1">
        <span style="color:#f8f9f9"><?php if(isset($message)) echo $message; ?><span>
      </form>
      <!--   <a href="#" class="dnthave">Don’t have an account? Sign up</a> -->
  </div> 
  <div class="footer">
      
  </div>
</div>
