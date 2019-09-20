<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
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
                            <form action="<?=base_url()?>index.php/login_user/proses" id="sign_in" method="POST">
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
                    <br>
                    <div class="row">\
                        <a href="<?=base_url('index.php/login/signup')?>"><button class="btn btn-primary btn-md btn-block" type="submit">MASUK</button></a>
                        <br>
                        <a class="waves-effect" data-toggle="modal" data-target="#daftar"><button class="btn btn-success btn-md btn-block" type="submit">DAFTAR</button></a>    
                            
                    </div>
                </form>
                        </div>
                    </div>
                     <div class="modal fade" id="daftar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Pendaftaran Pelanggan</h4>
          </div>
          <div class="modal-body">
            <form action="<?=base_url('index.php/login_user/simpan')?>" method="post">
            <table style="width:100%">
                <tr>
                    <td>Nama</td>
                    <td><input required type="text" name="nama_pelanggan" class="form-control">
                </tr>
                <tr>
                    <td>Alamat</td><td><textarea required name="alamat" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Nomor KWH</td><td><input required type="text" name="nomor_kwh" class="form-control"></td>
                </tr>
                <tr>
                    <td>Daya</td>
                    <td>
                        <select name="id_tarif" class="form-control">
                            <option></option>    
                            <?php foreach ($tarif as $tarif): ?>
                                <option value="<?=$tarif->id_tarif?>"><?=$tarif->daya?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td>Username</td>
                    <td><input required type="text" name="username" class="form-control"></td>
                </tr>
                <tr>
                    <td>Password</td><td><input required type="password" name="password" class="form-control"></td>
                </tr>
            </table>
            <br>
            <button class="btn btn-success btn-md btn-block" type="submit" value="DAFTAR" name="daftar">DAFTAR</button>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="<?php echo base_url();?>assets/scripts/klorofil-common.js"></script>
</body>

</html>