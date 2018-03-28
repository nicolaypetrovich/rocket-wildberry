jQuery(function () {
// IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,

        gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
        },

        scaleFix = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };
    scaleFix();
    // Menu Android
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM)
        if (!result) {
            jQuery('.menu li').each(function () {
                if (jQuery(">ul", this)[0]) {
                    jQuery(">a", this).toggle(
                        function () {
                            return false;
                        },
                        function () {
                            window.location.href = jQuery(this).attr("href");
                        }
                    );
                }
            })
        }
    }
});

var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">')

// if(jQuery(".owl-carousel").length){
//    include("js/owl.carousel.min.js");
//  }
// if(jQuery(".raty").length){
//    include("js/jquery.raty.js");
//  }

//----Include-Function----
function include(url) {
    document.write('<script src="' + url + '"></script>');
}

//------validation form------
function checkEmail(currInput) {
    var pattern = /^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}jQuery/;
    if (!pattern.exec(currInput.val())) {
        return false;
    }
    else {
        return true;
    }
}

function checkName(currInput) {
    var pattern = /^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}jQuery/;
    if (!pattern.exec(jQuery(currInput).val())) {
        return false;
    }
    else {
        return true;
    }
}

function checkPhone(currInput) {
    var pattern = /(\(?\d{3}\)?[\- ]?)?[\d\- ]{4,10}jQuery/;
    if (!pattern.exec(currInput.val())) {
        return false;
    }
    else {
        return true;
    }
}

jQuery('.sendBtn').click(function (e) {
    var errors = false;
    var currentForm = jQuery(this).closest("form.formSend"),
        name = currentForm.find('input[name="name"]'),
        phone = currentForm.find('input[name="phone"]'),
        email = currentForm.find('input[name="email"]');

    if (email.length) {
        if (!email.val().length || !checkEmail(email)) {
            email.parent().addClass("invalid");
            errors = true;
        }
        else {
            email.parent().removeClass("invalid");
        }
    }
    if (phone.length) {
        if (!phone.val().length || !checkPhone(phone)) {
            phone.parent().addClass("invalid");
            errors = true;
        }
        else {
            phone.parent().removeClass("invalid");
        }
    }
    if (name.length) {
        if (!name.val().length || name.val() == "Ваше имя") {
            name.parent().addClass("invalid");
            errors = true;
        }
        else {
            name.parent().removeClass("invalid");
        }
    }
    if (errors) {
        e.preventDefault();
    }
});

jQuery(document).ready(function () {
    jQuery(".header_catalog_box").on("click", function () {
        if (jQuery('.header_catalog_list').hasClass('active')) {
            jQuery(this).children('.header_catalog_list').removeClass('active').slideUp();
        }
        else {
            jQuery(this).children('.header_catalog_list').addClass('active').slideDown();
        }

    });

    //----------plus/minus buttons
    jQuery('div.woocommerce').on('click','.counter-minus, .counter-plus', function (e) {
        e.preventDefault();
        if (jQuery("[name='update_cart']").length)
            jQuery("[name='update_cart']").removeAttr('disabled');
        var input = jQuery(this).siblings('.qty');
        var inputval = input.val();
        if (jQuery.isNumeric(inputval) && Math.floor(inputval) == inputval) {
            if ('counter-minus' === jQuery(this).attr("class")) {
                if (inputval > input.attr('min'))
                    input.val(parseInt(inputval) - 1);
            } else {
                if (inputval < input.attr('max') || input.attr('max') === '')
                    input.val(parseInt(inputval) + 1);
            }
            if (jQuery("[name='update_cart']").length)
                jQuery("[name='update_cart']").trigger('click');
        }

    });


    //--------------modal window------
    jQuery(".modal_btn").on("click", function () {
        var template = "<div class='modal_container'></div>";
        var height = jQuery(window).height();
        var modal = jQuery(this).data('modal');
        console.log(height);
        jQuery(template).prependTo('body');
        if ('order' === modal) {
            var productdiv = jQuery(this).closest('div.product_item');
            var currentmodal = jQuery('#' + modal);

            currentmodal.prependTo('.modal_container');
            if (productdiv.find('.attachment-woocommerce_thumbnail').length)
                currentmodal.find('.modal_order_img').html(productdiv.find('.attachment-woocommerce_thumbnail').clone().attr('width', 158).attr('height', 158));
            else if (productdiv.find('.product_vew_img').length)
                currentmodal.find('.modal_order_img').html(productdiv.find('.product_vew_img').html().clone().attr('width', 158).attr('height', 158));
            currentmodal.find('.modal_order_name').html(productdiv.find('.product_name').clone().html());
            currentmodal.find('.modal_order_price').html(productdiv.find('.product_price').clone().html());
            currentmodal.addClass('active');

        } else {
            jQuery('#' + modal).prependTo('.modal_container').addClass('active');
        }

        jQuery('.modal_container').css('height', height);
        jQuery("body").addClass("show_modal");
        jQuery("html").addClass("show_modal");

        document.addEventListener('touchmove', function (e) {
            if (jQuery("body").hasClass("show_modal")) {
                e.preventDefault();
                return true;
            }
        });
    });
    jQuery(".modal_close, .modal_more_lk").on("click", function (e) {
        e.preventDefault();
        if (jQuery("body").hasClass("show_modal")) {
            jQuery("body").removeClass("show_modal");
            jQuery("html").removeClass("show_modal");
            jQuery('.modal').appendTo('body').removeClass('active');
            jQuery('.modal_container').remove();
            jQuery("#menu_overlay").fadeOut();

        }

    });

    jQuery(document).on("click ontouchstart", function (event) {
        if (jQuery(event.target).closest('.modal, .modal_btn').length) return;
        jQuery("body").removeClass("show_modal");
        jQuery("html").removeClass("show_modal");
        jQuery('.modal').appendTo('body').removeClass('active');
        jQuery('.modal_container').remove();
        jQuery("#menu_overlay").fadeOut();

        event.stopPropagation()

    })
//-------input radio checked-----
    jQuery('.input_radio').on("click", function () {
        if (jQuery('.input_radio:checked')) {
            jQuery(this).parent().parent().addClass('active');
            jQuery(this).parent().parent().siblings().removeClass('active');
            if (jQuery('#pickup:checked').length) {
                jQuery(this).parents('.delivery_top').next('.delivery_data_pickup').addClass('active');
            }
            else {
                jQuery(this).parents('.delivery_top').next('.delivery_data_pickup').removeClass('active');
            }
            if (jQuery('#company:checked').length) {
                jQuery(this).parents('.payment_box_inner').next('.call_info').children('.payment_company_box').addClass('active');
            }
            else {
                jQuery(this).parents('.payment_box_inner').next('.call_info').children('.payment_company_box').removeClass('active');
            }
        }
    });
//---------------input type file-------------------
    if (jQuery('#file').length) {
        var inp = jQuery('#file');
        inp.change(function () {
            var file_name = inp.val().replace("C:\\fakepath\\", '');
            jQuery('.file_text').text(file_name);
        }).change();
    }
//--owl-carousel--------------------  
    if (jQuery('.owl-carousel').length) {
        jQuery(".owl-carousel").each(function () {
            var jQuerythis = jQuery(this);
            if (jQuerythis.hasClass('single')) {
                jQuerythis.owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true
                });
            }
            else {
                jQuerythis.owlCarousel({
                    nav: true,
                    items: 3,
                    responsiveClass: true,
                    responsive: {

                        0: {
                            items: 1,
                            nav: true
                        },

                        480: {
                            items: 2,
                            nav: true
                        },

                        992: {
                            items: 3,
                            nav: true
                        },

                        1000: {
                            items: 3,
                            nav: true
                        }
                    }
                });
            }
        });
    }
//-------------------raty--------------------------
    if (jQuery('.raty').length) {
        jQuery('.raty').each(function () {
            var itemStar = jQuery(this).attr("data-star");
            if (jQuery(this).hasClass('staticStar')) {
                jQuery(this).raty({
                    starType: 'i',
                    readOnly: true,
                    score: itemStar
                });
            }
            else {
                jQuery(this).raty({
                    starType: 'i',
                    target: '#rating', //this is needed for woocommerce raiting
                    targetType: 'score',
                    targetKeep: true,
                    score: function () {
                        return jQuery(this).attr('data-star');
                    }
                });
            }
        });
    }

//------tabs------------------------
//  if (jQuery('.tabs').length){
//      jQuery(".tabs li").on("click", function(){
//       var item = jQuery(this).data('item');
//       if(!jQuery(this).hasClass('active')){
//         jQuery(this).addClass('active').siblings().removeClass('active');
//       }
//       if(!jQuery('#' + item).hasClass('active')){
//         jQuery('#' + item).addClass('active').siblings().removeClass('active');
//       }
//      });
//   }
//---------for open reviews on click-----
//  if (jQuery('.reviews_lk').length){
//   jQuery('.reviews_lk').on("click", function(){
//     event.preventDefault();
//     jQuery('#tabs3').addClass('active').siblings().removeClass('active');
//     jQuery('[data-item=tabs3]').addClass('active').siblings().removeClass('active');;
//   });
// }
//---------custom select--------
    jQuery.fn.extend({
        /**
         ** Emulates select form element
         ** @return jQuery
         **/
        customSelect: function () {
            var template = "<div class='active_option open_select'></div><ul class='options dropdown'></ul>";
            return this.each(function () {
                var jQuerythis = jQuery(this);
                jQuerythis.prepend(template);

                var active = jQuerythis.children('.active_option'),
                    list = jQuerythis.children('.options'),
                    select = jQuerythis.children('select').hide(),
                    options = select.children('option'),
                    iClass = active.attr('class');

                active.text(
                    select.children('option[selected]').val() ?
                        select.children('option[selected]').val() :
                        options.eq(0).text()
                );

                active.on('click', function () {
                    jQuerythis.toggleClass('active');
                });

                options.each(function () {
                    var optionOuter = jQuery('<li></li>'),
                        optionInner = jQuery('<a></a>', {
                            text: jQuery(this).text(),
                            href: '#',
                            'data-value': jQuery(this).val(),
                            class: jQuery(this).data('color-class')
                        }),
                        tpl = optionOuter.append(optionInner);
                    list.append(tpl);

                });

                list.on("click", "a", function (event) {
                    event.preventDefault();
                    var t = jQuery(this).text(),
                        v = jQuery(this).attr('data-value');
                    active.text(t);
                    iClass.replace(iClass, "active_option open_select");
                    active.attr('class', iClass + " " + jQuery(this).attr("class"));
                    select.val(v);
                    jQuery(this).closest('.dropdown').removeClass("active");
                });
                jQuery(document).click(function (event) {
                    if (jQuery(event.target).closest(".open_select").length) return;
                    jQuery(".custom_select").removeClass("active");
                    event.stopPropagation();
                });

            });

        }
    });

    jQuery('.custom_select').customSelect();

});
jQuery(window).on('load resize', function () {
    var oldWidth = jQuery(window).data("oldwidth");
    var newWidth = jQuery(window).width();
    var widthSm = 992;
    var widthXs = 767;
    if (newWidth != oldWidth) {
        if (newWidth < widthSm && (!oldWidth || oldWidth >= widthSm)) {

            jQuery('nav').prependTo('.header');
            jQuery('.menu').wrap('<div class="container">');
            jQuery('.header_search').appendTo('.header_nav');
            jQuery('.header_info').insertAfter('.header_top .logo');
            jQuery('.header_phone').prependTo('.header_call');
            jQuery('.catalog_sort').insertBefore('.catalog_box_inner');
            console.log(111);

        }
        else if (newWidth >= widthSm && (!oldWidth || oldWidth < widthSm)) {

            jQuery('nav').appendTo('.header_nav');
            jQuery('.menu').unwrap('.container');
            jQuery('.header_search').insertAfter('.header_top .logo')
            jQuery('.header_info').appendTo('.header_top');
            jQuery('.header_phone').insertAfter('.header_search');
            jQuery('.catalog_sort').prependTo('.catalog_box');
            console.log(222);
        }
        if (newWidth < widthXs && (!oldWidth || oldWidth >= widthXs)) {
            jQuery('.header_search').insertAfter('.header_bottom');

            console.log(333);

        }
        else if (newWidth >= widthXs && (!oldWidth || oldWidth < widthXs)) {

            console.log(444);
        }


        jQuery(window).data("oldwidth", newWidth);
    }
});