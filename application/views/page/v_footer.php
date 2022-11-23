      <!-- back to top -->
      <div style=""  id="tombolScrollTop" onclick="scrolltotop()">
        <span   style="font-size: 38px; color: rgb(255, 255, 255); margin-bottom:15px; margin-right:20px;width:40px;position:fixed; bottom:-4; right:10px">
        <i class="fas fa-arrow-circle-up"></i>
        </span>
      </div>
      
    <footer class="page-footer font-small blue pt-4 bg-secondary">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row justify-content-md-center">

            <!-- Grid column -->
            <div class="col-md-2 mt-md-0 mt-3">

                <!-- Content -->
                <div class="text-uppercase text-light border-top border-right border-left text-center" style="width:115px; font-size: 18px; font-weight:900">Halaman</div>
                <div class="border-top"></div>
                <ul class="list-unstyled text-left mt-3 ml-1">
                <li>
                    <a href="<?php echo site_url().'c_berita'?>" class="linkopd ">Berita</a>
                </li>
                <li>
                    <a href="#!" class="linkopd">Pengumuman</a>
                </li>
                <li>
                    <a href="<?php echo site_url().'c_opdGaleri'?>" class="linkopd">Galeri</a>
                </li>
                <li>
                    <a href="#!" class="linkopd">Website OPD</a>
                </li>
                <li>
                    <a href="#!" class="linkopd">Aplikasi OPD</a>
                </li>
                </ul>

            </div>
            <!-- Grid column -->


            <!-- Grid column -->
            <div class="col-md-2 mb-md-0 mb-3">

                <!-- Links -->
                <div class="text-uppercase text-light border-top border-right border-left text-center" style="width:125px; font-size: 18px; font-weight:900">Dokumen</div>
                <div class="border-top"></div>
                
                <ul class="list-unstyled text-left mt-3 ml-1">
                <?php
                    $dataDokumen=$this->m_opd->get_all_data('dokumen')->result();
                    foreach ($dataDokumen as $colValue): 
                        ?>
                            <li><a  class="linkopd" href="<?php echo site_url().'dokumen/'.$colValue->IDDOKUMEN;?>"><?=$colValue->JUDULDOKUMEN?></a></li>
                            
                        <?php
                    endforeach;
                ?>
                <!-- <li>
                    <a href="#!" class="linkopd">Renstra</a>
                </li>
                <li>
                    <a href="#!" class="linkopd">PPID</a>
                </li>
                <li>
                    <a href="#!" class="linkopd">Statistik Kab. Bangkalan</a>
                </li> -->
                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 mb-md-0 mb-3">

                <!-- Links -->
                <div class="text-uppercase text-light border-top border-right border-left text-center" style="width:160px; font-size: 18px; font-weight:900">Kontak Kami</div>
                <div class="border-top"></div>
                
                <ul class="list-unstyled text-left mt-3 ml-1">
                <li>
                    <b class="text-light">Dinas Komunikasi dan Informatika Kab. Bangkalan</b>
                
                </li>
                <li>
                    <label class="text-light">Jl. RE Martadinata No. 1 Bangkalan </label>
                </li>
                <li>
                    
                </li>
                <li>
                    <br>
                <label class="text-light">
                    <span style="font-size: 15px; color: rgb(247, 247, 243);">
                        <i class="fas fa-envelope"></i>
                    </span>&nbsp;diskominfo@bangkalankab.go.id</label> 
                </li>
                </ul>

            </div>
            <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->
        
        <!-- Copyright -->
        <div class="footer-copyright  py-3 bg-dark text-secondary ">
       
            <table class=" d-flex flex-row justify-content-center align-items-center" >
                <tr>
                    <td>
                        <a  class="kal" target="_blank" href="https://web.facebook.com/diskominfo.bangkalan?_rdc=1&_rdr">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                     </td>
                    <td>
                        <a  class="kal" target="_blank" href="https://twitter.com/kominfobkl">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </td>
                    <td>
                        <a  class="kal" target="_blank" href="https://www.instagram.com/kominfobkl/">
                            <i class="fab fa-instagram-square"></i>
                        </a>
                    </td>
                </tr>
            </table>
            

           
            

            <!-- <sup>©</sup> -->
            <div class="kal2 d-flex flex-row justify-content-center align-items-center" >Dinas Komunikasi dan Informatika Kab. Bangkalan</div>
            
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js'?>"></script>
    <script>
            $(document).ready(function(){
            $(window).scroll(function(){
                if ($(window).scrollTop() > 100) {
                    $('#tombolScrollTop').fadeIn();
                } else {
                    $('#tombolScrollTop').fadeOut();
                }
            });
        });

        function scrolltotop()
        {
            $('html, body').animate({scrollTop : 0},500);
        }
    </script>