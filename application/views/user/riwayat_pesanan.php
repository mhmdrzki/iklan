<?php $this->load->view('user/header'); ?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol style="margin-bottom: 20px" class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li class="active">Riwayat Pesanan</li>
            </ol>
        </div>




            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Kode Transaksi</td>
                        <td>Status</td>
                        <td><center>Aksi</center></td>

                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $no = 1;
                    $id_users = $this->session->userdata('id_users');
                    $data_riwayat = $this->Transaksi_model->get(array('id_users' => $id_users)) ;
                    if ($data_riwayat) {
                        foreach ($data_riwayat as $tampil) { 
                            ?>
                            <tr >
                                <td><?php echo $no;?></td>
                                <td><?php echo $tampil['tgl_transaksi'];?></td>
                                <td><?php echo $tampil['kode_transaksi'];?></td>
                                
                                <td><?php echo $tampil['status']; ?></td>

                                <td>
                                    <center>
                                    <?php
                                        if($tampil['status'] != 'Transaksi Dibatalkan' and $tampil['status'] != 'Ditolak'){
                                    ?>

                                    <a style="color:red;" href="<?php echo base_url();?>user/riwayat/batal/<?php echo $tampil['kode_transaksi'];?>" onclick="return confirm('Apakah anda yakin ingin membatalkan transaksi??')">Batal</a>

                                    <?php }?>
                                    <a href="<?php echo base_url();?>user/riwayat/detail/<?php echo $tampil['kode_transaksi'];?>">Detail</a>
                                    </center>
                                </td>


                            </tr>
                            <?php
                            $no++;
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
                </table>

            </div>





    </div>



</section> <!--/#cart_items-->


<?php $this->load->view('user/footer'); ?>