<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - Profil User</title> 
    <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/modern-business.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/swiper/css/swiper.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesomeFree/css/all.min.css'?>" rel="stylesheet">
    <style>
        input[type='number'] {
            -moz-appearance:textfield;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <?php
        $this->load->view('page/v_navbar');
    ?>



    <!-- Page Content -->
    <div class="container">
        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"> <a href="<?php echo site_url().'home'?>">Home</a></li>
            <li class="breadcrumb-item active"><span style="color: white;">Profil User</span> </li>
        </ol>

        <div class="row justify-content-md-center">
            <div class="col-sm-4">
                <div class="card mb-4">
                    <h5 class="card-header bg-dark text-white text-center">Profil User</h5>
                    <div class="card-body" style="background: rgb(233, 233, 233)">
                    <form>
                        <div class="row justify-content-center">
                        <img src="<?php echo base_url().'assets/images/user/'.$tmpUser['PHOTOUSER']?>" width="80" height="80" class="rounded-circle" alt="">
                        </div>
                        <div class="form-group">
                            <label for="labelName">Nama Lengkap</label>
                            <input disabled  style= "height:30px; font-size: 13px;" type="text" class="form-control" name="user_name" value="<?php echo $tmpUser['NAMALENGKAP']?>">
                        </div>
                        <div class="form-group">
                            <label for="labelName">Email</label>
                            <input disabled  style= "height:30px; font-size: 13px;" type="text" class="form-control" name="user_email" value="<?php echo $tmpUser['EMAIL']?>">
                        </div>
                        <div class="form-group">
                            <label for="labelName">No Hp</label>
                            <input disabled  style= "height:30px; font-size: 13px;" type="number" class="form-control" name="user_number" value="<?php echo $tmpUser['NOHP']?>">
                        </div>
                        <div class="form-group">
                            <label for="labelAlamat">Alamat</label>
                            <input disabled  style= "height:30px; font-size: 13px;" type="text" class="form-control" name="user_address" value="<?php echo $tmpUser['ALAMAT']?>">
                        </div>

                        <div class="form-group">
                            <label for="labelGender">Gender</label>
                            
                                <?php
                                    if($tmpUser['GENDER']=='1'){
                                        ?>
                                            <input disabled  style= "height:30px; font-size: 13px;" type="text" class="form-control" name="schoolGroups" value="Laki-laki">
                                        <?php
                                    }elseif($tmpUser['GENDER']=='2'){
                                        ?>
                                            <input disabled  style= "height:30px; font-size: 13px;" type="text" class="form-control" name="schoolGroups" value="Perempuan">
                                        <?php
                                    }
                                ?>
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div style="min-height:150px"></div>

    
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
        $this->load->view('page/v_footer');
    ?>
    <!-- Footer -->

  
    
    
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/swiper/js/swiper.min.js'?>"></script>
    <script>
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>
</html>