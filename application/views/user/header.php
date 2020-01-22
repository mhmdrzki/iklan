<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="">
    <title>Riau Pos</title>

    <link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>asset/css/responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>asset/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>asset/js/respond.min.js"></script>
    <![endif]-->
    <!-- <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
</head><!--/head-->
<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">

						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 081261353514></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> gandhialwira4@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">

							<ul class="nav navbar-nav" >
                                <?php
                             if($this->session->userdata("user_logged")== TRUE) { ?>
                                
                                <li style="padding-top: 10px" class="dropdown user">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                       <?php echo "Selamat Datang,&nbsp; <b>".$this->session->userdata('user_nama')."</b>";?>
                                        <i style="padding: 0" class="icon-angle-down"></i>
                                    </a>
                                        <ul style="min-width: 200px" class="dropdown-menu">
                                            <li style="min-width: 200px" ><a  href="<?php echo base_url();?>user/profile"><i class="icon-user"></i>Update Profile</a></li>

                                            <li style="min-width: 200px"><a  href="<?php echo base_url();?>user/riwayat"><i style="padding-right: 18px" class="icon-dollar"></i>Riwayat Pemesanan</a></li>

                                            <li style="min-width: 200px"><a href="<?php echo base_url();?>user/auth/logout"><i style="padding-right: 13px" class="icon-key"></i>Log Out</a></li>

                                        </ul>
                                </li>

                                <?php }else{ ?>
                                <li style="padding-top: 10px;padding-right: 5px"><a href="<?php echo base_url();?>user/daftar"><b>Daftar</b></a></li>
                                <li style="padding-top: 10px;padding-right: 5px">|</li>
                                <li style="padding-top: 10px"><a href="<?php echo base_url();?>user/auth"><b>Login</b></li>

                            <?php } ?>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">

							<a href="<?php echo base_url();?>"><img style="width: 200px; height: 45px;" src="<?php echo base_url();?>media/images/logo-2015.png" alt="Busana Muslim Wanita" /></a>
						</div>

						<div class="btn-group pull-right">
							
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url();?>" >Home</a></li>
								<li><a href="<?php echo base_url();?>user/CaraIklan"> Cara Pasang Iklan</a></li>
                                <li><a href="<?php echo base_url();?>user/PesanIklan"> Pesan Iklan</a></li>
                                <li><a href="<?php echo base_url();?>user/Konfirmasi"> Konfirmasi Pembayaran</a></li>
								<li><a href="<?php echo base_url();?>user/TentangKami"> Tentang Kami</a></li>
								

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
