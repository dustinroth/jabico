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

    <title>Sign In</title>

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

      <?=form_open('login/sign_in',array('class'=>'form-signin'));?>

        <?=isset($this->data->message)?'<div role="alert" class="alert alert-danger"><strong>'.$this->data->message.'</strong></div>':""?>
        <h2 class="form-signin-heading text-center">Please sign in</h2>
        <div class="form-group">
          <label for="inputUsername" class="sr-only">Username</label>
          <?=form_input('username', '', 'type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus');?>
          <label for="inputPassword" class="sr-only">Password</label>
          <?=form_password('password', '', 'type="email" id="inputPassword" class="form-control" placeholder="Password" required');?>
        </div>
        <div class="form-group clearfix">
          <p><a class="pull-left" href="<?=base_url('register')?>">Register</a> <!-- <a class="pull-right" href="#">Forgot Password</a> --></p>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?=form_close();?>

    </div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url('assets/js/ie10-viewport-bug-workaround.js')?>"></script>
  </body>
</html>