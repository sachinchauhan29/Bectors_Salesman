<body>

    <style>
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

        body {
            padding: 0;
            margin: 0;
            background: #4f5cf8;
            background-image: url("../assets/img/5.PNG");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: auto;
            padding: 0;
            margin: 0;
            color: white !important;
            font-family: myFirstFont;
            overflow: auto;
            /* background: #4f5cf8; */
        }



        .eligible {
            text-align: center;
            padding: 20px 1px 20px 1px;
            position: relative;
            z-index: 9999;
            width: 200px;
        }

        font.fnt {
            font-size: 22px;
            letter-spacing: 1px;
            font-weight: bold;
            animation: bg 2s infinite;
            background: linear-gradient(to bottom right, #fff, white);
            background-clip: border-box;
            -webkit-background-clip: text;
            color: #f8f008;
            padding: 4px;
            display: block;
            /* width: 221px; */
            margin: auto;
        }

        div.belt {
            padding: 4px;
            display: block;
            /* margin-top: 160px; */
        }

        div.dd {
            text-align: left;
            color: white;
            padding: 0px 1px;
            /* width: 100%; */
            animation: zoom 1s 1;
            position: relative;
            top: 0;
        }

        .img-fluids {
            position: absolute;
        }

        .ddm {
            /* text-align: center; */
            /* margin-bottom: 10px; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            top: 160px;
            position: relative;
        }

        .imgbottom {
            align-items: center;
            position: fixed;
            bottom: 10px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 100%;
        }

        .pack {
            border: 2px solid #fde022;
            border-radius: 20px;
            width: 160px;
            margin: auto;
        }
    </style>


    <div class="moduless">
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-fluid">
        </div>
        <div class="module__item">


            <div class="bgm">
                <div class="crushrushbg">
                    <div class="bel be2">
                        <div class="belt ">
                            <h4 class="text-center">Our Retailer</h4>

                            <img src="<?php echo base_url(); ?>assets/img/Groupcard.PNG" height="380px" width="100%"
                                alt="logo" class="img-fluids">
                            <div class="ddm">

                                <div class="eligible eligibles">

                                    <?php if (!empty($highest_user)): ?>
                                        <font class="fnt" style="font-size:18px">

                                            <p><?php echo $highest_user['Name']; ?></p>

                                        </font>
                                        <p>JUST WON</p>
                                        <font class="fnt">
                                            <p class="pack">₹ <?php echo $highest_user['total_amount']; ?> </p>
                                        </font>
                                    <?php else: ?>
                                        <p>No data available for the given beat name and date.</p>
                                    <?php endif; ?>


                                </div>
                                <div class="mt-4" style="    position: relative;
     left:40px"> <img src="<?php echo base_url(); ?>assets/scretch/rusk.png" width="100px" style="    rotate: -34deg;
    z-index: 9;
    position: absolute;
    left: -69px;" alt="scratch">
                                    <img src="<?php echo base_url(); ?>assets/scretch/rusk.png" width="100px"
                                        style="rotate: 10deg;" alt="scratch">
                                </div>
                                <p class="text-white mt-2">Could you be the next winner?</p>
                                <div class="mb-5">
                                    <a href="<?php echo base_url('Welcome') ?>">
                                        <button type="submit" class="btn btn-blue">Let`s start</button></a>
                                </div>
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
                window.location.href = '<?php echo base_url('Welcome/highest') ?>';

            }
        };

    </script>