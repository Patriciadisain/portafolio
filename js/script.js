$(document).ready(function() {
  var wHeight = $(window).height();
  
  function parallax() {
    var pHeight = $(this).outerHeight();
    var pMiddle = pHeight / 2;
    var wMiddle = wHeight / 2;
    var fromTop = $(this).offset().top;
    var scrolled = $(window).scrollTop();
    var speed = $(this).attr('data-parallax-speed');
    var rangeA = (fromTop - wHeight);
    var rangeB = (fromTop + pHeight);
    var rangeC = (fromTop - wHeight);
    var rangeD = (pMiddle + fromTop) - (wMiddle + (wMiddle / 2));
    
    if (rangeA < 0) {
      rangeA = 0;
      rangeB = wHeight
    }

    var percent = (scrolled - rangeA) / (rangeB - rangeA);
    percent = percent * 100;
    percent = percent * speed;
    percent = percent.toFixed(2);
    
    var animFromBottom = (scrolled - rangeC) / (rangeD - rangeC);
    animFromBottom = animFromBottom.toFixed(2);
    
    if (animFromBottom >= 1) {
      animFromBottom = 1;
    }

    $(this).css('background-position', 'center ' + percent + '%');
    $(this).find('.parallax-content').css('opacity', animFromBottom);
    $(this).find('.parallax-content').css('transform', 'scale(' + animFromBottom + ')');
  }
  $('.parallax').each(parallax);
  $(window).scroll(function(e) {
    $('.parallax').each(parallax);
  });


  $('#btnEnviar').click(function(){
    estado=0;
    var nombre=$('input[name="nombre"]').val();
    var correo=$('input[name="correo"]').val();
    var mensaje=$('textarea[name="mensaje"]').val();

    console.log(nombre);
    console.log(correo);
    console.log(mensaje);


    if(nombre.length<2){
      $('input[name="nombre"]').css('border-color','red');    
    }else{
      estado++;
      $('input[name="nombre"]').css('border-color','#2199e8');        
    }

    if(mensaje.length<3){
      $('textarea[name="mensaje"]').css('border-color','red');    
    }else{
      estado++;
      $('textarea[name="mensaje"]').css('border-color','#2199e8');    
    }
    
    validacion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if((correo.length<3) || (!validacion.test(correo))){
            $('input[name="correo"]').css('border-color','red');    
        }else{
            estado++;
            $('input[name="correo"]').css('border-color','#2199e8');    
        }
    $('#formContacto').submit(function(e) {
            if (ok != 3) {
                e.preventDefault();
                $('#formContacto .success').css('display','none');
                $('#formContacto .alert').css('display','block');
            }else{
                $.ajax({
                    type: 'POST',
                    url: 'envio-email.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#formContacto .success').css('display','none');
                        $('#formContacto .alert').css('display','block');
                    }
                });
                e.preventDefault();
                $('#formContacto').each(function(){
                    $(this).each (function() { this.reset(); });
                })
                setTimeout(function() {
                    $("#formContacto .success").fadeOut(1500);
                },2500);
                $('#formContacto .success').css('display','none');
            }
        });
  });
}); 