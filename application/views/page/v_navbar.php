<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url().'home'?>">
                <img src="<?php echo base_url().'assets/images/logo/logo-kominfo2.png'?>" class="logoOPD"  class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right ml-auto justify-content-end" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link active" href="<?php echo site_url().'home'?>">Home</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn dropdowntop" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="<?php echo site_url().'visi-misi'?>">Visi Misi</a>
                            <a class="dropdown-item" href="<?php echo site_url().'tugas-dan-fungsi'?>">Tugas Dan Fungsi</a>
                            <a class="dropdown-item" href="<?php echo site_url().'struktur-organisasi'?>">Struktur Organisasi</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'berita'?>">Berita</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dokumen
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn dropdowntop" aria-labelledby="navbarDropdownBlog">
                            <?php
                                $dataDokumen=$this->m_opd->get_all_data('dokumen')->result();
                                foreach ($dataDokumen as $colValue): 
                                    ?>
                                        <a class="dropdown-item" href="<?php echo site_url().'dokumen/'.$colValue->IDDOKUMEN.'/'.url_title($colValue->JUDULDOKUMEN, 'dash', true).'.html';?>"><?=$colValue->JUDULDOKUMEN?></a>
                                    <?php
                                endforeach;
                            ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'galeri'?>">Galeri</a>
                    </li>
                        <?php
                        if(($this->session->userdata('sess_role') == 'bkl01' || $this->session->userdata('sess_role') == 'bkl02') && $this->session->userdata('sess_login') == TRUE){
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Setting
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animate slideIn dropdowntop" aria-labelledby="navbarDropdownBlog">
                                    <?php
                                    if($this->session->userdata('sess_role') == 'bkl01' ){
                                        ?>
                                            <a class="dropdown-item" href="<?php echo site_url().'c_user'?>">User</a>
                                        <?php
                                    }
                                    ?>
                                    <a class="dropdown-item" href="<?php echo site_url().'c_opdGaleri/imgCarousel'?>">Carousel Image</a>
                                    <a class="dropdown-item" href="<?php echo site_url().'c_opdGaleri/linkCarousel'?>">Carousel Link</a>
                                    <a class="dropdown-item" href="<?php echo site_url().'c_opdGaleri/galeriAdmin'?>">Galeri</a>
                                    <a class="dropdown-item" href="<?php echo site_url().'c_dokumen'?>">Dokumen</a>
                                    <a class="dropdown-item" href="<?php echo site_url().'c_berita/addBerita'?>">Add Berita</a>
                                </div>
                            </li>
                            <?php
                        }

                        if($this->session->userdata('sess_login') == TRUE){
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo base_url().'assets/images/user/'.$this->session->userdata('sess_photo')?>" width="34" height="34" class="rounded-circle" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animate slideIn dropdowntop" aria-labelledby="navbarDropdownBlog">
                                    <a class="dropdown-item" href="<?php echo site_url()."c_user/profilUser/".$this->session->userdata('sess_id');?>"><?php echo $this->session->userdata('sess_nama')?></a>
                                    <a class="dropdown-item" href="<?php echo site_url().'c_opd/logout'?>">Logout</a>
                                </div>
                            </li> 
                            <?php
                        }else{
                            ?>
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="<?php echo site_url().'/c_login_register'?>"> <p>Login/Register</p> </a> -->
                               <table style="margin-top:12px">
                                   <tr>
                                       <td><a class="lgi" href="<?php echo site_url().'/c_login_register'?>">Login</a></td>
                                       <td><a class="lgi" href="<?php echo site_url().'/c_login_register/register'?>">Register</a></td>
                                   </tr>
                               </table>
                                 
                            </li>
                            <?php
                        }
                        ?>
                </ul>
            </div>
        </div>
    </nav>