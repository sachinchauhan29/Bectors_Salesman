<style>
  .err {
    color: red;
    font-weight: bold;
  }

  .pow {
    text-align: center;
    display: flex;
    justify-content: center;
    color: #fff;
    position: fixed;
    bottom: 25px;
    left: 0;
    right: 0;
    width: 100%;
  }
</style>

<body>


  <div class="module">
    <div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-fluid">
    </div>

    <div class="module__item">



      <div class="bg">

        <div class="header">



          <span class="hts">
            <font class="fnt">Log In to your Account.
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
                <form action="<?php echo base_url(); ?>login" class="container" id="needs-validation" method="post"
                  novalidate>
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                      <div class="form-group">
                        <label class="text-inverse" for="inputEmail4">Salesman Code</label>
                        <input type="text" class="form-control" name="Mobile" id="Mobile" placeholder="Salesman Code "
                          autocomplete="off" required>
                        <div class="invalid-feedback">
                          Please Enter User Name
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label class="text-inverse" for="inputpassword">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="password"
                          autocomplete="off" required>
                        <div class="invalid-feedback">
                          Please provide a valid password.
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Select beat</label>
                        <select class="form-control" name="beat_name" id="bbtt" required>

                        </select>

                        <div class="invalid-feedback">
                          Please Select beat
                        </div>
                      </div>
                    </div>
                  </div>



                  <!-- <form>

                    <div align="center">
                      <input type="button" value="UPLOAD IMG"  class="fbtn">&nbsp;&nbsp;&nbsp;
                      <input type="button" value="UPLOAD IMG" class="fbtn">&nbsp;&nbsp;&nbsp;
                      <input type="button" value="UPLOAD IMG" class="fbtn">
                    </div>
                  </form> -->
              </div>


            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 text-center">
          <input type="submit" class="btn btn-primary" name="login" value="Login">

        </div>
      </div>
      </form>


      <div class="pow">
        <p>Powered by Crazibrain Solutions Pvt. Ltd.</p>
      </div>
    </div>
  </div>

  </div>