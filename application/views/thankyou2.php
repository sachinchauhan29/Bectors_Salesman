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
    </style>


    <div class="module">
        <div class="logo" style="text-align: center; padding: 30px 0px;">
           <img src="<?php echo base_url(); ?>assets/img/logo.jpeg"
                alt="logo" class="img-fluid">
        </div>

        <div class="module__item">



            <div class="bg">

                <div class="header">



                    <!--  <span class="hts">
                        <font class="fnt">Enter Retailer details
                        </font>
                    </span> -->
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

                                    <h1>Thanks, your data has been registered successfully. Ask retailer to check SMS in
                                        his phone to play further.</h1>
                                    <a href="<?php echo base_url(); ?>welcome/"><button type="button"
                                            class="btn btn-danger mt-4">Home</button></a>
                                    <a href="<?php echo base_url(); ?>welcome/resend/<?php echo $yk; ?>">
                                        <button type="button" class="btn btn-danger mt-4">resend</button></a>

                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send?phone=<?php echo $nn; ?>&text=https://smartdecisionpoints.com/Adani_FS10_Schrech/?num=<?php echo $yk; ?>"
                                        class="btn btn-danger mt-4"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                </div>





                                <div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>