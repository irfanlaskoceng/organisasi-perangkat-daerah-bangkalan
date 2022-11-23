<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - Cek Dokumen</title> 
    <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/modern-business.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/swiper/css/swiper.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesomeFree/css/all.min.css'?>" rel="stylesheet">
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
            <li class="breadcrumb-item active"><span style="color: white;">Dokumen</span> </li>
        </ol>

        <div class="row justify-content-md-center">
            <div class="col-sm-12">
                <div class="card mb-4 tex">
                    <?php
                    if($cekTmpDokumen=='true'){
                        ?>
                            <div class="text-center my-4">
                                <img style="border-style: double;" src="<?php echo base_url().'assets/dokumen/img/'.$tmpDokumen['IMGthumbnail']?>" width="280" height="400"><br>
                                <a class="downloadcss" target="_blank" href="<?php echo base_url().'assets/dokumen/'.$tmpDokumen['NAMADOKUMEN']?>"><?php echo $tmpDokumen['KETDOKUMEN'] ?></a><br>
                                
                            </div>
                        <?php
                    }else{
                        ?>
                            <div class="text-center my-4">
                                <br><br><br><br><br><br><br>
                                
                              
                            </div>

                        <?php
                    }
                    ?>
                    
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
</body>
</html>