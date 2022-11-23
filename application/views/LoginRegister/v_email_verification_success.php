<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>veritication email succes</title>
    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            background: #780206;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061161, #780206); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
        }
        h1, h3{
            color:#FFF
        }   

        .card2{

            margin-bottom: 25px;
        font-family: 'Open Sans', sans-serif;
        background: #780206;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #061161, #780206); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        -webkit-box-shadow: 1px 0px 16px 6px rgba(212,212,212,1);
        -moz-box-shadow: 1px 0px 16px 6px rgba(212,212,212,1);
        box-shadow: 1px 0px 16px 6px rgba(212,212,212,1);
        } 
    </style>
    <link href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        
        <div class="card2 my-5">
            <br />
            <h3 align="center">System in Organisasi Perangkat Daerah Bangkalan</h3>
            <br />
            
            <?php echo $message;?>
        </div>
    </div>
</body>
</html>