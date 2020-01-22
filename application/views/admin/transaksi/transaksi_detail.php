<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="col-md-12 main">
            <h3>
                Detail Transaksi
                <span class=" pull-right">
                    <a href="<?php echo site_url('admin/transaksi') ?>" class="btn btn-info btn-sm"><span class="fa fa-arrow-left"></span>&nbsp; Kembali</a> 
                    
                </span>
            </h3><br>
        </div>
		<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>
        <div class="col-md-12">
            <table class="table table-striped">
                <tbody>
                    <?php
                        foreach ($transaksi as $row) {
                            # code...
                        }
                    ?>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?php echo pretty_date($row['tgl_transaksi'], 'd F Y', FALSE); ?></td>
                        
                    </tr>
                    <tr>
                        <td>Kode Transaksi</td>
                        <td>:</td>
                        <td><span class="cap"><?php echo $row['kode_transaksi'] ?></span></td>
                    </tr>
                    <tr>
                        <td>Jumlah Baris</td>
                        <td>:</td>
                        <td><?php echo $row['jml_baris'] ?></td>
                    </tr>
                    <tr>
                        <td>Total Biaya</td>
                        <td>:</td>
                        <td><?php echo $row['total_biaya'] ?></td>
                        <!-- <td><?php echo ($transaksi['transaksi_status'] == 0) ? 'Non-Aktif' : 'Aktif' ?></td> -->
                    </tr>
                    <tr>
                        <td>Tanggal Tayang</td>
                        <td>:</td>
                        <td><?php
                             $tgl = explode(",", $row['tgl_tayang']);
                                foreach ($tgl as $a) {
                                    echo date('d F Y', strtotime($a))."<b style=' font-size: 18px'> | </b>";
                                }


                            ?></td>
                    </tr>
                    <tr>
                        <td>Pesan</td>
                        <td>:</td>
                        <td><pre><?php echo $row['pesan_iklan'] ?></pre></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo $row['status'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
                    <?php
                  
                        
                    if ($konfirmasi) {
?>
        <div class="col-md-12 main">
            <h3>
                Detail Pembayaran
            </h3><br>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <tbody>
                    <?php

                        foreach ($konfirmasi as $row) {
                               
                           
                    ?>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?php echo pretty_date($row['tgl_bayar'], 'd F Y', FALSE); ?></td>
                        
                    </tr>
                    <tr>
                        <td>Jumlah Bayar</td>
                        <td>:</td>
                        <td><span class="cap"><?php echo $row['jml_bayar'] ?></span></td>
                    </tr>
                    <tr>
                        <td>Nama Bank Anda</td>
                        <td>:</td>
                        <td><?php echo $row['nama_bank'] ?></td>
                    </tr>
                    <tr>
                        <td>No. Rekening</td>
                        <td>:</td>
                        <td><?php echo $row['no_rek'] ?></td>
                        <!-- <td><?php echo ($transaksi['transaksi_status'] == 0) ? 'Non-Aktif' : 'Aktif' ?></td> -->
                    </tr>
                    <tr>
                        <td>Atas Nama</td>
                        <td>:</td>
                        <td><?php echo $row['nama_rek'] ?></td>
                    </tr>
                    <tr>
                        <td>Bank Tujuan</td>
                        <td>:</td>
                        <td><?php echo $row['tujuan_byr'] ?></td>
                    </tr>
                    <?php
                        } 
                    }else{
                            ?>
                    <div class="col-md-12 main">
                        <h3>
                            Detail Pembayaran
                        </h3><br>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tr>
                                <td style="text-align: center"><b>Belum Melakukan Pembayaran</b></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
