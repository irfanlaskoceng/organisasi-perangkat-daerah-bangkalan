<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - Add Galeri</title> 
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
            <li class="breadcrumb-item"> <a href="<?php echo site_url().'c_opd'?>">Home</a></li>
            <li class="breadcrumb-item">Setting</li>
            <li class="breadcrumb-item active"><span style="color: white;"><?php echo $breadCRM?></span> </li>
        </ol>

        <div class="row justify-content-md-center">
            <div class="col-sm-4">
                <div class="card mb-4">
                    <h5 class="card-header bg-dark text-white text-center"><?php echo $formTitle?></h5>
                    <div class="card-body" style="background: rgb(233, 233, 233)">
                        <form method="post" enctype="multipart/form-data" action="<?php echo site_url().'c_opdGaleri'.$formAction?>">
                            <div class="form-group">
                                <label for="labelName">Judul</label>
                                <input style= "height:30px; font-size: 13px;" type="text" class="form-control" name="galeri_judul" >
                                <small id="emailHelp" class="form-text text-muted"><?php echo form_error('galeri_judul'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="labelAlamat">Deskripsi</label>
                                <textarea style= "font-size: 13px;" class="form-control" id="exampleFormControlTextarea1" name="galeri_deskripsi" rows="3"></textarea>
                                <small id="emailHelp" class="form-text text-muted"><?php echo form_error('galeri_deskripsi'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar</label>
                                <div class="custom-file" style="width:100%;height:30px; font-size: 13px">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file">
                                    <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                                </div>
                                <small id="emailHelp" class="form-text text-muted ml-1"><?php echo form_error('file'); ?></small>
                            </div>
                            
                            <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary m-1">Sand</button>
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