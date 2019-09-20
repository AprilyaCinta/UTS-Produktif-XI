<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Verifikasi Tagihan</h3>
              <p class="panel-subtitle">Last Update: <?php echo date("D, d m Y h:i:sa") ?></p>
            </div>

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
                        <th>NOMOR KWH</th><th>NAMA PELANGGAN</th><th>TGL PEMBAYARAN</th><th>BULAN BAYAR</th><th>BIAYA ADMIN</th><th>TOTAL BAYAR</th><th>STATUS</th><th>BUKTI</th><th>VERFIKASI ADMIN</th><th>AKSI</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                     $no=0;
                      foreach ($data_pembayaran as $bayar) {
                        $dt_admin=$this->admin->detail_admin(@$bayar->id_admin);
                          $no++;
                          switch ($bayar->bulan) {
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
                                  <td>'.$bayar->nomor_kwh.'</td>
                                  <td>'.$bayar->nama_pelanggan.'</td>
                                  <td>'.$bayar->tanggal_pembayaran.'</td>  
                                  <td>'.$bulan.' '.$bayar->tahun.'</td> 
                                  <td>Rp. '.$bayar->biaya_admin.'</td> 
                                  <td>Rp. '.$bayar->total_bayar.'</td>
                                  <td>'.$bayar->status_bayar.'</td>
                                  <td><a target="_blank" href="'.base_url().'assets/bukti/'.$bayar->bukti.'">'.$bayar->bukti.'</a></td>
                                  <td>'.@$dt_admin->nama_admin.'</td>
                                  <td><div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      Aksi
                                    <span class="caret"></span>
                                  </button>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="'.base_url().'index.php/verification/verificated/'.$bayar->id_pembayaran.'/'.$bayar->id_tagihan.'/lunas">Lunas</a></li>
                                      <li><a href="'.base_url().'index.php/verification/verificated/'.$bayar->id_pembayaran.'/'.$bayar->id_tagihan.'/ditolak">Ditolak</a></li>
                                    </ul></div>
                                  </td>
                               </tr>';
                      }
                      ?>
                   </tbody>
                 </table>
            </div>
        </div>
<script type="text/javascript">
  $(".datatable").dataTable();
</script>



