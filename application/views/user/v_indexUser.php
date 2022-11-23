<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Organisasi Perangkat Daerah</title> 
      <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
      <link href="<?php echo base_url().'assets/css/modern-business.css'?>" rel="stylesheet">
      <link href="<?php echo base_url().'assets/vendor/swiper/css/swiper.min.css'?>" rel="stylesheet">
      <link href="<?php echo base_url().'assets/vendor/lightbx/css/ekko-lightbox.css'?>" rel="stylesheet">
      <link href="<?php echo base_url().'assets/vendor/fontawesomeFree/css/all.min.css'?>" rel="stylesheet">
      
      <style>


        /* .swiper-slide:hover{
          border: 2px solid black;
          transition:0.5s;    
        } */
        .swiperCorousel{
          width: 100%;
          padding-top: 10px;
        
        }
        /* swiper Corousel LINK */
        .swiperLink .swiper-wrapper .swiper-slide:before{
          content:'';
          position:absolute;
          top:0;
          left:0;
          width:20px;
          height:20px;
          border-top:2px solid #1d3abb;
          border-left:2px solid #1d3abb;
          transition:0.5s;
        }

        .swiperLink .swiper-slide:hover:before{
          width:100%;
          height:100%;
        }

        .swiperLink .swiper-slide:after{
          content:'';
          position:absolute;
          bottom:0;
          right:0;
          width:20px;
          height:20px;
          border-bottom:2px solid #1d3abb;
          border-right:2px solid #1d3abb;
          transition:0.5s;
        }

        .swiperLink .swiper-slide:hover:after{
          width:100%;
          height:100%;
        }

        .swiperLink{
          height: 100px;margin-top: 10px;
        }

        @media screen and (max-width: 800px){
          .swiperCorousel .swiper-wrapper .swiperCorouselSlide {
            background-position: center;
            background-size: cover;
            width: 400px;
            height: 250px;

            -webkit-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
            -moz-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
            box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);

          }
          .swiperLink{
            height: 70px;margin-top: 10px;
          }
          .swiperCorousel{
            height:280px;
          }
        }
        @media screen and (max-width: 600px) {

          .swiperCorousel .swiper-wrapper .swiperCorouselSlide{
            background-position: center;
            background-size: cover;
            width: 180px;
            height: 125px;

            -webkit-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
            -moz-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
            box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);

          }

          .swiperCorousel{
            height:160px;
          }
        }
        @media screen and (min-width: 800px){
          .swiperCorousel .swiper-wrapper .swiperCorouselSlide {
              background-position: center;
              background-size: cover;
              width: 700px;
              height: 385px;

              -webkit-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
              -moz-box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);
              box-shadow: 10px 10px 13px 0px rgba(71,71,71,1);

          }

          .swiperCorousel{
            height:420px;
          }

        }
        

        /* galeri */

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

    <header>
        <!-- Swiper -->
        <div class="swiper-container swiperCorousel">
          <div class="swiper-wrapper">
              <?php
                $n=0;
                foreach ($DataGaleri as $colValue): 
                  ?>

                  <div class="swiper-slide swiperCorouselSlide" style="background-image:url(<?php echo base_url().'assets/images/galeri/CarouselImage/'.$colValue->NAMAGALERY?>)"></div>
                  <?php
                endforeach;
              ?>
            
            
          </div>
          <!-- Add Pagination -->
          <!-- <div class="swiper-pagination swiper-pagination3"></div> -->
        </div>
      
    </header>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <div class="col-sm-12">
          <div class="swiper-container swiperLink mb-2" >
            <div class="swiper-wrapper" >
              <?php
                $n=0;
                foreach ($DataGaleri2 as $colValue): 
                  ?>
                  <!-- KETGALERY -->
                     <a class="swiper-slide" href="<?php echo $colValue->KETGALERY?>" target="_blank">
                     
                        <img style="width: 100%; height: 100%;padding:10px" class="img-fluid"   src="<?php echo base_url().'assets/images/galeri/CarouselLink/'.$colValue->NAMAGALERY?>"    alt="Responsive image">
                      
                    </a>
                  <?php
                endforeach;
              ?>
            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination"></div> -->
          </div>
        </div>
        
      </div>
      <!-- <hr class="my-1 mt-4"> -->
      
      

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <div class="rule my-2">
              <div class="line"><div></div></div>
              <div class="words"><h4 class="gradient-text"> <strong> Berita Terbaru</strong>  </h4></div>
              <div class="line"><div></div></div>
          </div>

          <!-- Blog Post -->
          <?php
            foreach ($DataBerita as $colValue):   
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
                                <div class="card-text text-justify isiBRT  crop3" >
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
                                            if(strlen($paragraphs[$n])>50){
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
                                            
                                            <div class="border-top border-right border-left float-left text-cente text-capitalizer" style="width:auto;padding-left: 10px; padding-right: 10px;font-size:13px;">
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
                                            
                                
                                <table class="" style="width:100%;padding: 15px; font-size:14px;">
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
          <div class="rule my-4">
              <div class="line"><div></div></div>
              <div class="words"><h4 class="gradient-text"> <strong> Foto Kegiatan</strong>  </h4></div>
              <div class="line"><div></div></div>
          </div>
          <!-- <h2> <u><strong> Potret</strong>  Kegiatan</u></h2> -->
          <div class="row justify-content-md-center">
            <?php
                foreach ($DataGaleri3 as $colValue): 
                    ?>
                        <div class="col-md-4  portfolio-item column nature">
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
          <div class="row">
            <div class="col-12">
              <div class="bg-white p-1" style="border-radius: 5px;"><div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/dArBsb9tQUs" allowfullscreen></iframe>
              </div></div>
            </div>
            
              
            
            
          </div>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <div class="rule my-2">
              <div class="line"><div></div></div>
              <div class="words"><h4 class="gradient-text"> <strong> Media Sosial</strong>  </h4></div>
              <div class="line"><div></div></div>
          </div>

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header card-color text-light">Twitter</h5>
            <div class="card-body">
              <a class="twitter-timeline" data-height="830" href="https://twitter.com/kominfobkl?ref_src=twsrc%5Etfw">Tweets by kominfobkl</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
            </div>
          </div>
          
          <!-- Side Widget -->
          
          <div class="card "> <!-- facebookLarge -->
            <h5 class="card-header card-color text-light">Facebook</h5>
            <div class="card-body text-center">
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0"></script>
              <div class="fb-page" data-href="https://www.facebook.com/diskominfobkl/" data-tabs="timeline"  data-height="840" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/diskominfobkl/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/diskominfobkl/">Dinas Kominfo Kabupaten Bangkalan</a></blockquote></div>

            </div>
          </div>
          <!-- <div class="card facebookSmall">
            <h5 class="card-header card-color">Facebook</h5>
            <div class="card-body text-center">
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0"></script>
              <div class="fb-page" data-href="https://www.facebook.com/diskominfobkl/" data-tabs="timeline" data-width="180" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/diskominfobkl/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/diskominfobkl/">Dinas Kominfo Kabupaten Bangkalan</a></blockquote></div>          
            </div>
          </div> -->
          
          <!-- Categories Widget -->
          <!-- <div class="card my-4">
            <h5 class="card-header card-color text-light">Instagram</h5>
            <div class="card-body">
              <div class="row">
              <div id="instagram-feed1" class="instagram_feed"></div>
              </div>
            </div>
          </div> -->
        </div>

      </div>
      <!-- /.row -->
      <div style="min-height:100px"></div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
      <?php
          $this->load->view('page/v_footer');
      ?>
    <!-- Footer -->

  
    
    
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/swiper/js/swiper.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendor/lightbx/js/ekko-lightbox.min.js'?>"></script>
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

      var swiperIMG = new Swiper('.swiperCorousel', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        speed: 1000,
        spaceBetween: 20,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows : true,
        },
        pagination: {
          el: '.swiper-pagination3',
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
            
              spaceBetween: 5
            },
            // when window width is >= 480px
            480: {
              
              spaceBetween: 10
            },
            // when window width is >= 640px
            640: {
          
              spaceBetween: 20
            }
          },
        autoplay: {
              delay: 5000,
              disableOnInteraction: false,
          },
      });
    </script>
    <script>
      var swiper = new Swiper('.swiperLink', {
        // Default parameters
        slidesPerView: 4,
        spaceBetween: 10,
        loop: true,
        // Responsive breakpoints
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          // when window width is >= 480px
          480: {
            slidesPerView: 3,
            spaceBetween: 30
          },
          // when window width is >= 640px
          640: {
            slidesPerView: 4,
            spaceBetween: 40
          }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        });

        // galeri
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
      });
      
    </script>
  </body>
</html>