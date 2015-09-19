<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo app_name(); ?> | Авторизация</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="<?php echo base_url('static'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('static'); ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url(); ?>"><b>Автомата</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Авторизуйтесь</p>
      <div class="row">
      	<div class="col-md-12">
      		<?php if(isset($login_error) AND $login_error!=''): ?>
			<div class="alert alert-danger"><?php echo $login_error ?></div>
      		<?php endif; ?>
      	</div>
      </div>
      <form action="<?php echo base_url('login'); ?>" method="post">
        <input type="hidden" name="submit" value="true">
        <input type="hidden" name="token" value="<?php echo md5(time().time()); ?>">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">    
                                  
          </div><!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
          </div><!-- /.col -->
        </div>
      </form>

    

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <script src="<?php echo base_url('static'); ?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <script src="<?php echo base_url('static'); ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  
</body>
</html>