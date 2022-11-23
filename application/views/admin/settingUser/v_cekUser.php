<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - All User</title> 
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
            <li class="breadcrumb-item"> <a href="<?php echo site_url().'c_opd'?>">Home</a></li>
            <li class="breadcrumb-item">Setting</li>
            <li class="breadcrumb-item active"><span style="color: white;">User</span> </li>
        </ol>

        <div class="row">
            <div class="col-sm-12">
                <!-- //Table -->
                <div class="table-responsive">
                    <table class="table"  id="tableOne">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th >Email</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=0;
                            foreach ($DataUser as $colValue): 
                                ?>
                                <tr class="table-dark text-center my-auto">
                                    <td class="align-middle"><?=$n+=1?></td>
                                    <td class="align-middle"><?=$colValue->NAMALENGKAP?></td>
                                    <td class="align-middle"><?=$colValue->EMAIL?></td>
                                    <td class="align-middle"><?=$colValue->NOHP?></td>
                                    <td class="align-middle"><?=$colValue->ALAMAT?></td>
                                    <td class="align-middle">
                                        <?php
                                        if($colValue->GENDER=='1'){
                                            ?>
                                            Laki-Laki
                                            <?php
                                        }elseif($colValue->GENDER=='2'){
                                            ?>
                                            Perempuan
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle">
                                        <?php
                                        if($colValue->ROLE=='bkl01'){
                                            ?>
                                            Super Admin
                                            <?php
                                        }elseif($colValue->ROLE=='bkl02'){
                                            ?>
                                            Admin
                                            <?php
                                        }
                                        elseif($colValue->ROLE=='bkl03'){
                                            ?>
                                            User
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle"> <img src="<?php echo base_url().'assets/images/user/'.$colValue->PHOTOUSER ?>" width="40" height="40" class="rounded-circle" alt=""></td>
                                    <td class="align-middle">
                                        <a href="<?php echo site_url()."c_user/specificUser/".$colValue->IDUSER;?>" style="width:63px; margin-bottom:2px;margin-right:2px" class="btn btn-sm btn-info" role="button">check</a>
                                        <a href="<?php echo site_url()."c_user/deleteUser/".$colValue->IDUSER;?>" style="width:63px;margin-bottom:2px;margin-right:2px" class="btn btn-sm btn-danger" role="button">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            
                        </tbody>
                    </table>
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