<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organisasi Perangkat Daerah - Baca Berita</title> 
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
            <li class="breadcrumb-item"> <a href="<?php echo site_url().'berita'?>">Berita</a></li>
            <li class="breadcrumb-item active"><span style="color: white;">Baca Berita</span> </li>
        </ol>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Blog Post -->
                <div class="card p-3">
                    <?php
                        if($cekTmpBerita=='true'){
                            ?>
                                
                                <!-- Preview Image -->
                                <h3 class="text-justify JudulBacaBerita" ><?php echo $tmpBerita['JUDULBERITA']?></h3>
                                <table class="mb-2" style="width:100%;padding: 20px;">
                                    <tr class="border-bottom border-top" >
                                        <td class="text-left text-capitalize" style="padding-top: 8px;padding-bottom: 8px; font-size:13px;padding-left:3px">
                                        <span style="font-size: 12px; color: rgb(172, 172, 172);">
                                            <i class="far fa-user"></i>
                                        </span>
                                        <!-- Admin -->
                                        <?php echo $tmpBerita['NAMALENGKAP']?> 
                                        </td>
                                        <td class="text-right" style="padding-top: 8px;padding-bottom: 8px; font-size:13px;padding-right:3px">
                                            <?php
                                                if(($this->session->userdata('sess_role') == 'bkl01' || $this->session->userdata('sess_role') == 'bkl02' && $this->session->userdata('sess_login') == TRUE)){
                                                    ?>
                                                        [
                                                        <a class="text-primary" href="<?php echo site_url().'c_berita/updateNews/'.$tmpBerita['IDBERITA']?>" class="">Update</a>
                                                        -
                                                        <a class="text-danger" href="<?php echo site_url().'c_berita/deleteNews/'.$tmpBerita['IDBERITA']?>" class="">Delete</a>
                                                        ]&nbsp;&nbsp;&nbsp;
                                                    <?php
                                                }
                                            ?>
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
                                                $tmp= date('l j F Y', strtotime($tmpBerita['TGLBERITA']));
                                                $tglConversi=explode(" ",$tmp);
                                                
                                                echo $hari[$tglConversi[0]].", ".$tglConversi[1]." ".$bulan[$tglConversi[2]]." ".$tglConversi[3];
                                            ?>
                                            
                                        </td>
                                    </tr>
                                </table>
                                <img class="img-fluid rounded mb-2" style="height:400px" src="<?php echo base_url().'assets/images/berita/'.$tmpBerita['GAMBAR'] ?>" alt="">

                                <!-- Post Content -->
                                <div class="text-justify IsiBacaBerita">
                                    <?php echo $tmpBerita['ISIBERITA']?>
                                </div>
                            <?php
                        }else{
                            ?>
                                <p>Not found</p>
                                
                            <?php
                        }
                    ?>
                    
                    
                </div>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header card-color" id="titleComment">Leave a Comment:</h5>
                
                    <div class="card-body">
                    <div class="media border p-1 mb-2" id="tmpComment">
                        <div class="col-sm-12">
                            <span id="commentReplayNama" style="font-size: 16;font-weight: 500;"></span>
                            <p class="ml-3" id="commentReplay"></p>
                        </div> 
                    </div>
                    
                    <form method="post" id="form_komen">
                        <input type="hidden" name="berita_id" value="<?php echo $tmpBerita['IDBERITA'] ?>">
                        <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
                        <span id="success_message"></span>
                        <div class="form-group">
                            <textarea name="komen" id="komen" class="form-control" placeholder="Tulis Komentar" class="form-control" rows="2"></textarea>
                            <span id="name_comment" class="text-danger mt1"></span>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" id="btnBatal">Batal</button>
                            <input type="submit" name="contact" id="contact" class="btn btn-primary" value="Komentar">
                        </div>
                    </form>
                    <!-- Comment with nested comments -->
                    <div id="display_comment"></div>
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

<script>
        $(document).ready(function(){
            //disable button submit if empty
            $('#contact').prop('disabled', true);
            function validateNextButton() {
                var buttonDisabled = $('#komen').val().trim() === '';
                $('#contact').prop('disabled', buttonDisabled);
            }
            $('#komen').on('keyup', validateNextButton);
            
            //form submit
            $('#form_komen').on('submit', function(event){
                var tmp=$('#komentar_id').val();
                event.preventDefault();
                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/c_berita/addComment",
                    method:"POST",
                    data:$(this).serialize(),
                    dataType:"json",
                    beforeSend:function(){
                        $('#contact').attr('disabled', 'disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            if(data.name_comment != '')
                            {
                                $('#name_comment').html(data.name_comment);
                            }
                            else
                            {
                                $('#name_comment').html('');
                            }
                        }
                        if(data.success)
                        {   
                            if(tmp!='0'){
                                $('html, body').animate({
                                    scrollTop: $("#nama"+tmp).offset().top -200
                                });
                            }
                            
                            $('#success_message').html(data.success);
                            // $('#success_message').hide();
                            $('#name_comment').html('');
                            $('#form_komen')[0].reset();
                            $('#komentar_id').val('0');
                            $("#btnBatal").hide();
                            $("#tmpComment").hide();
                            load_comment();
                            
                        }
                        // $('#contact').attr('disabled', false);
                        $('#contact').prop('disabled', true);
                        function validateNextButton() {
                            var buttonDisabled = $('#komen').val().trim() === '';
                            $('#contact').prop('disabled', buttonDisabled);
                        }
                        $('#komen').on('keyup', validateNextButton);
                        
                    }
                })
            });


            //load comment
            load_comment();

			function load_comment()
			{
				$.ajax({
					url:"<?php echo base_url().'index.php/c_berita/showComment/'.$tmpBerita['IDBERITA'];?>",
					method:"POST",
					success:function(data)
					{
						$('#display_comment').html(data);
					}
				})
			}

            $(document).on('click', '.deleteReplay', function(event){
				var komentar_id = $(this).attr("id");
                $.ajax({
					url:"<?php echo base_url().'index.php/c_berita/deleteComment'?>",
                    data:{idKomentar:komentar_id},
					method:"POST",
					success:function(data)
					{
						load_comment();
                        
					}
				});
                event.preventDefault();///berfungsi agar posisi view tetap
               
			});

            //replay comment
            $(document).on('click', '.reply', function(event){
				var komentar_id = $(this).attr("id");
                var split_komentar_id = komentar_id.split("-_-");
                
				$('#komentar_id').val(split_komentar_id[0]);
                $('#commentReplayNama').html(
                    "@"+$("#nama"+split_komentar_id[1]).html()
                );
                $('#commentReplay').html(
                    $("#komentar"+split_komentar_id[1]).html()
                );
				// $('#komen').focus();
				//console.log(komentar_id);
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $("#titleComment").offset().top -100
                }, 1500,'swing', function() {
                    $("#komen").focus();
                });
                $("#btnBatal").show();
                $("#tmpComment").show("slow");
			});

            $(document).on('click', '#btnBatal', function(event){
				var komentar_id = $(this).attr("id");
				$('#komentar_id').val('0');
                $("#btnBatal").hide();
                $("#tmpComment").hide("slow");
			});
            
            if ($('#komentar_id').val() == "0") {
                $("#btnBatal").hide();
                $("#tmpComment").hide();
            } else {
                $("#btnBatal").show();
            }
            

        });
    </script>

</body>
</html>