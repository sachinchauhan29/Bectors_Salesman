/*validation*/
function numberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    function alpha(event){
     if((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)){
      return true;
     }else{
      return false;
     }
    }

    $(".space").keyup(function(){
       $(this).val($(this).val().replace(/\s/g, ""));
       
    })
   
  function encrypted(input){
   return CryptoJS.AES.encrypt(""+input+"", "Secret Passphrase");
  }
   function decrypted(input){
   var text =CryptoJS.AES.decrypt(input, "Secret Passphrase");
    return text.toString(CryptoJS.enc.Utf8); 
  }
 
  $('.alphanumeric').keypress(function(e){
     var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
  })


 
    
