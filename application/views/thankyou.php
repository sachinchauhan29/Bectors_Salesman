<body>

    <style>
        body {
            padding: 0;
            margin: 0;
            background: #eaeaea;
            background-image: url("../assets/img/7.PNG");
            background-repeat: repeat;
            background-position: center;
            background-size: cover;
            height: auto;
            padding: 0;
            margin: 0;
            color: white !important;
            font-family: myFirstFont;
            overflow: scroll;
        }

        .eligible {
            text-align: center;
            padding: 0px 30px 20px;
        }

        .eligible .fa {
            font-size: 48px;
            color: #4ef12b;
            border: 4px double #3b9900;
            width: 63px;
            height: 63px;
            border-radius: 50%;
            padding: 3px;
            background: #f3c7ab52;
            margin-bottom: 0px;
        }

        .btn-blue {
            color: #7f8af9;
            background-color: #ffffff;
            border-color: #ffffff;
            border-radius: 20px !important;
        }

        div.bg {
            height: 72vh;
        }

        font.fnt {
            color: #fee311;
            padding: 10px 0px 0px 0px;
        }
    </style>


    <div class="module">
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-fluid">
        </div>

        <div class="module__item">



            <div class="bgT">

                <div class="header">

                </div>
                <div class="crushrushbg">
                    <div class="bel be2">
                        <div class="shd" align="center">
                            <!-- <span class="tago "> your text </span> -->

                        </div>
                        <div class="belt ">
                            <div class="dd" style="
                                    text-align: center;
                                    margin-bottom: 10px;
                                ">
                                <div class="eligible eligibles">
                                    <font class="fnt">
                                        <h3 class="text-white">THANK YOU!!</h3>
                                        <img src="<?php echo base_url(); ?>assets/img/win.gif" width="170px"
                                            alt="scratch">
                                    </font>


                                </div>

                                <div>
                                    <img src="<?php echo base_url(); ?>assets/scretch/rusk.png" width="140px"
                                        alt="scratch">
                                    <?php
                                    $totalAmount = 0;

                                    foreach ($user_data as $user) {
                                        $totalAmount += $user['amount'];
                                    }
                                    ?>

                                    <div class="col-12">
                                        <font class="fnt">
                                            <p style="font-size:18px">You have won ₹ <?php echo $totalAmount; ?> On
                                                the purchase of English Oven Premium Rusk Rs. 10 & 20</p>
                                        </font>
                                    </div>
                                    <a href="<?php echo base_url('Welcome/highest') ?>">
                                        <button type="submit" class="btn btn-blue w-50">Next</button></a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        window.onpageshow = function (event) {
            if (event.persisted || (performance && performance.getEntriesByType("navigation")[0].type === 'back_forward')) {
                window.location.href = '<?php echo base_url('Welcome/cardthanks') ?>';

            }
        };

    </script>