/*
Template: Aprycot - Responsive Bootstrap 5 Admin Dashboard Template
Author: iqonic.design
Design and Developed by: iqonic.design
NOTE: This file contains the styling for responsive Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------

------- Plugin Init --------

:: Tooltip
:: Popover
:: Circle Progress
:: NoUiSlider
:: CopyToClipboard
:: Vanila Datepicker
:: SliderTab
:: Data Tables
:: Active Class for Pricing Table

------ Functions --------

:: Loader Init
:: Resize Plugins
:: Sidebar Toggle
:: Back To Top

------- Listners ---------

:: DOMContentLoaded
:: Window Resize
------------------------------------------------
Index Of Script
----------------------------------------------*/
"use strict";
/*---------------------------------------------------------------------
              Popover
-----------------------------------------------------------------------*/

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})

/*---------------------------------------------------------------------
                Tooltip
-----------------------------------------------------------------------*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-sidebar-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})


/*---------------------------------------------------------------------
              Circle Progress
-----------------------------------------------------------------------*/

const progressBar = document.getElementsByClassName('circle-progress')
Array.from(progressBar, (elem) => {
    const minValue = elem.getAttribute('data-min-value')
    const maxValue = elem.getAttribute('data-max-value')
    const value = elem.getAttribute('data-value')
    const type = elem.getAttribute('data-type')
    if (elem.getAttribute('id') !== '' && elem.getAttribute('id') !== null) {
        new CircleProgress('#' + elem.getAttribute('id'), {
            min: minValue,
            max: maxValue,
            value: value,
            textFormat: type,
        });
    }
})

/*---------------------------------------------------------------------
Progress Bar
-----------------------------------------------------------------------*/
const progressBarInit = (elem) => {
    const currentValue = elem.getAttribute('aria-valuenow')
    elem.style.width = '0%'
    elem.style.transition = 'width 2s'
    new Waypoint({
        element: elem,
        handler: function () {
            setTimeout(() => {
                elem.style.width = currentValue + '%'
            }, 100);
        },
        offset: 'bottom-in-view',
    })
}

const customProgressBar = document.querySelectorAll('[data-toggle="progress-bar"]')
Array.from(customProgressBar, (elem) => {
    progressBarInit(elem)
})

/*---------------------------------------------------------------------
                 noUiSlider
-----------------------------------------------------------------------*/

const rangeSlider = document.querySelectorAll('.range-slider');

Array.from(rangeSlider, (elem) => {
    noUiSlider.create(elem, {
        start: [20, 80],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        }
    })
})

const slider = document.querySelectorAll('.slider');

Array.from(slider, (elem) => {
    noUiSlider.create(elem, {
        start: 50,
        connect: [true, false],
        range: {
            'min': 0,
            'max': 100
        }
    })
})

/*---------------------------------------------------------------------
              Copy To Clipboard
-----------------------------------------------------------------------*/
const copy = document.querySelectorAll('[data-toggle="copy"]')
Array.from(copy, (elem) => {
    elem.addEventListener('click', (e) => {
        const target = elem.getAttribute("data-copy-target");
        let value = elem.getAttribute("data-copy-value");
        const container = document.querySelector(target);
        if (container !== undefined && container !== null) {
            if (container.value !== undefined && container.value !== null) {
                value = container.value;
            } else {
                value = container.innerHTML;
            }
        }
        if (value !== null) {
            const elem = document.createElement("input");
            document.querySelector("body").appendChild(elem);
            elem.value = value;
            elem.select();
            document.execCommand("copy");
            elem.remove();
        }
    })
});

/*---------------------------------------------------------------------
              Vanila Datepicker
-----------------------------------------------------------------------*/
const datepickers = document.querySelectorAll('.vanila-datepicker')
Array.from(datepickers, (elem) => {
    new Datepicker(elem)
})
const daterangePickers = document.querySelectorAll('.vanila-daterangepicker')
Array.from(daterangePickers, (elem) => {
    new DateRangePicker(elem)
})

/*---------------------------------------------------------------------
              CounterUp 2
-----------------------------------------------------------------------*/
if (window.counterUp !== undefined) {
    const counterUp = window.counterUp["default"];
    const counterUp2 = document.querySelectorAll('.counter')
    Array.from(counterUp2, (el) => {
        const waypoint = new Waypoint({
            element: el,
            handler: function () {
                counterUp(el, {
                    duration: 1000,
                    delay: 10,
                });
                this.destroy();
            },
            offset: "bottom-in-view",
        });
    })
}

/*---------------------------------------------------------------------
              SliderTab
-----------------------------------------------------------------------*/

Array.from(document.querySelectorAll('[data-toggle="slider-tab"]'), (elem) => {
    new SliderTab(elem)
})

// Smooth Scollbar
let Scrollbar
if (jQuery(".data-scrollbar").length) {
    Scrollbar = window.Scrollbar
    Scrollbar.init(document.querySelector('.data-scrollbar'), {
        continuousScrolling: false,
    })
}

/*---------------------------------------------------------------------
  Data tables
-----------------------------------------------------------------------*/
if ($.fn.DataTable) {
    if ($('[data-toggle="data-table"]').length) {
        const table = $('[data-toggle="data-table"]').DataTable({
            "dom": '<"row align-items-center"<"col-md-6" l><"col-md-6" f>><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">',
        });
    }
}
/*---------------------------------------------------------------------
  Active Class for Pricing Table
-----------------------------------------------------------------------*/
jQuery("#my-table tr th").on('click', function () {
    jQuery('#my-table tr th').children().removeClass('active');
    jQuery(this).children().addClass('active');
    jQuery("#my-table td").each(function () {
        if (jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active')
        }
    });
    var col = jQuery(this).index();
    jQuery("#my-table tr td:nth-child(" + parseInt(col + 1) + ")").addClass('active');
});


/*---------------------------------------------------------------------
              Resize Plugins
-----------------------------------------------------------------------*/

const resizePlugins = () => {
    // sidebar-mini
    const tabs = document.querySelectorAll('.nav')
    const sidebarResponsive = document.querySelector('.sidebar-default')
    if (window.innerWidth < 991) {
        Array.from(tabs, (elem) => {
            if (!elem.classList.contains('flex-column') && elem.classList.contains('nav-tabs') && elem.classList.contains('nav-pills')) {
                elem.classList.add('flex-column', 'on-resize');
            }
        })
        if (sidebarResponsive !== null) {
            if (!sidebarResponsive.classList.contains('sidebar-mini')) {
                sidebarResponsive.classList.add('sidebar-mini', 'on-resize')
            }
        }
    } else {
        Array.from(tabs, (elem) => {
            if (elem.classList.contains('on-resize')) {
                elem.classList.remove('flex-column', 'on-resize');
            }
        })
        if (sidebarResponsive !== null) {
            if (sidebarResponsive.classList.contains('sidebar-mini') && sidebarResponsive.classList.contains('on-resize')) {
                sidebarResponsive.classList.remove('sidebar-mini', 'on-resize')
            }
        }
    }
}


/*---------------------------------------------------------------------
              LoaderInit
-----------------------------------------------------------------------*/

const loaderInit = () => {
    const loader = document.querySelector('.loader')

    loader.classList.add('animate__animated', 'animate__fadeOut')
    setTimeout(() => {
        loader.classList.add('d-none')
    }, 500)
}

/*---------------------------------------------------------------------
              Sidebar Toggle
-----------------------------------------------------------------------*/
const sidebarToggle = (elem) => {
    elem.addEventListener('click', (e) => {
        const sidebar = document.querySelector('.sidebar')
        if (sidebar.classList.contains('sidebar-mini')) {
            sidebar.classList.remove('sidebar-mini')
        } else {
            sidebar.classList.add('sidebar-mini')
        }
    })
}

const sidebarToggleBtn = document.querySelectorAll('[data-toggle="sidebar"]')
const sidebar = document.querySelector('.sidebar-default')
if (sidebar !== null) {
    const sidebarActiveItem = sidebar.querySelectorAll('.active')
    Array.from(sidebarActiveItem, (elem) => {
        if (!elem.closest('ul').classList.contains('iq-main-menu')) {
            const childMenu = elem.closest('ul')
            childMenu.classList.add('show')
            const parentMenu = childMenu.closest('li').querySelector('.nav-link')
            parentMenu.classList.add('collapsed')
            parentMenu.setAttribute('aria-expanded', true)
        }
    })
}
Array.from(sidebarToggleBtn, (sidebarBtn) => {
    sidebarToggle(sidebarBtn)
})

/*------------------------
Back To Top
--------------------------*/
$('#back-to-top').fadeOut();
$(window).on("scroll", function () {
    if ($(this).scrollTop() > 250) {
        $('#back-to-top').fadeIn(1400);
    } else {
        $('#back-to-top').fadeOut(400);
    }
});
// scroll body to 0px on click
$('#top').on('click', function () {
    $('top').tooltip('hide');
    $('body,html').animate({
        scrollTop: 0
    }, 0);
    return false;
});

/*---------------------------------------------------------------------
              DOMContentLoaded
-----------------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', (event) => {
    resizePlugins()
    loaderInit()
});

/*---------------------------------------------------------------------
              Window Resize
-----------------------------------------------------------------------*/

window.addEventListener('resize', function (event) {
    resizePlugins()
});

/*-------------------------------
| | | | | DropDown
--------------------------------*/

function darken_screen(yesno) {
    if (yesno == true) {
        if (document.querySelector('.screen-darken') !== null) {
            document.querySelector('.screen-darken').classList.add('active');
        }
    } else if (yesno == false) {
        if (document.querySelector('.screen-darken') !== null) {
            document.querySelector('.screen-darken').classList.remove('active');
        }
    }
}

function close_offcanvas() {
    darken_screen(false);
    if (document.querySelector('.mobile-offcanvas.show') !== null) {
        document.querySelector('.mobile-offcanvas.show').classList.remove('show');
        document.body.classList.remove('offcanvas-active');
    }
}

function show_offcanvas(offcanvas_id) {
    darken_screen(true);
    if (document.getElementById(offcanvas_id) !== null) {
        document.getElementById(offcanvas_id).classList.add('show');
        document.body.classList.add('offcanvas-active');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('[data-trigger]').forEach(function (everyelement) {
        let offcanvas_id = everyelement.getAttribute('data-trigger');
        everyelement.addEventListener('click', function (e) {
            e.preventDefault();
            show_offcanvas(offcanvas_id);
        });
    });
    if (document.querySelectorAll('.btn-close')) {
        document.querySelectorAll('.btn-close').forEach(function (everybutton) {
            everybutton.addEventListener('click', function (e) {
                close_offcanvas();
            });
        });
    }
    if (document.querySelector('.screen-darken')) {
        document.querySelector('.screen-darken').addEventListener('click', function (event) {
            close_offcanvas();
        });
    }
});
if (document.querySelector('#navbarSideCollapse')) {
    document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
        document.querySelector('.offcanvas-collapse').classList.toggle('open')
    })
}

/*---------------------------------------------------------------------
Form Validation
-----------------------------------------------------------------------*/

// Example starter JavaScript for disabling form submissions if there are invalid fields
window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}, false);

const actionButtons = document.querySelectorAll('[data-action="click"]')
Array.from(actionButtons, (btn) => {
    btn.addEventListener("click", (e) => {
        const closestId = btn.getAttribute('data-closest')
        Array.from(btn.closest(closestId).querySelectorAll('.btn'), (ele) => {
            ele.classList.add('d-none')
        })
        btn.classList.remove('d-none')
        btn.classList.add('d-block', 'checked')
    })
})


$(window).on('scroll', function () {
    if ($(window).scrollTop() > 80) {
        $('.cart_column').addClass('topper');
    } else {
        $('.cart_column').removeClass('topper');
    }
});
function beeCartGetParams(btn) {
//Функция обработки добавок

    let adds=[];
    var i=0;
    if ( $(btn).hasClass('add_detail')){


    $('.bludo_add:checked').each(function() {

        adds[i]={'text':$(this).data('text'),'price':$(this).data('price')}
     i++;

    });

    }

    return {'ADDS':adds};
}
$(document).on("click", ".js-ajax-adds", function (t) {
    //Показываем добавки блюда
    BX.showWait();

    t.preventDefault();
    var e, t = $(this), i = JSON.parse($(this).attr("data-data")), n = new FormData;
    for (e in i) n.append(e, i[e]);
    var bludo_id = t.attr('data-id');

    var bludo_weight = t.attr('data-weight');
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/ajax/",
        contentType: false,
        processData: false,
        data: n,
        beforeSend: function () {


        }
    }).done(function (response) {
        BX.closeWait();
        $('#cart_ads').attr('data-id', bludo_id);
        $('#cart_ads').attr('data-weight', bludo_weight);

        $('#bludo_adds').html(response.html)

        $('.bd-adds').modal('show')


    })
})
$(document).ready(function () {


    if ($(window).scrollTop() > 80) {
        $('.cart_column').addClass('topper');
    } else {
        $('.cart_column').removeClass('topper');
    }

    $('.time_dost').click(function () {
        $('.bubble').show();
    })

    $('#tab-today li').click(function () {

        var text = 'Сегодня,' + $(this).data('time');
        $('#time_result').html(text);
        $('.bubble').hide();
    })
    $('#tab-tomorrow li').click(function () {

        var text = 'Завтра,' + $(this).data('time');
        $('#time_result').html(text);
        $('.bubble').hide();
    })

    $('.btn_info').click(function () {

        $('.bubble_info').toggle();

    })

    $('.payment').click(function () {

        $('.payment_choose').show();
        $('.payment').hide();

    })
    $('.sp_selector').click(function () {
        //Выбор способа оплаты
        $('#current_payment').html($(this).data('val'));
        $('.payment_choose').hide();
        $('.payment').show();

    })
    $('.btn-add_adr').click(function () {

        $(".adr_input").first().clone().appendTo(".adr_block");


    })
    $('.adr_select').click(function () {
        var adr = $(this).html();
        //Выбор адреса из списка на странице оформления
        $('.current_order_adr').html(adr);


    })
    $('.cust_adr').click(function () {
        var adr = $('.cust_adr_val').val();


        if (adr == '') {
            alert('Введите адрес!');
        } else {
            //Выбор адреса из списка на странице оформления
            $('.current_order_adr').html(adr);
        }

    })


//Редактирование категории в админке
    $('.cat_edit').click(function () {

        $('#cat_edit_name').val($(this).data('name'));
        $('#cat_edit_id').val($(this).data('id'));


    })


    //Кнопка смены количества в модалке
    $('.btn-number').click(function (e) {
        e.preventDefault();

        var fieldName = $(this).attr('data-field');
        var type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function () {

        var minValue = 1;
        var maxValue = 50;
        var valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


})

