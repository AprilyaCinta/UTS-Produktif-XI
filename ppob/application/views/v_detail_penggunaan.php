<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Detail Penggunaan <b><?=$data_pelanggan->nama_pelanggan?></b></h3>
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
                <table class="table table-hover table-striped datatable">
                  <thead>
                    <tr>
                        <th>BULAN</th><th>TAHUN</th><th>METER AWAL</th><th>METER AKHIR</th><th>TOTAL PENGGUNAAN</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                     $no=0;
                      foreach ($data_detail as $Penggunaan) {
                          $no++;
                          switch ($Penggunaan->bulan) {
                            case '1':$bulan="Januari";break;
                            case '2':$bulan="Februari";break;
                            case '3':$bulan="Maret";break;
                            case '4':$bulan="April";break;
                            case '5':$bulan="Mei";break;
                            case '6':$bulan="Juni";break;
                            case '7':$bulan="Juli";break;
                            case '8':$bulan="Agustus";break;
                            case '9':$bulan="September";break;
                            case '10':$bulan="Oktober";break;
                            case '11':$bulan="November";break;
                            case '12':$bulan="Desember";break;
                            default:
                              "bukan Nama Bulan";
                              break;
                          }
                          echo '<tr>
                                  <td>'.$bulan.'</td>
                                  <td>'.$Penggunaan->tahun.'</td>
                                  <td>'.$Penggunaan->meter_awal.' KWH</td>
                                  <td>'.$Penggunaan->meter_akhir.' KWH</td>
                                  <td>'.($Penggunaan->meter_akhir-$Penggunaan->meter_awal).' KWH</td>  
                               </tr>';
                      }
                      ?>
                   </tbody>
                 </table>
            </div>
        </div>

                            

<script>
  $(".datatable").dataTable();
</script>
