<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="//getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/signin.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>    
    <div class="container">

      <?=form_open('register',array('class'=>'form-signin'));?>

        <?=validation_errors('<div role="alert" class="alert alert-danger">', '</div>'); ?>

        <h2 class="text-center">Please fill out the form to register</h2>

        <div class="form-group">
          <?=form_input('first_name', set_value('first_name'), 'class="form-control" placeholder="First Name" autofocus');?>
        </div>
        <div class="form-group">
         <?=form_input('last_name',set_value('last_name'), 'class="form-control" placeholder="Last Name"');?>
        </div>
        <div class="form-group">
          <?=form_input('username',set_value('username'), 'class="form-control" placeholder="Username"');?>
        </div>
        <div class="form-group">
          <?=form_password('password','', 'class="form-control" placeholder="Password"');?>
        </div>
        <div class="form-group">
          <?=form_password('verify_password','', 'class="form-control" placeholder="Verify Password"');?>
        </div>
        <div class="form-group">
          <?=form_input('email',set_value('email'), 'class="form-control" placeholder="Email"');?>
        </div>

        <div class="form-group clearfix">
          <p><a class="pull-left" href="<?=base_url('login')?>">Login</a><!--  <a class="pull-right" href="#">Forgot Password</a> --></p>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <?=form_close();?>

    </div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url('assets/js/ie10-viewport-bug-workaround.js')?>"></script>
  </body>
</html>