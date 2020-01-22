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
                if ($row['status'] != 'Telah Diproses' and $row['status'] != 'Ditolak' and $row['status'] != 'Transaksi Dibatalkan') {
                 
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
                            <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/transaksi/terima/' . $row['kode_transaksi']); ?>" onclick="return confirm('Apakah anda yakin ingin menerima transaksi ini?')"><span class="glyphicon glyphicon-check"></span></a>
                            <a class="btn btn-danger btn-xs" href="<?php echo site_url('admin/transaksi/tolak/' . $row['kode_transaksi']); ?>" onclick="return confirm('Apakah anda yakin ingin menolak transaksi ini?')"><span class="glyphicon glyphicon-remove"></span></a>
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
    <div >
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</div>

<script>
    $(function() {

        var transaksi_list = [
        <?php foreach ($transaksis as $row): ?>
        {
                       
            "label": "<?php echo $row['transaksi_nama'] ?>",
            "label_nik": "<?php echo $row['transaksi_nis'] ?>"

        },
    <?php endforeach; ?>
    ];
    function custom_source(request, response) {
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
        response($.grep(transaksi_list, function(value) {
            return matcher.test(value.label)
            || matcher.test(value.label_nik);
        }));
    }

    $("#field").autocomplete({
        source: custom_source,
        minLength: 1,
        select: function(event, ui) {
                // feed hidden id field                
                $("#field_id").val(ui.item.label_nik);  
                $("#field_name").val(ui.item.value);                

                // update number of returned rows
            },
            open: function(event, ui) {
                // update number of returned rows
                var len = $('.ui-autocomplete > li').length;
            },
            close: function(event, ui) {
                // update number of returned rows
            },
            // mustMatch implementation
            change: function(event, ui) {
                if (ui.item === null) {
                    $(this).val('');
                    $('#field_id').val('');
                }
            }
        });

        // mustMatch (no value) implementation
        $("#field").focusout(function() {
            if ($("#field").val() === '') {
                $('#field_id').val('');
            }
        });
    });
</script>