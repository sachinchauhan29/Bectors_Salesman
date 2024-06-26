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
    html {
      box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    .scratchpad {
      width: 450px;
      height: 445px;
      border: solid 10px #FFFFFF;
      margin: 0 auto;
    }

    body {
      background: #efefef;
    }

    .scratch-container {
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      width: 100%;
    }

    /* Extra Small Devices, Phones */
    @media only screen and (max-width : 480px) {
      .scratchpad {
        width: 100% !important;
        height: 320px;
      }

      .scratch-container {
        width: 100% !important;
        margin: 0 auto;
      }
    }

    /* Custom, iPhone Retina */
    @media only screen and (max-width : 320px) {
      .scratchpad {
        width: 290px;
        height: 287px;
      }

      .scratch-container {
        width: 100% !important;
      }
    }

    .promo-container {
      background: #FFF;
      border-radius: 5px;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      width: 95%;

      margin: 0 auto;
      text-align: center;
      font-family: 'Open Sans', Arial, Sans-serif;
      color: #333;
      font-size: 16px;
      margin-top: 20px;
    }

    .btn {
      background: #56CFD2;
      color: #FFF;
      padding: 10px 25px;
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      font-weight: 600;
      text-transform: uppercase;
      border-radius: 3px;
      -moz-border-radius: 3px;
      -webkit-border-radiuss: 3px;
    }

    .promo-code {
      font-size: 18px;
      font-weight: 900;
    }
  </style>

</head>

<body>


  <div class="logo" style="text-align: center; padding: 30px 0px;">
    <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-fluid">
  </div>
  <div class="row">
    <?php
    if (!empty($user_data)) {
      foreach ($user_data as $user) {
        $amount = $user['amount'];
        $codes = isset($user->code) ? $user->code : '';
        ?>
        <div class="col-6 col-md-4">
          <a href="#">
            <img src="<?php echo base_url(); ?>assets/scretch/scratch.png" width="100%" alt="scretch">
            <?php echo $amount; ?>
            <div class="code"><?php echo $codes; ?></div>
          </a>
        </div>
        <?php
      }
    }
    ?>
  </div>
  <div class="scratch-container">
    <div id="promo" class="scratchpad"></div>
  </div>


  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background-image: url('https://i.gifer.com/2iiH.gif'); height: auto;">

        <div class="modal-body">
          <img src="https://www.pngplay.com/wp-content/uploads/12/Congratulations-Gifs-PNG-Free-File-Download.gif"
            alt="" class="img-fluid">

          <div class="promo-container" style="display:none;">
            <div class="promo-code"></div>
            <a href="<?php echo base_url(); ?>welcome/" class="btn bg-danger">Close</a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/scretch/wScratchPad.min.js"></script>

  <script type="text/javascript">


    var promoCode = '';
    var bg1 = '<?php echo base_url(); ?>assets/scretch/1.jpg';
    var bg2 = '<?php echo base_url(); ?>assets/scretch/2.jpg';
    var bg3 = '<?php echo base_url(); ?>assets/scretch/3.jpg';
    var bg4 = '<?php echo base_url(); ?>assets/scretch/4.jpg';

    var bgArray = [bg1, bg2, bg3, bg4],
      selectBG = bgArray[Math.floor(Math.random() * bgArray.length)];
    if (selectBG == bg1) {
      promoCode = '1% off';

    } else if (selectBG == bg2) {
      promoCode = '2% off';
    }
    if (selectBG == bg3) {
      promoCode = '3% off';
      //var promoCode = '';
    }
    if (selectBG == bg4) {
      promoCode = '4% off';
      //var promoCode = '';
    }
    $('#promo').wScratchPad({
      size: 70,
      bg: selectBG,
      realtime: true,
      fg: '<?php echo base_url(); ?>assets/scretch/scratch.png',
      'cursor': 'url("<?php echo base_url(); ?>assets/scretch/coin1.png") 5 5, default',


      scratchMove: function (e, percent) {


        if ((percent > 50) && (promoCode != '')) {
          setTimeout(function () {
            $('#staticBackdrop').modal('show');
          }, 4000);

          $('.promo-container').show();
          $('body').removeClass('not-selectable');
          $('.promo-code').html('Your code is: ' + promoCode);

        }
      }

    });
  </script>



</body>

</html>