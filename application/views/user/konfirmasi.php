<?php $this->load->view('user/header'); ?>

	
<section>
    <div id="contact-page" class="container">
    	<div class="bg">
	    	  	
    		<div class="row">  	
    			<h2 class="title text-center">Konfirmasi Pembayaran</h2>
	    		<div class="col-sm-offset-3 col-sm-6 ">
	    			<div class="contact-form">
	    				
	    				<?php 
									
							if ($this->session->flashdata('error')){
								echo "<div class='alert alert-block alert-danger show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Username atau Email Telah Terdaftar!</span>
									</div>";
							}
							
												
							?>

						
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>user/konfirmasi/add">
				    		
                            <div class="form-group col-md-12">
                            	<?php
                            		$id_users       = $this->session->userdata('id_users');

        							$kode_transaksi = $this->Transaksi_model->get(array('id_users' => $id_users));


                            	?>
                                <select name="kode_transaksi" class="form-control">
                                	<?php
                                	$data  = $this->Transaksi_model->get() ;
				    					foreach ($data as $row) {

				    						if(!$this->Konfirmasi_model->get(array('kode_transaksi' => $row['kode_transaksi'])) and $row['status'] != 'Transaksi Dibatalkan'){
				    							if ($row['status'] != 'Ditolak') {
				    							echo "<option>".$row['kode_transaksi']."</option>";
				    							}
				    						}
				    						
				    					}

                                	?>
                                	
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" id="datepicker" class="form-control" placeholder="Tanggal Pembayaran" name="tgl_bayar" required>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="jml_bayar" class="form-control" required="required" placeholder="Jumlah Pembayaran">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="nama_bank" class="form-control" required="required" placeholder="Nama Bank Anda">
                            </div>
                            <div class="form-group col-md-12">
                                <select name="tujuan_byr" class="form-control" required>
                                	<option value="">Rekening Riau Pos</option>
                                	<option value="Bank Mandiri">Mandiri (1123092384)</option>
                                	<option value="Bank BRI">BRI (1123092384)</option>
                                	<option value="Bank BNI">BNI (1123092384)</option>


                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="no_rek" class="form-control" required="required" placeholder="No Rekening Anda">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="nama_rek" class="form-control" required="required" placeholder="Atas Nama">
                            </div>
				        
				           
				                          
				            <div class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="RESET" class="btn btn-danger btn-block">RESET</button></p>
				            </div>
				            <div  class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">KONFIRMASI</button></p>
				            </div>				            
				        </form>
				       
	    			</div>
	    		</div>
	    			    		
   			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
  </section>

<script type="text/javascript">
	$( "#datepicker" ).datepicker({ 
		dateFormat:'yy-mm-dd',
		changeMonth:true,
		changeYear: true});
</script>


<?php $this->load->view('user/footer'); ?>