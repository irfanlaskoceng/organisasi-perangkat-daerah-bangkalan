<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - Galeri Admin</title> 
    <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/modern-business.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/swiper/css/swiper.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/lightbx/css/ekko-lightbox.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesomeFree/css/all.min.css'?>" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet"> -->
    

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
            <li class="breadcrumb-item active"><span style="color: white;">Galeri</span> </li>
        </ol>

     
        <div class="row justify-content-md-center">
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item column nature">
                <div class="card h-100 p-5 shadow1"  >
                    <a class="" style="margin: auto;" href="<?php echo site_url().'c_opdGaleri/addGaleri'?>" role="button"><img  class="rounded-circle circleIcon" style="margin: auto;" src="<?php echo base_url().'assets/icons/addgaleri.png'?>" width="100" height="100"></a>  
                </div>
            </div>
            <?php
                foreach ($DataGaleri as $colValue): 
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item column nature">
                            <div class="card h-100 shadow1"  >
                                <a class="sb" href="<?php echo base_url().'assets/images/galeri/'.$colValue->NAMAGALERY?>" data-toggle="lightbox" data-gallery="example-gallery" data-max-width="450" data-title="<?php echo $colValue->JUDULGALERY?>" data-footer="<?php echo $colValue->KETGALERY?>">
                                    <figure><img class="card-img-top img-thumbnail" src="<?php echo base_url().'assets/images/galeri/'.$colValue->NAMAGALERY?>" alt=""></figure>
                                </a>
                                <a class="btn  btn-outline-info btn-sm m-1" href="<?php echo site_url()."c_opdGaleri/updateGaleri/".$colValue->IDGALERY;?>" role="button">update</a> 
                                <a class="btn btn-outline-danger btn-sm mb-1 ml-1 mr-1" href="<?php echo site_url()."c_opdGaleri/deleteGaleri/".$colValue->IDGALERY;?>" role="button">delete</a>
                            </div>
                        </div>
                    <?php
                endforeach;
            ?>
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
    <script src="<?php echo base_url().'assets/vendor/lightbx/js/ekko-lightbox.min.js'?>"></script>
    <!-- https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js -->
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
    </script>
</body>
</html>