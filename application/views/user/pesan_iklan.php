<?php $this->load->view('user/header'); ?>

	
<section>
    <div id="contact-page" class="container">
    	<div class="bg">
	    	  	
    		<div class="row">  	
    			<h2 class="title text-center">Pesan Iklan Baris</h2>
	    		<div class="col-sm-offset-3 col-sm-6 ">
	    			<div class="contact-form" onmousemove="HitungText()">
	    				
	    				<?php 
									
							if ($this->session->flashdata('error')){
								echo "<div class='alert alert-block alert-danger show'>
									  	<button type='button' class='close' data-dismiss='alert'>×</button>
										<span>Username atau Email Telah Terdaftar!</span>
									</div>";
							}
							
												
							?>

						
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="forminput" method="post" action="<?php echo base_url();?>user/pesaniklan/add">
				    		
                            <div class="form-group col-md-12">

                                <textarea style="height: 100px" placeholder="Pesan Iklan Baris" class="form-control" type='text' size='30' name='ta' onKeyDown="textCounter(this.form.ta,this.form.countDisplay);" onKeyUp="HitungText();textCounter(this.form.ta,this.form.countDisplay);" required></textarea>
                                <span align='center' id='baris'>Detail : 0 Baris | </span>
							    <span align='center' id='karakter'>0 Karakter </span>
							    
							    <input  readonly style="margin-top: 10px; width: 30px; border: 0; text-align: right; margin-left: 45%" type="text" name="countDisplay" size="1" maxlength="3" value="340"> Sisa Karakter
							    
                            </div>
                            <div class="form-group col-md-12">
                                <input name="tgl_tayang" class="form-control" id="multiple-date-select"  placeholder="Tanggal" required="">

                                
                                <input type="hidden" name="jml_baris" value="">
                                <input type="hidden" name="total_biaya" value="">
                            </div>
				            <div class="form-group col-md-12">
				                <table style="width:100%" >
             
								                      <tr>
								                        <td>Tarif Iklan: </td>
								                        <td style="padding-right:12px">Rp. 15000/Baris</td>
								                        <td>Jumlah Baris: </td>
								                        <td><span id="baris2">0 Baris</span></td>
								                      </tr>
								                      <tr>  
								                        <td> </td>
								                        <td> </td>
								                        <td> </td>
								                        <td>&nbsp;</td>
								                      </tr>
								                      <tr>  
								                        <td>Durasi: </td>
								                        <td><span id="hari">1 Hari</span></td>
								                        <td><b>Sub Total: </b></td>
								                        <td><span><b id="biaya1">Rp. 0<b></span></td>
								                      </tr>
								                      <tr>  
								                        <td> </td>
								                        <td> </td>
								                        <td> </td>
								                        <td>&nbsp;</td>
								                      </tr>
								                      <tr>  
								                        <td></td>
								                        <td></td>
								                        <td><b>Total Biaya: </b></td>
								                        <td><span ><b id="biaya2">Rp. 0</b></span></td>
								                      </tr>

								                      
								                        
								                        
								                       


								</table>
				            </div>
				            
				        
				           
				                          
				            <div class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="RESET" class="btn btn-danger btn-block">RESET</button></p>
				            </div>
				            <div  class="form-group col-md-6">
				                <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">SUBMIT</button></p>
				            </div>				            
				        </form>
				       
	    			</div>
	    		</div>
	    			    		
   			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
  </section>
<script language='javascript'>
  function HitungText(){
    
    var Teks = document.forminput.ta.value.length;
    var total = document.getElementById('karakter');
    var baris = document.getElementById('baris');
    var baris2 = document.getElementById('baris2');
    var hari = document.getElementById('hari');
	var biaya1 = document.getElementById('biaya1');
	var biaya2 = document.getElementById('biaya2');


 	var tgl = (document.forminput.tgl_tayang.value).split(",");

 	var durasi = tgl.length;

 	if (Teks <= 340) {
    var brs = (Teks/34)+1;
    var a = brs.toString().split(".",1);

      if(Teks%34==0){
        a = a-1;
      }
	


	var ttl = (15000*a)*durasi;

    baris.innerHTML = 'Detail : '+a + ' Baris  | ';
 	baris2.innerHTML = a + ' Baris';

    total.innerHTML = Teks + ' Karakter';

    hari.innerHTML = durasi + ' Hari';
    biaya1.innerHTML = 'Rp. '+ ttl;
    biaya2.innerHTML = 'Rp. '+ ttl;

    this.forminput.jml_baris.value = a;
    this.forminput.total_biaya.value = ttl;
	}


 	
   
  }

  var maxAmount = 340;
  function textCounter(textField, showCountField) {
    if (textField.value.length > maxAmount) {
      textField.value = textField.value.substring(0, maxAmount);
    } else { 
      showCountField.value = maxAmount - textField.value.length;
    }
  }

</script>

<script>
    $('#multiple-date-select').multiDatesPicker();        
 </script>


<?php $this->load->view('user/footer'); ?>