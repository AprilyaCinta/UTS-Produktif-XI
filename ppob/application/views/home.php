<div class="main-content">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Dashboard</h3>
            <p class="panel-subtitle">Last Update: <?php echo date("D, d m Y h:i:sa") ?></p>
        </div>
		<div class="panel-body">        
			<?php if ($this->session->userdata('id_level') == '1') {
    		echo '
    		<div class="col-lg-4 col-md-6">
			    <div class="panel panel-primary">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-user"></i></span>
			                    <span class="number">'.$totalpelanggan->totalpelanggan.'</span>
			                        <p><span class="title">Total Pelanggan</span></p>
			                </div>
			            </div>
			        </div>  
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-primary">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-user"></i></span>
			                    <span class="number">'.$totaladmin->totaladmin.'</span>
			                        <p><span class="title">Total Akun Admin</span></p>
			                </div>
			            </div>
			        </div>  
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-primary">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-user"></i></span>
			                    <span class="number">'.$totalmanager->totalmanager.'</span>
			                        <p><span class="title">Total Akun Manager</span></p>
			                </div>
			            </div>
			        </div>  
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-info">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-list"></i></span>
			                    <span class="number">'.$totaltagihan->totaltagihan.'</span>
			                        <p><span class="title">Total Tagihan</span></p>
			                </div>
			            </div>
			        </div>  
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-success">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-ok"></i></span>
			                    <span class="number">'.$tagihanl->tagihanl.'</span>
			                     <p><span class="title">Tagihan Lunas</span></p>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-danger">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-refresh"></i></span>
			                    <span class="number">'.$tagihant->tagihant.'</span>
			                     <p><span class="title">Tagihan Ditolak</span></p>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			';
}

?>      
	<?php if ($this->session->userdata('id_level') == '2') {
    	echo '
			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-info">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-list"></i></span>
			                    <span class="number">'.$totaltagihan->totaltagihan.'</span>
			                        <p><span class="title">Total Tagihan</span></p>
			                </div>
			            </div>
			        </div>  
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-success">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-ok"></i></span>
			                    <span class="number">'.$tagihanl->tagihanl.'</span>
			                     <p><span class="title">Tagihan Lunas</span></p>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="col-lg-4 col-md-6">
			    <div class="panel panel-danger">
			        <div class="panel-heading">
			            <div class="row">
			                <div class="col-xs-12 text-center">
			                    <span> <i class="glyphicon glyphicon-refresh"></i></span>
			                    <span class="number">'.$tagihant->tagihant.'</span>
			                     <p><span class="title">Tagihan Ditolak</span></p>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		';
	}

?>
		</div>
    </div>
</div>