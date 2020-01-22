<?php
$this->load->view('admin/tinymce_init');
$this->load->view('admin/datepicker');
if (isset($pengeluaran)) {
    $id = $pengeluaran['pengeluaran_id'];
    $tgl = $pengeluaran['tgl_pengeluaran'];
    $ket = $pengeluaran['ket'];
    $biaya = $pengeluaran['biaya'];
    
    
} else {
    $tgl = set_value('tgl_pengeluaran');
    $ket = set_value('ket');
    $biaya = set_value('biaya');
}
?>
<?php echo isset($alert) ? ' ' . $alert : null; ?>
<?php echo validation_errors(); ?>
<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <div class="col-lg-12">
            <h3>Cetak Laporan</h3>
            <br>
        </div>
        <!-- /.col-lg-12 -->

        <?php echo form_open('admin/laporanpdf/cetak'); ?>
        <div class="col-md-12">
            <div class="col-sm-12 col-md-8">
                
                <label >Dari Tanggal *</label>
                <input type="text" name="date_start" placeholder="Tanggal Pengeluaran" class="form-control datepicker" value="<?php echo $tgl; ?>"><br>
                
                <label >Sampai Tanggal *</label>
                <input type="text" name="date_end" placeholder="Tanggal Pengeluaran" class="form-control datepicker" value="<?php echo $tgl; ?>"><br>
                
                
                <br>
                

                <p style="color:#9C9C9C;margin-top: 5px"><i>*) Wajib diisi</i></p>


            </div>

        </div>

        <div class="col-sm-12 col-xs-12 col-md-4">
            <button name="action" type="submit" value="save" class="btn btn-success btn-form"><i class="fa fa-check"></i> Simpan</button><br>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-4">
            <button href="" type="reset" class="btn btn-info btn-form"><i class="fa fa-arrow-left"></i> Batal</button><br>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

            

                <script type="text/javascript">
                    function validate(evt) {
                      var theEvent = evt || window.event;
                      var key = theEvent.keyCode || theEvent.which;
                      key = String.fromCharCode( key );
                      var regex = /[0-9]|\./;
                      if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            </script>