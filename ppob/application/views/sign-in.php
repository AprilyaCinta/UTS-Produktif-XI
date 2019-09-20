<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login | Klorofil - PPOB PEMBAYARAB LISTRIK</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
    <!-- GOOGLE FONTS -->
   
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo"></div>
                                <p class="lead">Login to your account</p>
                            </div>
                            <form action="<?=base_url()?>index.php/login/proses_login" id="sign_in" method="POST">
                    <div class="msg"></div>
                     <?php if ($this->session->flashdata('pesan')!=null): ?>
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$this->session->flashdata('pesan')?>
                  </div>
                <?php endif ?>
                <?php if ($this->session->flashdata('pesaneror')!=null): ?>
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$this->session->flashdata('pesaneror')?>
                  </div>
                <?php endif ?>
                    
                    <div class="input-group">
                        
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" >
                    
                    </div>

                    <br>
                    
                    <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password"> 
                    </div>
                    <br><br>
                    <br>
                    <div class="row">
                            <button class="btn btn-primary btn-md btn-block" type="submit">MASUK</button>
                            
                    </div>
                    
                </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Free Bootstrap dashboard template</h1>
                            <p>by The Develovers</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>