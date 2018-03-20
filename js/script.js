$(function(){
// IPad/IPhone
	var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
	ua = navigator.userAgent,

	gestureStart = function () {viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";},

	scaleFix = function () {
		if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
			viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
			document.addEventListener("gesturestart", gestureStart, false);
		}
	};
	scaleFix();
	// Menu Android
	if(window.orientation!=undefined){
    var regM = /ipod|ipad|iphone/gi,
     result = ua.match(regM)
    if(!result) {
     $('.menu li').each(function(){
      if($(">ul", this)[0]){
       $(">a", this).toggle(
        function(){
         return false;
        },
        function(){
         window.location.href = $(this).attr("href");
        }
       );
      } 
     })
    }
   } 
});

var ua=navigator.userAgent.toLocaleLowerCase(),
 regV = /ipod|ipad|iphone/gi,
 result = ua.match(regV),
 userScale="";
if(!result){
 userScale=",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">')

if($(".owl-carousel").length){
   include("js/owl.carousel.min.js");
 }
if($(".raty").length){
   include("js/jquery.raty.js");
 }

  //----Include-Function----
function include(url){ 
  document.write('<script src="'+ url + '"></script>'); 
}
//------validation form------
  function checkEmail(currInput){
    var pattern=/^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}$/;
      if(!pattern.exec(currInput.val())){
          return false;
        }
        else{
          return true;
        }
      }
  function checkName(currInput){
    var pattern=/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/;
    if(!pattern.exec($(currInput).val())){
      return false;
    }
    else{
      return true;
    }
  }
  function checkPhone (currInput) {
    var pattern = /(\(?\d{3}\)?[\- ]?)?[\d\- ]{4,10}$/;
    if(!pattern.exec(currInput.val())){
      return false;
    }
    else{
      return true;
    }
  }

  $('.sendBtn').click(function(e){
    var errors = false;
        var currentForm = $(this).closest("form.formSend"),
        name = currentForm.find('input[name="name"]'),
        phone = currentForm.find('input[name="phone"]'),
        email = currentForm.find('input[name="email"]');
       
    if(email.length){
      if(!email.val().length || !checkEmail(email)){
        email.parent().addClass("invalid");
        errors = true;
      }
      else{
        email.parent().removeClass("invalid");
      }
    }
    if(phone.length){
      if(!phone.val().length || !checkPhone(phone)){
        phone.parent().addClass("invalid");
        errors = true;
      }
      else{
        phone.parent().removeClass("invalid");
      }
    }
    if(name.length){
      if(!name.val().length || name.val() =="Ваше имя"){
        name.parent().addClass("invalid");
        errors = true;
    }
      else{
        name.parent().removeClass("invalid");
      }
    }
    if(errors){
      e.preventDefault();
    }
});

$(document).ready(function(){
  $(".header_catalog_box").on("click", function(){
    if($('.header_catalog_list').hasClass('active')){
       $(this).children('.header_catalog_list').removeClass('active').slideUp();
    }
    else{
     $(this).children('.header_catalog_list').addClass('active').slideDown();
    }

  });
  
  //--------------modal window------
 $(".modal_btn").on("click", function(){
    var template = "<div class='modal_container'></div>";
    var height = $(window).height();
    var modal = $(this).data('modal');
    console.log(height);
  $(template).prependTo('body');
  $('#' + modal).prependTo('.modal_container').addClass('active');
  $('.modal_container').css('height', height);
  $("body").addClass("show_modal");
  $("html").addClass("show_modal");
  
  document.addEventListener('touchmove', function(e) {
      if($("body").hasClass("show_modal")){
        e.preventDefault();
        return true;
      }
    });
 });
 $(".modal_close").on("click", function(){
      if($("body").hasClass("show_modal")){
        $("body").removeClass("show_modal");
        $("html").removeClass("show_modal");
        $('.modal').appendTo('body').removeClass('active');
        $('.modal_container').remove();
        $("#menu_overlay").fadeOut();

      }
    
  });

 $(document).on("click ontouchstart", function(event){
    if($(event.target).closest('.modal, .modal_btn').length)return;
      $("body").removeClass("show_modal");
      $("html").removeClass("show_modal");
      $('.modal').appendTo('body').removeClass('active');
      $('.modal_container').remove();
      $("#menu_overlay").fadeOut();
     
      event.stopPropagation()

  })
//-------input radio checked-----
 $('.input_radio').on("click", function(){
   if($('.input_radio:checked')){
     $(this).parent().parent().addClass('active');
     $(this).parent().parent().siblings().removeClass('active');
       if($('#pickup:checked').length){
          $(this).parents('.delivery_top').next('.delivery_data_pickup').addClass('active');
       }
      else{
      $(this).parents('.delivery_top').next('.delivery_data_pickup').removeClass('active');
      }
     if($('#company:checked').length){
      $(this).parents('.payment_box_inner').next('.call_info').children('.payment_company_box').addClass('active');
      }
      else{
       $(this).parents('.payment_box_inner').next('.call_info').children('.payment_company_box').removeClass('active');
       }
     }
});
//---------------input type file-------------------
if($('#file').length){
  var inp = $('#file');
  inp.change(function(){
    var file_name = inp.val().replace( "C:\\fakepath\\", '' );
    $('.file_text').text( file_name);
  }).change();
}
//--owl-carousel--------------------  
  if($('.owl-carousel').length){
      $(".owl-carousel").each(function(){
        var $this = $(this);
        if($this.hasClass('single')){
          $this.owlCarousel({
            items:1,
            loop:true,
            nav:true
          });
        }
        else{
          $this.owlCarousel({
              nav:true,
              items:3,
              responsiveClass:true,
              responsive : {
              
                0 : {
                      items :1, 
                      nav:true
                 },
              
                480 : {
                      items:2,
                      nav:true
                  },
              
                992 : {
                    items : 3,
                    nav:true
                  },
           
                1000 : {
                    items : 3,
                    nav:true
                  }
              }
            });
          }
        });
    }
//-------------------raty--------------------------
 if ($('.raty').length){
    $('.raty').each(function(){
      var itemStar = $(this).attr("data-star");
      if($(this).hasClass('staticStar')){
        $(this).raty({
           starType: 'i',
           readOnly: true,
           score: itemStar
        });
      }
      else{
        $(this).raty({
           starType: 'i',
          score: function() {return $(this).attr('data-star');}
        });
      }
    });
  }

//------tabs------------------------
 if ($('.tabs').length){
     $(".tabs li").on("click", function(){
      var item = $(this).data('item');
      if(!$(this).hasClass('active')){
        $(this).addClass('active').siblings().removeClass('active');
      }
      if(!$('#' + item).hasClass('active')){
        $('#' + item).addClass('active').siblings().removeClass('active');
      }
     });
  }
//---------for open reviews on click-----
 if ($('.reviews_lk').length){
  $('.reviews_lk').on("click", function(){
    event.preventDefault();
    $('#tabs3').addClass('active').siblings().removeClass('active');
    $('[data-item=tabs3]').addClass('active').siblings().removeClass('active');;
  });
}
//---------custom select--------
  $.fn.extend({
    /**
    ** Emulates select form element
    ** @return jQuery
    **/
    customSelect : function(){
     var template = "<div class='active_option open_select'></div><ul class='options dropdown'></ul>";
      return this.each(function(){
        var $this = $(this);
        $this.prepend(template);

        var active = $this.children('.active_option'),
         list = $this.children('.options'),
         select = $this.children('select').hide(),
         options = select.children('option'),
         iClass = active.attr('class');

        active.text( 
         select.children('option[selected]').val() ? 
          select.children('option[selected]').val() : 
          options.eq(0).text()
        );

        active.on('click', function(){
          $this.toggleClass('active');
        });

        options.each(function(){
          var optionOuter = $('<li></li>'),
            optionInner = $('<a></a>',{
              text : $(this).text(),
              href : '#',
              'data-value' : $(this).val(),
              class: $(this).data('color-class')
          }),
          tpl = optionOuter.append(optionInner);
          list.append(tpl);
         
        });

        list.on("click", "a", function(event){
          event.preventDefault();
          var t = $(this).text(),
              v = $(this).attr('data-value');
              active.text(t);
              iClass.replace(iClass,"active_option open_select");
              active.attr('class', iClass +" "+ $(this).attr("class"));
              select.val(v);
              $(this).closest('.dropdown').removeClass("active");
          });
        $(document).click(function(event) {
          if ($(event.target).closest(".open_select").length) return;
          $(".custom_select").removeClass("active");
          event.stopPropagation();
        });

     });

  }});

  $('.custom_select').customSelect();

});
$(window).on('load resize', function() {
    var oldWidth = $(window).data("oldwidth");
    var newWidth = $(window).width();
    var widthSm  = 992;
    var widthXs  = 767;
      if (newWidth != oldWidth) {
        if (newWidth < widthSm && (!oldWidth || oldWidth >= widthSm)) {
        
            $('nav').prependTo('.header');
            $('.menu').wrap('<div class="container">');
            $('.header_search').appendTo('.header_nav');
            $('.header_info').insertAfter('.header_top .logo');
            $('.header_phone').prependTo('.header_call');
            $('.catalog_sort').insertBefore('.catalog_box_inner');
          console.log(111);
              
          }
        else if (newWidth >= widthSm && (!oldWidth || oldWidth < widthSm)) {
        
            $('nav').appendTo('.header_nav');
            $('.menu').unwrap('.container');
            $('.header_search').insertAfter('.header_top .logo')
            $('.header_info').appendTo('.header_top');
            $('.header_phone').insertAfter('.header_search');
            $('.catalog_sort').prependTo('.catalog_box');
          console.log(222);
        }
        if (newWidth < widthXs && (!oldWidth || oldWidth >= widthXs)) {
           $('.header_search').insertAfter('.header_bottom');
          
          console.log(333);
              
          }
        else if (newWidth >= widthXs && (!oldWidth || oldWidth < widthXs)) {
         
          console.log(444);
        }


        
        
        $(window).data("oldwidth", newWidth);
      }
  });