<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - All Berita</title> 
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
            <li class="breadcrumb-item active"><span style="color: white;">Berita</span> </li>
        </ol>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Blog Post -->
                <?php
                    foreach ($data as $colValue): 
                        
                    ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 my-auto">
                                        <!-- <a href="#"> -->
                                        <img class="img-fluid rounded IMGberita" src="<?php echo base_url().'assets/images/berita/'.$colValue->GAMBAR ?>"  alt="">
                                        <!-- </a> -->
                                    </div>
                                    <div class="col-lg-8 ">
                                        <h4 class="card-title text-justify judulBRT crop2"><?php echo $colValue->JUDULBERITA?></h4>
                                        <div class="card-text text-justify isiBRT crop3" >
                                            <?php
                                                $dom = new DOMDocument();
                                                $paragraphs = array();
                                                $dom->loadHTML($colValue->ISIBERITA);
                                                foreach($dom->getElementsByTagName('p') as $node)
                                                {
                                                
                                                    $paragraphs[] = $dom->saveHTML($node);
                                                
                                                }
                                                // print_r($paragraphs[0]);
                                                $n=0;
                                                $loop='true';
                                                while($loop=='true') {
                                                    if(strlen($paragraphs[$n])>150){
                                                        print_r($paragraphs[$n]);
                                                        $loop='false';
                                                    }else{
                                                        if($n==(count($paragraphs)-1)){
                                                            echo "..................................................................................................................................................................................................................................................................................................";
                                                            $loop='false';
                                                            
                                                        }
                                                    }
                                                    $n+=1;
                                                  }
                                            ?>
                                        </div>
                                        <?php
                                            if(($this->session->userdata('sess_role') == 'bkl01' || $this->session->userdata('sess_role') == 'bkl02' && $this->session->userdata('sess_login') == TRUE)){
                                                ?>
                                                    
                                                    <div class="border-top border-right border-left float-left text-center text-capitalize" style="width:auto;padding-left: 10px; padding-right: 10px;font-size:13px;">
                                                        <span style="font-size: 12px; color: rgb(172, 172, 172);">
                                                            <i class="far fa-user"></i>
                                                        </span><?php echo $colValue->NAMALENGKAP?>&nbsp;&nbsp;&nbsp;  
                                                      <a class="text-primary" href="<?php echo site_url().'c_berita/updateNews/'.$colValue->IDBERITA?>" style="font-size:13px;">Update</a>
                                                      -
                                                      <a class="text-danger" href="<?php echo site_url().'c_berita/deleteNews/'.$colValue->IDBERITA?>" style="font-size:13px;">Delete</a>
                                                    </div>
                                                <?php
                                            }else{
                                              ?>
                                                  <div class="border-top border-right border-left float-left text-center text-capitalize" style="width:auto;padding-left: 10px; padding-right: 10px;font-size:13px;">
                                                      <span style="font-size: 12px; color: rgb(172, 172, 172);">
                                                            <i class="far fa-user"></i>
                                                      </span><?php echo $colValue->NAMALENGKAP?>
                                                  </div>
        
                                              <?php
                                            }
                                        ?>
                                        <table class="" style="width:100%;padding: 15px; 15px; font-size:14px;">
                                            <tr class="border-bottom border-top">
                                                <td class="text-left" style="padding-top: 8px;padding-bottom: 8px;">
                                                    <!-- Posted on January 1, 2017 -->
                                                    <span style="font-size: 12px; color: rgb(172, 172, 172);">
                                                        <i class="far fa-calendar"></i>
                                                    </span>
                                                    <?php
                                                    $bulan = array(
                                                        "January" => "Januari", "February" => "Februari", "March" => "Maret", "April" => "April",
                                                        "May" => "Mei", "June" => "Jun", "July" => "Juli", "August" => "Agustus",
                                                        "September" => "September", "October" => "Oktober", "November" => "November", "December" => "Desember"
                                                        
                                                    );
                                                    $hari = array(
                                                        "Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu",
                                                        "Thursday" => "Kamis", "Friday" => "Jumat", "Saturday" => "Sabtu"
                                                    );
                                                    $tmp= date('l j F Y', strtotime($colValue->TGLBERITA));
                                                    $tglConversi=explode(" ",$tmp);
                                                   
                                                    echo $hari[$tglConversi[0]].", ".$tglConversi[1]." ".$bulan[$tglConversi[2]]." ".$tglConversi[3];
                                                    ?>
                                                </td>
                                                <td class="text-right" style="padding-top: 8px;padding-bottom: 8px;">
                                                <a href="<?php echo site_url().'berita/'.$colValue->IDBERITA.'/'.url_title($colValue->JUDULBERITA, 'dash', true).'.html';?>" class="">Read More &rarr;</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                ?>
                
                <div class="row">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header card-color text-light">Twitter</h5>
                    <div class="card-body">
                    <a class="twitter-timeline" data-height="350" href="https://twitter.com/kominfobkl?ref_src=twsrc%5Etfw">Tweets by kominfobkl</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                    </div>
                </div>
            
            <!-- Side Widget -->
                <div class="card">
                    <h5 class="card-header card-color text-light">Facebook</h5>
                    <div class="card-body text-center">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/diskominfobkl/" data-tabs="timeline"  data-height="360" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/diskominfobkl/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/diskominfobkl/">Dinas Kominfo Kabupaten Bangkalan</a></blockquote></div>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header card-color text-light">Instagram</h5>
                    <div class="card-body">
                        <div class="row">
                            <div id="instagram-feed1" class="instagram_feed"></div>
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

  
    
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/swiper/js/swiper.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/instagramFeed/InstagramFeed.min.js'?>"></script>
    <script>
        new InstagramFeed({
                'username': 'kominfobkl',
                'container': document.getElementById("instagram-feed1"),
                'display_profile': false,
                'display_biography': true,
                'display_gallery': true,
                'callback': null,
                'styling': true,
                'items': 9,
                'items_per_row': 3,
                'margin': 1
            });
    </script>
</body>
</html>