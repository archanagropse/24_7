 <!DOCTYPE html>

<html lang="en">

  <head>

<meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/logo/favicon.png">

      <title>Login: 24/7 Care</title>

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ionicons.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/simple-line-icons.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.mCustomScrollbar.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/responsive.css">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

  </head>

<body class="bg_darck">

  <div class="sufee-login d-flex align-content-center flex-wrap">

        <div class="container">

            <div class="login-content">

                <div class="logo">

                    <a href="<?php echo base_url('Admin/dashboard');?>">

                        <strong class="logo_icon">

                            <img alt="" src="<?php echo base_url();?>assets/images/logo/logo_white.png" alt="Logo">

                        </strong>

                        <span class="logo-default">

                            <img alt="" src="<?php echo base_url();?>assets/images/logo/logo_white.png" alt="Logo">

                        </span>

                    </a>

                </div>

                <div class="login-form">

                    <form action="" method="post">
                        <?php echo $this->session->flashdata('response'); ?>

                        <div class="form-group">

                            <label>Username</label>

                            <input type="text" class="form-control" placeholder="Username"name="username">
                            <?php echo form_error('username');?>

                        </div>

                        <div class="form-group">

                            <label>Password</label>

                            <input type="password" class="form-control" placeholder="Password"name="password">
                             <?php echo form_error('password');?>
                        </div>

                        

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                        

                    </form>

                </div>

            </div>

        </div>

    </div>

             <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/Chart.bundle.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/utils.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/chart.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>

            <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
            
            <script>
                
            </script>

    </body>

</html>