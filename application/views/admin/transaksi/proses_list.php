<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Transaksi
        </h3><br>
        <span class="pull-right">
            <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>               
        </span>
    </h3>       
</h3>
<div>
    <?php echo form_open(current_url(), array('method' => 'get')) ?>
    <div class="row">                
        <div class="col-md-3">                 
            <input autofocus type="text" name="n" id="field" placeholder="Nama" class="form-control">            
        </div>                
        <input type="submit" class="btn btn-success" value="Cari">
    </div>
</div>
<?php echo form_close() ?>
</div>
<?php echo validation_errors() ?>
<br>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="gradient">
            <tr>    
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>

            </tr>
        </thead>
        <?php               
        if (!empty($transaksi)) {
            $no = 1;
            foreach ($transaksi as $row) { 
                if ($row['status'] == 'Telah Diproses') {
                 
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['tgl_transaksi'];?></td>
                        <td><?php echo $row['kode_transaksi'];?></td>
                            <?php
                                $user  = $this->Users_model->get(array('id_users' => $row['id_users'])) ;
                            ?>
                            <td><?php echo $user['user_nama'];?></td>
                            <td><?php echo $user['user_email'];?></td>
                            
                            <?php
                            
                           
                            ?>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                            <a class="btn btn-warning btn-xs" href="<?php echo site_url('admin/transaksi/detail/' . $row['kode_transaksi']); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                            </td>
                           
                            
                        </tr>
                    </tbody>
                    <?php
                    $no++;
                }
                } 
            } else {
                ?>
                <tbody>
                    <tr id="row">
                        <td colspan="5" align="center">Data Kosong</td>
                    </tr>
                </tbody>
                <?php
            }
            ?>   
        </table>
    </div>

</div>
</div>

