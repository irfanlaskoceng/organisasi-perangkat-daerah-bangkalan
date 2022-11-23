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
    
    <style>
        

        .sb:hover{
          animation-name: learn;
          animation-duration: 1s;
          -webkit-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
          -moz-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
          box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
          }

        @keyframes learn {
            from {opacity: 0;}
            to {opacity: 1;}
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
            <li class="breadcrumb-item active"><span style="color: white;">Galeri</span> </li>
        </ol>

     
        <div class="row justify-content-md-center">
            

            <?php
                foreach ($DataGaleri as $colValue): 
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item column nature">
                            <div class="card h-100"  >
                                <a class="sb" href="<?php echo base_url().'assets/images/galeri/'.$colValue->NAMAGALERY?>" data-toggle="lightbox" data-gallery="example-gallery" data-max-width="450" data-title="<?php echo $colValue->JUDULGALERY?>" data-footer="<?php echo $colValue->KETGALERY?>">
                                    <figure><img class="card-img-top img-thumbnail" src="<?php echo base_url().'assets/images/galeri/'.$colValue->NAMAGALERY?>" alt=""></figure>
                                </a>
                                
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