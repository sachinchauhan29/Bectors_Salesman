// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});



  	
	
	//logo send js

  var Pic = ""

  function displayImage(pic) {
      let divLocation = document.getElementById("imgDiv");
      let imgElement = document.createElement("img");
      imgElement.src = pic
      divLocation.append(imgElement);
  }

  Pic = 
"https://download.logo.wine/logo/Dabur/Dabur-Logo.wine.png";

  displayImage(Pic);
	
	

// 


