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
            <li class="breadcrumb-item"> Profil</li>
            <li class="breadcrumb-item active"><span style="color: white;">Visi Misi</span> </li>
        </ol>

        <div class="row justify-content-md-center">
            <div class="col-sm-12">
                <div class="bg-white p-4 animate2 slideIn" style="border-radius: 5px;">  
                    <h4 class="text-center animated ">Visi dan Misi Dinas Komunikasi dan Informatika Kabupaten Bangkalan Mengacu pada Visi dan Misi Bupati dan Wakil Bupati Kabupaten Bangkalan. </h4> 
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="ml-2">
                                <h4 class="text-primary mt-3">Visi</h4>
                                <p>Terwujudnya Tata Kelola Komunikasi dan Informatika menuju Pemerintahan yang Efektif , Efisien, dan Berorientasi Pelayanan Publik. </p>

                            </div>                         
                        </div>
                        <div class="col-sm-6 pl-3" >
                        <div class="ml-2">
                            <h4 class="text-primary mt-3">Misi</h4>
                            <ul style="padding-left: 13px;">
                                <li>Meningkatnya Kemampuan Sumber Daya Aparatur Dalam Bidang Teknologi Informasi dan Komunikasi.</li>
                                <li>Meningkatnya Kapasitas Infrastruktur Teknologi Informasi Dan Komunikasi.</li>
                                <li>Meningkatnya Tata Kelola Sistem Informasi untuk Pelayanan Publik.</li>
                            </ul>
                        </div>
                        </div>
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