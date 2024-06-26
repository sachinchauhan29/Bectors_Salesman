/*validation*/
function numberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    function alpha(event){
     if((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)||(event.charCode == 32)){
      return true;
     }else{
      return false;
     }
    }

    $(".space").keyup(function(){
       // return this.value.toUpperCase();
       $(this).val($(this).val().replace(/\s/g, ""));
       
    })
   
//   $(function () {

// var dob=$("#dob").val(),age;
// if(dob!="" && dob!=undefined){
//  age = getAge($("#dob").val());
//            $(".age-calculate").html('Age: '+age); 
// }
//         $("#dob").datepicker({
//             changeMonth: true,
//             changeDate: true,
//             changeYear: true,
//             showOn: 'button',
//             buttonImageOnly: true,
//             buttonImage: '../../../assets/images/calendar.png',
//             dateFormat: 'dd/mm/yy',
//             // yearRange: '-10:+10'   //Current Year -10 to Current Year + 10.
//             //yearRange: '+0:+10'    //Current Year to Current Year + 10.
//             //yearRange: '1900:+0'   //Year 1900 to Current Year.
//             yearRange: '1961:-18', //Year 1985 to Year 2025.
//             //yearRange: '-0:+0'     //Only Current Year.
//             //yearRange: '2025' //Only Year 2025.
//              maxDate: '-18y',
//              showAnim: 'slideDown',
//             // dateFormat: 'yy-mm-dd'
//         }).on('change', function () {
//             age = getAge(this.value);
//            $(".age-calculate").html('Age: '+age);
//             // console.log(age);

//         });
//           function getAge(dateVal) {
//             // console.log(dateVal.value);
//             var newdate = dateVal.split("/").reverse().join("-");
//             var
//                 birthday = new Date(newdate),
//                 today = new Date(),
//                 ageInMilliseconds = new Date(today - birthday),
//                 years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
//                 months = 12 * (years % 1),
//                 days = Math.floor(30 * (months % 1));
//             return Math.floor(years) + ' years ' + Math.floor(months) + ' months ' + days + ' days';

//         }
//     });

      
  function encrypted(input){
   return CryptoJS.AES.encrypt(""+input+"", "Secret Passphrase");
  }
   function decrypted(input){
   var text =CryptoJS.AES.decrypt(input, "Secret Passphrase");
    return text.toString(CryptoJS.enc.Utf8); 
  }
  // function alphanumeric(e){
      
  // }
  $('.alphanumeric').keypress(function(e){
     var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
  })


 
    
