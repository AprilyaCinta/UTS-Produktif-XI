<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Tambah Penggunaan <b><?=$data_Penggunaan->nama_pelanggan?></b></h3>
            </div
            <div class="body">
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
                <form action="<?=base_url('index.php/penggunaan/simpan')?>" method="post">            
                <table class="table table-hover table-striped">
                    <tr>
                        <td>NAMA PELANGGAN</td><td>
                          <input type="hidden" name="id_pelanggan" value="<?=$data_Penggunaan->id_pelanggan?>">
                          <?=$data_Penggunaan->nama_pelanggan?></td>
                    </tr>
                    <tr>
                        <td>BULAN</td><td>
                          <?php 
                          $arr_bulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                          ?>
                          <select name="bulan" class="form-control">
                            <option></option>
                            <?php foreach ($arr_bulan as $key => $bulan): ?>
                              <option value="<?=$key?>"><?=$bulan?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>TAHUN</td><td>
                          <select class="form-control" name="tahun">
                            <option></option>
                            <?php 
                          for($i=2017;$i<2022;$i++){
                            echo '<option value="'.$i.'">'.$i.'</option>';
                          }
                          ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>METER AWAL</td><td><input type="number" name="meter_awal" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>METER AKHIR</td><td><input type="number" name="meter_akhir" class="form-control"></td>
                    </tr> 
                    <tr>
                        <td></td>
                        <td>
                           <button class="btn btn-success btn-md btn-block" type="submit">Kirim</button>
                        </td>
                    </tr> 
                 </table>
                 </form>
            </div>
        </div>




