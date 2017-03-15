$(document).ready(function(){
	$('.lightbox').click(function(){
		$('.backdrop, .box').animate({'opacity':'.50'}, 300, 'linear');
		$('.box').animate({'opacity':'1.00'}, 300, 'linear');
		$('.backdrop, .box').css('display', 'block');
	});

	$('.signin_lightbox').click(function(){
		$('.backdrop_signin, .box_signin').animate({'opacity':'.50'}, 300, 'linear');
		$('.box_signin').animate({'opacity':'1.00'}, 300, 'linear');
		$('.backdrop_signin, .box_signin').css('display', 'block');
	});
 
	$('.close').click(function(){
		close_box();
	});
});
 
function close_box()
{
	$('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
		$('.backdrop, .box').css('display', 'none');
	});
}

function move(points) {
  	var elem = document.getElementById("myBar");  
  	var elem2 =  document.getElementById("totalPoints");
    var width = 1;
    var id = setInterval(frame, 100);
    function frame() {
      if (width >= points) {
          clearInterval(id);
      } else {
        width++; 
          elem.style.width = width + '%'; 
          elem2.innerHTML = width;
      }
  }
}

$('.float-nav').hover(function() {
  $('.main-nav, .menu-btn').toggleClass('active');
});
