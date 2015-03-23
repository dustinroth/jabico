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
      <? if($this->data->success == true) : ?>

        <div role="alert" class="alert alert-success">Thank you for registering. Please <a href="<?=base_url('login')?>">log in</a> using these credentials: <br><br>
          Username: <?=$this->input->post('username');?><br>
          Password: <?=$this->input->post('password');?>
          <!-- Please confirm your email before <a href="<?=base_url('login')?>">logging in</a>. -->
        </div>

      <? else : ?>

        <div role="alert" class="alert alert-danger">
          Something went wrong. Please <a href="<?=base_url()?>">try again</a> or contact the administrator.
        </div>

      <? endif; ?>
      

    </div> <!-- /container -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url('assets/js/ie10-viewport-bug-workaround.js')?>"></script>
  </body>
</html>