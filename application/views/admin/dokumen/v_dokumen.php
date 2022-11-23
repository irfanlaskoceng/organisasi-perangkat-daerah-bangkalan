<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - All Dokumen</title> 
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
            <li class="breadcrumb-item"> Setting</li>
            <li class="breadcrumb-item active"><span style="color: white;">Dokumen</span> </li>
        </ol>

        <div class="row justify-content-md-center">
            <div class="col-sm-12">
                <!-- //Table -->
                <div class="table-responsive">
                    <table class="table"  id="tableOne">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=0;
                                foreach ($DataDokumen as $colValue): 
                                    ?>
                                        <tr class="table-dark text-center my-auto">
                                            <td class="align-middle"><?=$n+=1?></td>
                                            <td class="align-middle"><?=$colValue->JUDULDOKUMEN?> </td>
                                            <td class="align-middle"><?=$colValue->KETDOKUMEN ?></td>
                                            <td class="align-middle">
                                                    <a href="<?php echo site_url().'dokumen/'.$colValue->IDDOKUMEN.'/'.url_title($colValue->JUDULDOKUMEN, 'dash', true).'html';?>" style="width:63px; margin-bottom:2px;margin-right:2px" class="btn btn-sm btn-info" role="button">Check</a>
                                                    <a href="<?php echo site_url().'c_dokumen/updateDokumen/'.$colValue->IDDOKUMEN;?>" style="width:63px; margin-bottom:2px;margin-right:2px" class="btn btn-sm btn-primary" role="button">Update</a>
                                                    <a href="<?php echo site_url().'c_dokumen/deleteDokumen/'.$colValue->IDDOKUMEN;?>" style="width:63px;margin-bottom:2px;margin-right:2px" class="btn btn-sm btn-danger" role="button">Delete</a>
                                            </td>
                                            
                                        </tr>
                                    <?php
                                endforeach;
                            ?>
                            

                            <tr class="table-dark text-center my-auto">
                                <td colspan="4" class="align-middle"><a href="<?php echo site_url().'c_dokumen/addDokumen'?>"  class="btn btn-sm btn-secondary" role="button">Add Dokumen</a></td>
                            </tr>
                            
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
    <script>
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>
</html>