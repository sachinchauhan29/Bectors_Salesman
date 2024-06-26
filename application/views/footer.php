

  <!-- <a href="" class="spinthewhill">

    <img src="https://i02.appmifile.com/images/2019/09/10/6de51f12-d9c1-4101-a291-0bc377d330f6.gif" alt=""
      class="img-fluid">

  </a> -->

  <script src="./assets/js/script.js"></script>
  <script src="<?php echo base_url();?>assets/validation.js"></script>




  <script>
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        var form = document.getElementById('needs-validation');
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      }, false);
    })();
  </script>

<script type="text/javascript">
  $("#yes").on('click',function(){
    // alert('ggg');
           
            document.getElementById("yesm").style.display="block";
            $(".no").attr('disabled',true);
            $(".yes").attr('disabled',true);

        
     })   
    $("#no").on('click',function(){
    // alert('ggg');
           
            document.getElementById("nom").style.display="block";
            $(".no").attr('disabled',true);
            $(".yes").attr('disabled',true);

        
     })                                                      
 </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
$('#Mobile').on('change', function (e) {
	var comp = $(this).val();
   
 	$.ajax({
		url:'<?php echo base_url(); ?>login/test',
		method:'post',
		data:{'comp':comp},
		success:function(data)
		{
			console.log(data);
			$("#bbtt").html('<option value="">---Select beat--</option>'+data);
			//alert(data);
		}
	}); 
	
	
});
    });
	</script>

</body>

</html>