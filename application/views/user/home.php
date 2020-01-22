
                <?php $this->load->view('user/header'); ?>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							

								<div class="item active">
									<div class="col-sm-6">
										<h1><span>Riau Pos</span></h1>
										<h2>Forum Pimpinan Redaksi Riau Pos</h2>
										<p><?php echo strip_tags(substr('',0,200));?></p>

									</div>
									<div class="col-sm-6">
										<img src="<?php echo base_url();?>media/images/slide1.jpg" class="girl img-responsive" alt="Tittle Pertama" />
										
									</div>
								</div>

								<div class="item">
									<div class="col-sm-6">
										<h1><span>Riau Pos</span></h1>
										<h2>Rujukan di Era Tsunami Informasi</h2>
										<p><?php echo strip_tags(substr('',0,200));?></p>
									</div>
									<div class="col-sm-6">
										<img src="<?php echo base_url();?>media/images/slide2.jpg" class="girl img-responsive" alt="Tittle Kedua" />

									</div>
								</div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Riau Pos</span></h1>
                                        <h2>Tittle Ketiga</h2>
                                        <p><?php echo strip_tags(substr('',0,200));?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="<?php echo base_url();?>media/images/slide3.jpg" class="girl img-responsive" alt="Tittle Ketiga" />

                                    </div>
                                </div>

							

							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">

               
				<div class="col-sm-12">
					<!-- <div class="features_items"><!--features_items-->
						<h2 class="title text-center">Riau Pos</h2>

						<p class="text-center"> PT. Riau Pos Intermedia</p>

						<p class="text-center"> Riau Pos adalah sebuah perusahaan yang bergerak di bidang pengolahan surat kabar di kota Pekanbaru yang bermula bernama Mingguan Riau Pos menjadi Harian Pagi Riau. Riau Pos Group yang bermula dari sebuah Koran kecil yaitu harian pagi Riau Pos yang diterbitkan PT. Riau Pos Intermedia, perusahaan yang berada dibawah bendera Jawa Pos Media Group terbit pertama kali pada tanggal 17 Januari 1991 dengan oplah 2.500 eksemplar. Pada tahun berikutnya terus mengalami peningkatan 7.500 eksemplar, 12.500, 18.000 dan 20.000 pada tahun 1997 Riau Pos berhasil menembus 25.000 eksemplar. Tahun 1998 sempat menembus 50.000 eksemplar dan terbesar di Sumatera bagian utara pada tahun 1998 yang terdiri dari 11 surat kabar dan memiliki 4 percetakan dengan total oplahnya mencapai 150.000 eksemplar. Riau Pos makin melebarkan sayap bisnisnya dengan membangun Koran-koran didaerah lainnya seperti Sumatera Barat, Sumatera Utara, Aceh, dan Kepulauan Riau. Riau Pos sudah memiliki 23 koran harian, selain itu terdapat 3 televisi dan 9 media online dan 1 radio. Riau Pos dimata Jawa Pos Group merupakan keperusahaan yang menjadi contoh dari perusahaan lainnya dengan banyaknya penghargaan yang didapatkan Riau Pos </p>


						<center><a href="<?php echo base_url();?>user/PesanIklan"><div style="margin-top: 10px; margin-bottom: 10px; margin-left: 10px;" class="btn btn-default get">Pesan Sekarang</div></a></center>
						
						
						
						
						
						
						
					</div><!--features_items--> 
					
					
					
					
					
				</div>
			</div>
		
	</section>

<?php $this->load->view('user/footer'); ?>