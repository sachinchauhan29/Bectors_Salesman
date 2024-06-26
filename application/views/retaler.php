<body>


    <div class="module">
        <div class="logo" style="text-align: center; padding: 30px 0px;">
           <img src="<?php echo base_url(); ?>assets/img/logo.jpeg"
                alt="logo" class="img-fluid">
        </div>

        <div class="module__item">



            <div class="bg">

                <div class="header">



                    <span class="hts">
                        <font class="fnt">Enter Retailer details
                        </font>
                    </span>
                </div>
                <div class="crushrushbg">
                    <div class="bel be2">
                        <div class="shd" align="center">
                            <!-- <span class="tago "> your text </span> -->

                        </div>
                        <div class="belt ">
                            <div class="dd">
                                <div class="tag ">
                                    <!-- <span class="tago "> your text </span> -->
                                </div>



                                <hr>
                                <form action="<?php echo base_url(); ?>welcome/thankyou" class="container" method="post"
                                    id="needs-validation">
                                    <?php $i = 0;
                                    foreach ($ret as $row) {
                                        $i++; ?>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="text-inverse" for="RetailerID">Retailer ID</label>
                                                        <input type="text" name="RetailerID"
                                                            value="<?php echo $row['RTRCompCode'] ?>" class="form-control"
                                                            id="RetailerID" placeholder="Retailer ID" autocomplete="off"
                                                            required readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter Retailer ID.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="text-inverse" for="Name">Name</label>
                                                        <input type="text" name="Name" value="<?php echo $row['Name'] ?>"
                                                            onKeyPress="return alpha(event,value)" class="form-control"
                                                            id="Name" placeholder="Name" autocomplete="off" required readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter your name.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label class="text-inverse" for="Mobile">Mobile No.</label>
                                                        <input type="number" value="<?php echo $row['MobileNo'] ?>"
                                                            class="form-control" pattern="^[789]\d{9,9}$" name="MobileNo"
                                                            id="Mobile" placeholder="Mobile No"
                                                            onKeyPress="return numberKey(event,value)"
                                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            minlength="10" maxlength="10" required autocomplete="off" readonly>

                                                        <div class="invalid-feedback">
                                                            Please provide a valid Mobile No.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-12">

                                                    <div class="form-group">
                                                        <label for="Market">Market</label>
                                                        <input type="hidden" class="form-control"
                                                            value="<?php echo $row['state'] ?>" placeholder="state" name="state"
                                                            autocomplete="off" id="state">

                                                        <input type="hidden" class="form-control"
                                                            value="<?php echo $row['RTRCompCode'] ?>" placeholder="RTRCompCode"
                                                            name="RTRCompCode" autocomplete="off" id="RTRCompCode">

                                                        <input type="hidden" class="form-control"
                                                            value="<?php echo $row['beat_name'] ?>" placeholder="beat_name"
                                                            name="beat_name" autocomplete="off" id="beat_name">

                                                        <input type="hidden" class="form-control"
                                                            value="<?php echo $row['s_id'] ?>" placeholder="s_id" name="s_id"
                                                            autocomplete="off" id="s_id">


                                                        <input type="text" class="form-control"
                                                            value="<?php echo $row['Location'] ?>" placeholder="Market"
                                                            name="Market" autocomplete="off" id="Market" required readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter Market.
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php }
                                    ; ?>

                                        <!-- <div class="col-lg-6 col-sm-6 col-12">
                                            <label>Enter Oty Purchased <small>(In No. of counts)</small></label>
                                      <div class="form-group">
                                                <label>Raag Vanaspati</label>
                                                     <select class="form-control" name="Vanaspati">
                                                         <option value="">--select--</option>
                                                           <option value="0">0</option>
                                                           <option value="1">1</option>
                                                           <option value="2">2</option>
                                                           <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                     </select>
                                                    
                                                <div class="invalid-feedback">
                                                    Please Raag Vanaspati
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-lg-6 col-sm-6 col-12">

                                 <div class="form-group">
                                                <label>Soya</label>
                                                    <select class="form-control" name="Soya">
                                                        <option value="">--select--</option>
                                                        
                                                         <option value="1">1</option>
                                                         <option value="2">2</option>
                                                         <option value="3">3</option>
                                                         <option value="4">4</option>
                                                         <option value="5">5</option>
                                                     </select>
                                                <div class="invalid-feedback">
                                                    Please provide a Soya.
                                                </div>
                                            </div>
                                        </div>-->


                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <label>Enter Qty Purchased <small>(In No. of counts)</small></label>
                                            <div class="form-group">
                                                <label>Fortune sunflower</label>
                                                <select class="form-control" name="Vanaspati">
                                                    <option value="">--select--</option>

                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <!--  <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                            <option value="11">11</option>
                                                           <option value="12">12</option>
                                                           <option value="13">13</option>
                                                           <option value="14">14</option>
                                                           <option value="15">15</option>
                                                            <option value="16">16</option>
                                                           <option value="17">17</option>
                                                           <option value="18">18</option>
                                                           <option value="19">19</option>
                                                           <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                           <option value="23">23</option>
                                                           <option value="24">24</option>
                                                           <option value="25">25</option>-->


                                                </select>

                                                <div class="invalid-feedback">
                                                    Please Raag Vanaspati
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center">
                                            <button class="btn btn-primary" type="submit">Submit </button>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                </form>





                                <div class="sep"></div>
                                <div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>