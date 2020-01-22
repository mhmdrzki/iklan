<?php $this->load->view('user/header'); ?>


    
    <section>
        <div class="container">
            <div class="row">

                
            <div class="col-sm-6 col-sm-offset-3">
                    <div class="blog-post-area">
                        <h2 class="title text-center">Update Profile</h2>
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
                            <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo base_url();?>user/profile/update">
                            
                                <div class="form-group col-md-12">
                                <input type="text" name="nama_users" class="form-control" required="required" placeholder="Nama Lengkap" value="<?php echo $profile['user_nama']?>">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="username" class="form-control" required="required" placeholder="Username" value="<?php echo $profile['user_name']?>">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="Email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $profile['user_email']?>">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" name="password" class="form-control" required="required" placeholder="Password" >
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="phone" class="form-control" required="required" placeholder="No. Tlp/Hp" value="<?php echo $profile['phone']?>">
                            </div>
                            <div class="form-group col-md-12">
                                <TEXTAREA type="text" name="alamat" class="form-control" required="required" placeholder="Alamat" value=""><?php echo $profile['alamat']?></TEXTAREA>
                            </div>

                                <div class="form-group col-md-6">
                                    <p class="animate6 bounceIn"><a href="<?php echo base_url();?>/home" class="btn btn-danger btn-block">Batal</a></p>
                                </div>
                                <div  class="form-group col-md-6">
                                    <p class="animate6 bounceIn"><button type="submit" class="btn btn-success btn-block">Update</button></p>
                                </div>

                            </form>

                        </div>
                    </div><!--/blog-post-area-->



                    
                    
                    
                    
                </div>  



            </div>
        </div>
    </section>

<?php $this->load->view('user/footer'); ?>