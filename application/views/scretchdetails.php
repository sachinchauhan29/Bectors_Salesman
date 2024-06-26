<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700'
    rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


  <title>Scratch Card</title>
  <style type="text/css">
    body {
      background: #efefef;
    }

    .scretch-d {
      background: #fff;
      padding: 10px;
      border: 1px dashed #000;
    }

    .scretch-d img {
      border: 3px double #8b2c92a8;
      padding: 2px;
      border-radius: 10px;
      margin-bottom: 10px;
    }
  </style>

</head>

<body>


  <div class="logo" style="text-align: center; padding: 30px 0px;">
    <img src="<?php echo base_url(); ?>assets/img/logo.jpeg" alt="logo" class="img-fluid">
  </div>

  <div class="container">
    <div class="scretch-d">
      <div class="row">
        <div class="col-6 col-md-4">
          <a href="<?php echo base_url(); ?>welcome/scretch"><img
              src="<?php echo base_url(); ?>assets/scretch/scratch.png" width="100%" alt="scretch"></a>
        </div>
        <div class="col-6 col-md-4">
          <a href="<?php echo base_url(); ?>welcome/scretch"><img
              src="<?php echo base_url(); ?>assets/scretch/scratch.png" width="100%" alt="scretch"></a>
        </div>
        <div class="col-6 col-md-4">
          <a href="<?php echo base_url(); ?>welcome/scretch"><img
              src="<?php echo base_url(); ?>assets/scretch/scratch.png" width="100%" alt="scretch"></a>
        </div>
        <div class="col-6 col-md-4">
          <a href="<?php echo base_url(); ?>welcome/scretch"><img
              src="<?php echo base_url(); ?>assets/scretch/scratch.png" width="100%" alt="scretch"></a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>



</body>

</html>