<?php $this->load->view('user/header'); ?>

	
<section>
    <div id="contact-page" class="container">
    	<div class="bg">
	    	  	
    		<div class="row">  	
    			<h2 class="title text-center">PENDAFTARAN</h2>
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
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>user/daftar/proses_daftar">
				    		
                            <div class="form-group col-md-12">
                                <input type="text" name="nama_users" class="form-control" required="required" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="username" class="form-control" required="required" placeholder="Username">
                            </div>
				            <div class="form-group col-md-12">
				                <input type="Email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="password" name="password" class="form-control" required="required" placeholder="Password">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="phone" class="form-control" required="required" placeholder="No. Tlp/Hp">
				            </div>
				            <div class="form-group col-md-12">
				                <TEXTAREA type="text" name="alamat" class="form-control" required="required" placeholder="Alamat"></TEXTAREA>
				            </div>
				        
				           
				                          
				            <div class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="RESET" class="btn btn-danger btn-block">RESET</button></p>
				            </div>
				            <div  class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">DAFTAR</button></p>
				            </div>				            
				        </form>
				       
	    			</div>
	    		</div>
	    			    		
   			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
  </section>



<?php $this->load->view('user/footer'); ?>