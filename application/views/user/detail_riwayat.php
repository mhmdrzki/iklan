<?php $this->load->view('user/header'); ?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol style="margin-bottom: 20px" class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Riwayat Pesanan</li>
            </ol>
        </div>



        <h2 class="title text-center">Transaksi Detail</h2>
        <div class="table-responsive cart_info">

            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">

                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Jumlah Baris</th>
                    <th>Total Biaya</th>
                    <th style="text-align: center;">Pesan Iklan</th>
                    <th style="text-align: center; width: 20%">Tanggal Tayang</th>




                </tr>
                </thead>
                <tbody>

                <tbody>
                <?php
                $status = null;

                if ($data_header) {
                    foreach ($data_header as $tampil)
                    { ?>
                        <tr >
                            <td><?php echo $tampil['tgl_transaksi'];?></td>
                            <td><?php echo $tampil['kode_transaksi'];?></td>
                            
                            <td><?php echo $tampil['jml_baris'];?></td>
                            <td>Rp. <?php echo $tampil['total_biaya'];?></td>
                            <td><pre><?php echo $tampil['pesan_iklan'];?></pre></td>
                           
                            <td><?php 
                             $tgl = explode(",", $tampil['tgl_tayang']);
                                foreach ($tgl as $row) {
                                    echo date('d F Y', strtotime($row)).", ";
                                }


                            ?></td>


                        </tr>
                        <?php
                    }
                }

                else { ?>
                    <tr>
                        <td colspan="11">No Result Data</td>
                    </tr>
                    <?php

                }
                ?>

                </tbody>


                </tbody>
            </table>

        </div>
        

        <h2 class="title text-center">Status Pembayaran</h2>
        <div style="margin-bottom: 0;" class="table-responsive cart_info">

            <table class="table table-condensed" >
                <thead>
                <tr class="cart_menu">
                    <th>Tanggal</th>
                    <th>Jumlah Bayar</th>
                    <th>Nama Bank Anda</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                    <th>Bank Tujuan</th>
                    <th>Status</th>



                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;

                if ($konfirmasi) {
                    foreach ($konfirmasi as $tampil2) {

                        ?>
                        <tr >
                            <td><?php echo $tampil2['tgl_bayar'];?></td>
                            <td>Rp. <?php echo $tampil2['jml_bayar'];?></td>
                            <td><?php echo $tampil2['nama_bank'];?></td>
                            <td><?php echo $tampil2['no_rek'];?></td>
                            <td><?php echo $tampil2['nama_rek'];?></td>
                            <td><?php echo $tampil2['tujuan_byr'];?></td>
                            <td><?php echo $tampil['status'];?></td>
                            



                        </tr>

                        <?php
                        $no++;
                    }
                    ?>

                    <?php
                }

                else { ?>
                    <tr>
                        <td colspan="6">
                            <div style="margin: 0" class="register-req" align="center">
                                Anda belum melakukan pembayaran, Silahkan melakukan konfirmasi pembayaran agar transaksi anda segera diproses.
                            </div>

                        </td>
                    </tr>
                    <?php

                }
                ?>

                </tbody>


            </table>


        </div>
        <a href="<?php echo base_url(); ?>user"><div style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px;" class="btn btn-default get pull-right">Home</div></a>
        <a href="<?php echo base_url(); ?>user/riwayat"><div style="margin-top: 10px; margin-bottom: 10px;" class="btn btn-default get pull-right">Kembali</div></a>



    </div>



</section> <!--/#cart_items-->


<?php $this->load->view('user/footer'); ?>