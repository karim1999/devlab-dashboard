/*$('#submit-form').on('click', function() {
    $('#name').css('border', '1px solid #ddd');
    $('#phone').css('border', '1px solid #ddd');
    $('#email').css('border', '1px solid #ddd');
    $('#content').css('border', '1px solid #ddd');
    var name = $('#name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var content = $('#content').val();
    if (name == '' && name.length < 5) { $('#name').css('border', '1px solid #c00'); return; }
    if (phone == '' && phone.length < 6) { $('#phone').css('border', '1px solid #c00'); return; }
    if (email == '' && email.length < 10) { $('#email').css('border', '1px solid #c00'); return; }
    if (content == '' && content.length < 10) { $('#content').css('border', '1px solid #c00'); return; }
    $.ajax({
            method: 'POST',
            url: 'http://zcare.biz/email_test/email/index.php',
            data: { name: name, phone: phone, email: email, content: content }
        })
        .done(function(msg) {
            alert('تم ارسال بياناتك بنجاح شكرا لك ');
            $(this).hide();
        });
});*/



/*Important !!!!!!!!!!!!!!!!!!!!!!!!!!*/
(function() {
    $('.loading-img').fadeOut();

})();

$(function(){

   $.switcher();

});


/*$(function() {
    new WOW().init();
});*/

$('.dropdown-menu a').on('click', function(){
        window.location.href=$(this).attr('href');
});
$('.logout-nafezly').on('click',function(){ $('#logout-form').submit();});
$('.nafez-navbar,.main-content-dark-layer,.close-nafez-navbar').on('click', function() {
    $('.main-content-dark-layer').fadeToggle();
    $('.nafez-navbar-menu').toggleClass('open');
});
$(document).ready(function() {
    setTimeout(function() { $('.select2').select2() }, 120);

    $('.lazy').Lazy({
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });


});



/*window.onscroll = function() { scrollFunction() };
function scrollFunction() {
    if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
        $('#back-to-top').slideDown('fast');
    } else {
        $('#back-to-top').slideUp('fast');
    }
}
 
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}*/



setTimeout(function(){
    window.fbAsyncInit = function() {

     

    FB.init({
    xfbml            : true,
    version          : 'v4.0'
    });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


},15000);


 setTimeout(function(){


var prevScrollpos = window.pageYOffset;

  window.onscroll = function() {
        if(window.pageYOffset>60)
        {
           /* console.log(window.pageYOffset);*/
              var currentScrollPos = window.pageYOffset;
              if (prevScrollpos > currentScrollPos  ) {
                $('#nafezly-navbar').css('top','0px');
              } else   {
                $('#nafezly-navbar').css('top',"-61px");
              }
              prevScrollpos = currentScrollPos;
            }
        else
        {
             $('#nafezly-navbar').css('top','0px');
        }
}

 },2000);
document.addEventListener("DOMContentLoaded", function(){
  setTimeout(function(){
   $('.pace-activity').css({'border-top-color':'#333','border-left-color':'#333'});
   },1200);
});

 
  $('.love-favourite-area').on('click',function(){
    $('.love-favourite').toggleClass('fas heart-hearted fal');
    $('.love-favourite-count').toggleClass('heart-hearted added');
    if(!$('.love-favourite-count').hasClass('added'))
    {
      $('.love-favourite-count').text('326');
    }
    else
    {
      $('.love-favourite-count').text('325');
    }
  });


  $('a[href="'+window.location.pathname+'"]').addClass('active');
 

/* (function() {
    setTimeout(function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو'],
                datasets: [{
                    label: '',
                    data: ['120', '125', '122', '130', '133', '149'],
                    backgroundColor: 'rgba(6, 143, 239, 0.52)',
                    borderColor: 'rgba(6, 143, 239, 1)',
                    pointStyle: 'rect',
                    lineTension: '.15'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }],
                },
                hover: {
                   
                    mode: 'index'
                },
                legend: {
                    labels: {
                       
                        fontFamily: 'Tajawal',
                        defaultFontFamily: 'Tajawal',
                    }
                },
                elements: {
                    line: {
                        tension: 1  
                    }
                }
            }
        });
        $('.loading-chart').fadeOut('slow');
    }, 350);
    
})();*/