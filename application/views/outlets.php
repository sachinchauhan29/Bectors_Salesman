<style>
  .table-responsive td,
  .table-responsive th {
    padding: 6px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .btn-blue {
    color: #fff;
    background-color: #0f6fc7;
    border-color: #096bc6;
    border-radius: 50px !important;
  }

  .btn-blue span {
    font-size: 21px;
    font-weight: bolder;
  }

  .modal-content {
    width: 107%;
  }

  .modal-content {
    background-color: white;
    margin: 6vh 2vh 0vh 2vh;
    border: 5px solid #a3a3e5 !important;
    padding: 0px !important;
    border-radius: 20px !important;
  }

  .headers {
    background: linear-gradient(to bottom, #7A4BA9, 45%, #7b6ad6 55%);
    color: white !important;
    padding: 15px;
    border-radius: 10px 10px 0 0;
    text-align: center;
  }

  .list-group-item {
    border: none;
  }

  .list-group-item:hover {
    background-color: #f0f0f0;
  }

  .btn-primary {
    width: 100%;
    background-color: #007bff;
    border-color: #007bff;
  }

  /* 
  .bgt {

    margin-top: 187px;
  } */

  #tableBody {
    height: 450px;
    overflow: scroll;
  }
</style>

<body>
  <?php //echo"<pre>"; print_r($otl);die; ?>
  <div class="module">
    <div class="logo ">
      <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-fluid">
    </div>
    <div class="module__item">



      <div class="bgt">
        <div class="header">
          <span class="hts">
            <font class="fnt text-white">Outlets
            </font>
          </span>
          <div style="position: absolute;right: 22px;top: 6px;font-size: 20px;">
            <a href="<?php echo base_url(); ?>login/logout" class="text-dark"><i class="fa fa-sign-out"
                aria-hidden="true"></i>
            </a>
          </div>
          <div class="search">
            <input type="text" id="searchInput" class="form-control" placeholder="Search">
            <i class="fa fa-search"></i>
          </div>
        </div>

        <div class="crushrushbg">
          <div class="bel be2">
            <br>
            <div class="belt ">
              <div class="dd">
                <div class="ret">
                  <div width="20%" scope="col">Retailer Name</div>
                  <div width="20%" scope="col">Retailer Code</div>
                  <div width="20%" scope="col">Action</div>

                </div>

                <div id="tableBody">
                  <?php if ($otl) {
                    $i = 1;
                    foreach ($otl as $row) {
                      if ($row['id']) { ?>

                        <div class="ret">
                          <div class="w-25"><?php echo $row['Name']; ?></div>
                          <div><?php echo $row['MobileNo']; ?></div>
                          <div>
                            <a href="#" data-toggle="modal" data-target="#myModal" data-id="<?= $row['id'] ?>"
                              data-mobile="<?= $row['MobileNo'] ?>" data-name="<?= $row['Name'] ?>"
                              data-state="<?= $row['state'] ?>" data-beat_name="<?= $row['beat_name'] ?>"
                              data-s_id="<?= $row['s_id'] ?>">
                              <button type="button" class="btn  btn-sm"><span><img
                                    src="<?php echo base_url(); ?>assets/img/next-button.PNG" width="30px" alt="logo"
                                    class="img-fluids"></span></button>
                            </a>
                          </div>

                        </div>
                        <?php $i++;
                      }
                    }
                  } ?>
                </div>


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
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="<?php echo base_url(); ?>welcome/thankyou" method="post" id="needs-validation">
        <div class="modal-content">
          <div class="modal-header headers">
            <font class="fnt text-white">Please select number of items purchased
            </font>

          </div>
          <div class="modal-body">

            <div class="form-group">
              <input type="hidden" class="form-control" name="RetailerID" id="idInput" readonly>
              <input type="hidden" class="form-control" name="Name" id="NameInput" readonly>
              <input type="hidden" class="form-control" name="MobileNo" id="MobileNoInput" readonly>
              <input type="hidden" class="form-control" name="state" id="stateInput" readonly>
              <input type="hidden" class="form-control" name="beat_name" id="beat_nameInput" readonly>
              <input type="hidden" class="form-control" name="s_id" id="s_idInput" readonly>
            </div>
            <div class="">


              <ul class="list-group text-center h4">
                <li class="list-group-item">
                  <label>
                    <input type="radio" name="Vanaspati" value="1" checked>
                    2 cases combo of Rusk Rs.10 and 20
                  </label>
                </li>
                <li class="list-group-item">
                  <label>
                    <input type="radio" name="Vanaspati" value="2">
                    4 cases combo of Rusk Rs.10 and 20
                  </label>
                </li>
                <li class="list-group-item">
                  <label>
                    <input type="radio" name="Vanaspati" value="3">
                    6 cases combo of Rusk Rs.10 and 20
                  </label>
                </li>
                <li class="list-group-item">
                  <label>
                    <input type="radio" name="Vanaspati" value="4">
                    8 cases combo of Rusk Rs.10 and 20
                  </label>
                </li>
                <li class="list-group-item">
                  <label>
                    <input type="radio" name="Vanaspati" value="5">
                    10 cases combo of Rusk Rs.10 and 20
                  </label>
                </li>
              </ul>

            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary mt-3">NEXT</button>
          </div>
        </div>
      </form>
    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Custom JavaScript to handle button click and show the ID in the modal -->
  <script>
    $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var id = button.data('id');
      var NameInput = button.data('name');
      var MobileNoInput = button.data('mobile');
      var state = button.data('state');
      var beat_name = button.data('beat_name');
      var s_idInput = button.data('s_id');
      var modal = $(this);
      modal.find('.modal-body #idInput').val(id);
      modal.find('.modal-body #NameInput').val(NameInput);
      modal.find('.modal-body #MobileNoInput').val(MobileNoInput);
      modal.find('.modal-body #stateInput').val(state);
      modal.find('.modal-body #beat_nameInput').val(beat_name);
      modal.find('.modal-body #s_idInput').val(s_idInput);

    });
  </script>

  <script>
    document.getElementById('searchInput').addEventListener('input', function () {
      const searchValue = this.value.toLowerCase();
      const tableRows = document.querySelectorAll('#tableBody .ret');

      tableRows.forEach(row => {
        const cells = row.querySelectorAll('div');
        let rowText = '';
        cells.forEach(cell => {
          rowText += cell.textContent.toLowerCase() + ' ';
        });

        if (rowText.includes(searchValue)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script>
    window.onpageshow = function (event) {
      if (event.persisted || (performance && performance.getEntriesByType("navigation")[0].type === 'back_forward')) {
        window.location.href = '<?php echo base_url('login') ?>';

      }
    };

  </script>
</body>