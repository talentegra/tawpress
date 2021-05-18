var $ = jQuery.noConflict();
(function(window, document, $) {
    var $win = $(window);
    var $doc = $(document);

    $doc.on('change', '.form-filter', function() {
        var choices = '';

        $('.form-filter input:checked').each(function() {
           
            if ( choices === '' ) {
                choices += $(this).data('category');
                 
            } else {
                choices += ',' + $(this).data('category');
                
            }
        });

        $.ajax({
            url: window.location.href,
            type: 'GET',
            data: {
                'choices' : choices,
            },
            success: function(response) {
                var newPosts = $(response).filter('.filter-output').html();
                $('.filter-output').html(newPosts);
            }
        });
    });
})(window, document, window.jQuery);

    jQuery(document).ready(function (e) {
        $(".spcial").click(function(){
            if(e(".spcial").attr("href") == "#"){
                alert("Select any 3 course and click Enroll now");
            }
          });
        e(".special_amount>ins").hide(),
            e(".spcial").removeAttr("target"),
            e(".special_amount>del").hide(),
            e("input[name='trending']").change(function (t) {
                var o = [],
                    i = 0;
                if (
                    (e.each(e("input[name='trending']:checked"), function () {
                        o.push(e(this).val()), (i += parseFloat(e(this).attr("data-coursefee")));
                    }),
                    e(".special_course>p").text("Selected Courses: " + o.join(", ")),
                    e(".special_amount>del").text(i),
                    e("input[name='trending']:checked").length > 3)
                )
                    e(this).prop("checked", !1), alert("You can select maximum 3 Courses!!");
                else if (3 == e("input[name='trending']:checked").length) {
                    e(".special_amount>ins").text("24999");
                    var a = e.base64.encode("24999-" + e.datepicker.formatDate("yy-mm-dd", new Date()) + "-" + e(this).attr("data-courseid") + "-" + o);
                    e(".spcial").attr("href", "https://www.besanttechnologies.com/payment-online/?e=" + a), e(".spcial").attr("target", "_blank");
                } else
                    0 == e("input[name='trending']:checked").length
                        ? (e(".special_course>p").hide(), e(".special_amount>ins").hide(), e(".special_amount>del").hide(), e(".spcial").attr("href", "#"), e(".spcial").removeAttr("target"))
                        : (e(".special_course>p").show(), e(".special_amount>ins").show(), e(".special_amount>del").show(), e(".special_amount>ins").text(""), e(".spcial").attr("href", "#"), e(".spcial").removeAttr("target"));
            }),
            
            
            
            
            
            
            
            
         
            
      $(".spclbg").click(function(){
            if(e(".spclbg").attr("href") == "#"){
                alert("Select any 3 course and click Enroll now");
            }
        });  
        e(".special_amount_al>ins").hide(), 
        e(".alumni_foobtn a").fadeOut(),
      e(".special_amount_al>del").hide(),
      e(".spclbg").removeAttr("target"),
      e("input[name='aluminioff']").change(function (t) {   
           var o = [],
               i = 0;
        if ((e.each(e("input[name='aluminioff']:checked"), function () {
                o.push(e(this).val()), (i += parseFloat(e(this).attr("data-coursefee")));
            }),
            //e(".special_course_al>p").text("Selected Courses: " +  o.join(", ")),
            e(".special_amount_al>del").text(i),
            e("input[name='aluminioff']:checked").length > 3 ))
            e(this).prop("checked", !1), alert("You can select maximum 3 Courses!!");
            else if (1 == e("input[name='aluminioff']:checked").length) { 
                
                e(this).siblings('label').html('Selected'),
                    
                e(".special_amount_al>ins").show(),
                e(".special_amount_al>del").show(),
                e(".alumni_foobtn a").fadeIn(),
                e(".alumni_bottom").fadeIn(),
                e(".special_course_al>p").show(),
                e(".special_course_al>p").text("Selected Courses: " + o.join(", ")),
                e(".special_amount_al>ins").text("6499");
                var b = e.base64.encode("6499-" + e.datepicker.formatDate("yy-mm-dd", new Date()) + "-" + e(this).attr("data-courseid") + "-" + o);
                e(".spclbg").attr("href", "https://www.besanttechnologies.com/payment-online/?e=" + b), e(".spclbg").attr("target", "_blank");  
            }
           else if (2 == e("input[name='aluminioff']:checked").length) {
               
                e(this).siblings('label').html('Selected'),  
               e(".special_course_al>p").text("Selected Courses: " + o.join(", ")),
                e(".special_amount_al>ins").show(),
                e(".special_amount_al>del").show(),
                e(".alumni_foobtn a").show(),
                e(".special_course_al>p").show(),
                e(".special_amount_al>ins").text("12998");
                var b = e.base64.encode("12998-" + e.datepicker.formatDate("yy-mm-dd", new Date()) + "-" + e(this).attr("data-courseid") + "-" + o);
                e(".spclbg").attr("href", "https://www.besanttechnologies.com/payment-online/?e=" + b), e(".spclbg").attr("target", "_blank");
            }
           else if (3 == e("input[name='aluminioff']:checked").length) {
               
                e(this).siblings('label').html('Selected'),
               e(".special_course_al>p").text("Selected Courses: " + o.join(", ")),
                e(".special_amount_al>ins").show(),
                e(".special_amount_al>del").show(),
                e(".special_course_al>p").show(),
                e(".alumni_foobtn a").show(),
                e(".special_amount_al>ins").text("19497");
                var b = e.base64.encode("19497-" + e.datepicker.formatDate("yy-mm-dd", new Date()) + "-" + e(this).attr("data-courseid") + "-" + o);
                e(".spclbg").attr("href", "https://www.besanttechnologies.com/payment-online/?e=" + b), e(".spclbg").attr("target", "_blank");
            }          
          else
                0 == e("input[name='aluminioff']:checked").length ? (e(".special_course_al>p").hide(), e(".special_amount_al>ins").hide(), 
                e(".alumni_foobtn a").fadeOut(),
                                                                     
                e(this).siblings('label').html('Select Course'),
                                                                     
                e(".special_amount_al>del").hide(), 
                e(".spclbg").attr("href", "#"), 
                e(".spclbg").removeAttr("target")) : (e(".special_course_al>p").show(), e(".special_amount_al>ins").show(), e(".special_amount_al>del").show(), e(".special_amount_al>ins").text(""), e(".spclbg").attr("href", "#"), e(".spclbg").removeAttr("target"));
             
      }),
            
            
            
            
            
            
            
            
    
   
      e("input[name='masteraluminioff']").change(function (t) {   
           var o = [],
               i = 0;
        if ((e.each(e("input[name='masteraluminioff']:checked"), function () {
                o.push(e(this).val()), (i += parseFloat(e(this).attr("data-coursefee")));
            }),
            //e(".special_course_al>p").text("Selected Courses: " +  o.join(", ")),
            e(".special_amount_al>del").text(i),
            e("input[name='masteraluminioff']:checked").length > 1 ))
            e(this).prop("checked", !1), alert("You can select maximum 1 Courses!!");
            else if (1 == e("input[name='masteraluminioff']:checked").length) { 
                
                e(this).siblings('label').html('Selected'),
                    
                e(".special_amount_al>ins").show(),
                e(".special_amount_al>del").show(),
                e("#masterbtn a").fadeIn(),
                e(".alumni_bottom").fadeIn(),
                e(".special_course_al>p").show(),
                e(".special_course_al>p").text("Selected Courses: " + o.join(", ")),
                e(".special_amount_al>ins").text("17999");
                var b = e.base64.encode("17999-" + e.datepicker.formatDate("yy-mm-dd", new Date()) + "-" + e(this).attr("data-courseid") + "-" + o);
                e(".spclbg").attr("href", "https://www.besanttechnologies.com/payment-online/?e=" + b), e(".spclbg").attr("target", "_blank");  
            }
                   
          else
                0 == e("input[name='masteraluminioff']:checked").length ? (e(".special_course_al>p").hide(), e(".special_amount_al>ins").hide(), 
                e(".alumni_foobtn a").fadeOut(),
                                                                     
                e(this).siblings('label').html('Select Course'),
                                                                     
                e(".special_amount_al>del").hide(), 
                e(".spclbg").attr("href", "#"), 
                e(".spclbg").removeAttr("target")) : (e(".special_course_al>p").show(), e(".special_amount_al>ins").show(), e(".special_amount_al>del").show(), e(".special_amount_al>ins").text(""), e(".spclbg").attr("href", "#"), e(".spclbg").removeAttr("target"));
             
      }),
            
            
            
            
            
            
            
            
            
            
            screen.width > 768
                ? (e(".navbar-expand-lg .dropdown").hover(
                      function () {
                          e(this).find(".dropdown-menu").first().stop(!0, !0).delay(200).slideDown();
                      },
                      function () {
                          e(this).find(".dropdown-menu").first().stop(!0, !0).delay(200).slideUp();
                      }
                  ),
                  e(".navbar .dropdown > a").click(function () {
                      location.href = this.href;
                  }))
                : e(".dropdown-menu li a").on("click", function (t) {
                      e(this).next("ul").toggle(),
                          t.stopPropagation(),
                          t.preventDefault(),
                          e(".dropdown-item").click(function (t) {
                              var o = e(this).attr("href");
                              window.open(o, "_self");
                          });
                  }),
            e(".show_hide").show(),
            e(".show_hide").click(function () {
                e(".slidingDiv").toggle("1000"), e(this).find("i").toggleClass("fa-chevron-down");
            }),
           
            e("#close-btn").click(function () {
                e("#search-overlay").fadeOut(), e("#search-btn").show();
            }),
            e("#search-btn").click(function () {
                e(this).hide(), e("#search-overlay").fadeIn();
            }),
            e(".fixed_widgets").hide(),
            e(".master_menu").hide(),
            e(".send_btn").attr("disabled", !0),
            e("#s").keyup(function () {
                0 != e(this).val().length ? e(".send_btn").attr("disabled", !1) : e(".send_btn").attr("disabled", !0);
            }),
            e("#branchid")
                .change(function () {
                    e(".Chennai, .Bangalore, .onlineadd").hide(),
                        e("#branchid option:selected").each(function () {
                            "all" == e(this).attr("value") && (e(".Chennai, .Bangalore").hide("slideDown"), e(".all_city").show()),
                                "Bangalore" == e(this).attr("value") && (e(".all_city").hide(), e(".Bangalore").show()),
                                "Chennai" == e(this).attr("value") && (e(".all_city").hide(), e(".Chennai").show()),
                                "onlineadd" == e(this).attr("value") && (e(".all_city").hide(), e(".onlineadd").show());
                        });
                })
                .change(),
            e("#category option:first-child").attr("disabled", "disabled"),
            e("#category_id option:first-child").attr("disabled", "disabled"),
            e("#branchid option:first-child").attr("disabled", "disabled"),
            e("#master_course").owlCarousel({ loop: !0, margin: 20, dots: !1, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } } }),
            e("#trending_course").owlCarousel({ loop: !0, margin: 20, dots: !1, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } } }),
            e("#review_carousel").owlCarousel({ loop: !0, margin: 10, autoplay: !0, nav: !1, dots: !0, center: !1, slideTransition: "linear", responsive: { 0: { items: 1 }, 600: { items: 1 }, 1000: { items: 1 } } }),
            e("#blogs").owlCarousel({ loop: !0, margin: 30, dots: !1, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 3 } } }),
            e("#featuresliders").owlCarousel({ loop: !0, margin: 10, autoplay: !0, nav: !0, dots: !1, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } } }),
            e("#master_featuresliders").owlCarousel({ loop: !0, margin: 10, autoplay: !0, nav: !1, dots: !1, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 3 } } }),
            e("#related_course").owlCarousel({ loop: !0, margin: 10, autoplay: !0, nav: !0, dots: !1, center: !0, slideTransition: "linear", responsive: { 0: { items: 1 }, 600: { items: 1 }, 1000: { items: 3 } } }),
            e("#related_blogs").owlCarousel({ loop: !0, margin: 20, nav: !1, autoplay: !1, dots: !1, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } } }),
            e("#master_pgm, #datawarehouse, #Database, #DBA, #web_designing, #digital_marketing, #java, #cloud_computing, #software_testing, #mobile_applications, #robotic_process, #other_trainings, #online_trainings").owlCarousel({
                loop: !1,
                margin: 10,
                nav: !0,
                dots: !1,
                responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } },
            }),
            e("#frequent_combo").owlCarousel({ loop: !1, margin: 30, dots: !1, nav: !1, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 2 } } }),
            e("#offer_carousel").owlCarousel({ loop: !1, margin: 30, dots: !1, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } } }),
            e("#similar_slider").owlCarousel({ loop: !1, margin: 20, dots: !1, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 4 } } }),
            e("#popularslider").owlCarousel({ loop: !1, margin: 5, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 8 } } }),
            e("#JobPosting").owlCarousel({ loop: !1, margin: 30, nav: !0, responsive: { 0: { items: 1 }, 600: { items: 3 }, 1000: { items: 3 } } }),
            e("#homereviews").owlCarousel({
                loop: !1,
                margin: 30,
                mouseDrag: !0,
                touchDrag: !0,
                nav: !0,
                dotsEach: !1,
                navText: [' <i class="fa fa-long-arrow-left" aria-hidden="true"></i>Prev', 'Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i>'],
                responsive: { 0: { items: 1 }, 600: { items: 1 }, 1000: { items: 2 } },
            }), e("#homeyoutubereviews").owlCarousel({
            loop: !1
            , margin: 30
            , mouseDrag: !0
            ,dots: !1
            , touchDrag: !0
            , autoplay:false
            , nav: !0
            , dotsEach: !1
            , navText: [' <i class="fa fa-long-arrow-left" aria-hidden="true"></i>Prev', 'Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i>']
            , responsive: {
                0: {
                    items: 1
                }
                , 600: {
                    items: 2
                }
                , 1000: {
                    items: 3
                }
            }
        }),e("#onlinerecomened_slider").owlCarousel({
            loop: !1
            , margin: 20
            , mouseDrag: !0
            , touchDrag: !0
            , nav: !0
            , dotsEach: !1
            , navText: [' <i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
            , responsive: {
                0: {
                    items: 1
                }
                , 600: {
                    items: 2
                }
                , 1000: {
                    items: 4
                }
            }
        }),e(".online_tabreview-carousel").owlCarousel({
            loop: !1
            , margin: 10
            , mouseDrag: !0
            , touchDrag: !0
            , nav: !0
            , dotsEach: !1
            , nav: !1
            , navText: [' <i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
            , responsive: {
                0: {
                    items: 1
                }
                , 600: {
                    items: 1
                }
                , 1000: {
                    items: 2
                }
            }
        }), e(".customized_tab .nav-tabs a").click(function () {
                e(this).tab("show");
            }),
            e("#s")
                .on("focus", function () {
                    e("#datafetch").show(), e("#datafetch1").show();
                })
                .on("blur", function () {
                    e("#datafetch").hide(), e("#datafetch1").hide();
                }),
            e("#datafetch").on("mousedown", function (e) {
                e.preventDefault();
            }),
            e("#datafetch1").on("mousedown", function (e) {
                e.preventDefault();
            }),
            e.wmBox(),
            e(".secondary_menu ul li a, .download_btn a, .masterpgm_menus ul li a, .mwpvk, .gettchbtn, .bt_alumnibtn,.bt-trndbtn").click(function (t) {
                t.preventDefault();
                var o = e(e(this).attr("href")).offset().top;
                e("body, html").animate({ scrollTop: o }, 900);
            }),
            e(".left_tutbox li a").click(function (t) {
                var o = e(e(this).attr("href")).offset().top;
                e("body, html").animate({ scrollTop: o }, 900);
            }),
            e(".banner_read a").click(function (t) {
                var o = e(e(this).attr("href")).offset().top;
                e("body, html").animate({ scrollTop: o }, 900);
            }),
          
            e("#toTop").click(function () {
                e("html, body").animate({ scrollTop: 0 }, 1e3);
            }),
            screen.width < 767 &&
                e(window).scroll(function () {
                    var t = e(".special_offtitle").offset().top,
                        o = e(".special_offtitle").outerHeight(),
                        i = e(window).height();
                    e(this).scrollTop() > t + o - i ? e(".mobile_spclbtn").fadeOut(500) : e(".mobile_spclbtn").fadeIn(500);
                }),
            screen.width < 999 && e(".in_box, .ct_box").hide(),
            screen.width < 767 && e(".en_box").hide(),
            screen.width > 768 &&
                e(window).scroll(function () {
                    e(window).scrollTop() > 1900
                        ? (e(".contact-Enq").fadeIn("slow"),
                          e(".fixed_widgets").fadeIn("slow"),
                          e(".master_menu").fadeIn("slow"),
                          clearTimeout(e.data(this, "scrollTimer")),
                          e.data(
                              this,
                              "scrollTimer",
                              setTimeout(function () {
                                  e("#menu").fadeOut("slow");
                              }, 1500)
                          ))
                        : (clearTimeout(e.data(this, "scrollTimer")), e(".contact-Enq").fadeOut("slow"), e(".fixed_widgets").fadeOut("slow"), e(".master_menu").fadeOut("slow"));
                }),
            e(".btonlinetoast").toast("hide"), 
            e(".showmore").showMore({ speedDown: 500, speedUp: 500, height: "660px", showText: 'Show More <i class="fa fa-angle-down" aria-hidden="true"></i>', hideText: 'Show Less <i class="fa fa-angle-up" aria-hidden="true"></i>' }),
            e(".training_typs > select")
                .change(function () {
                    e(this)
                        .find("option:selected")
                        .each(function () {
                            var t = e(this).attr("value");
                            if (t) {
                                e(".boxes")
                                    .not("." + t)
                                    .hide(),
                                    e("." + t).show();
                                var o = e("." + t + " .inneroffer_ins").text(),
                                    i = e.base64.encode(o + "-" + e.datepicker.formatDate("yy-mm-dd", new Date()) + "-" + e(".coursepagesingle").attr("data-bemscourseid") + "-" + e(".coursepagesingle").attr("data-bemscoursename"));
                                e(".npkh").attr("href", "https://www.besanttechnologies.com/payment-online/?e=" + i);
                            } else e(".boxes").hide(), e(".npkh").attr("href", "#");
                        });
                })
                .change(),
            e(".npkh").click(function () {
                "#" == e(".npkh").attr("href") && alert("select Training Type");
            });
    }),
    (function (e) {
        (e.wmBox = function () {
            e("body").prepend('<div class="wmBox_overlay"><div class="wmBox_centerWrap"><div class="wmBox_centerer"><div class="wmBox_contentWrap"><div class="wmBox_scaleWrap"><div class="wmBox_closeBtn"><p>x</p></div>');
        }),
            e(".wmBox").click(function (t) {
                t.preventDefault(), e(".wmBox_overlay").fadeIn(750);
                var o = e(this).attr("data-popup");
                e(".wmBox_overlay .wmBox_scaleWrap").append('<img src="' + o + '">'),
                    e(".wmBox_overlay img").click(function (e) {
                        e.stopPropagation();
                    }),
                    e(".wmBox_overlay").click(function (t) {
                        t.preventDefault(),
                            e(".wmBox_overlay").fadeOut(750, function () {
                                e(this).find("img").remove();
                            });
                    });
            });
    
        

    
    })(jQuery),
    $(window).scroll(function () {
        var e = $("#faq, .blogs, .inner_cat").offset().top,
            t = $("#faq, .blogs, .inner_cat").outerHeight(),
            o = $(window).height();
        $(this).scrollTop() > e + t - o ? $("#toTop").fadeIn(500) : $("#toTop").fadeOut(500);
    });
var header = document.getElementById("myHeader");
if (null != header && screen.width > 768) {
    window.onscroll = function () {
        myFunction();
    };
    var sticky = header.offsetTop;
    function myFunction() {
        window.pageYOffset > sticky ? header.classList.add("sticky") : header.classList.remove("sticky");
    }
}
var lastId,
    topMenu = $(".secondary_menu ul, .masterpgm_menus ul"),
    topMenuHeight = topMenu.outerHeight() + 15,
    menuItems = topMenu.find("a"),
    scrollItems = menuItems.map(function () {
        var e = $($(this).attr("href"));
        if (e.length) return e;
    });
$(window).scroll(function () {
    var e = $(this).scrollTop() + topMenuHeight,
        t = scrollItems.map(function () {
            if ($(this).offset().top < e) return this;
        }),
        o = (t = t[t.length - 1]) && t.length ? t[0].id : "";
    lastId !== o &&
        ((lastId = o),
        menuItems
            .parent()
            .removeClass("active")
            .end()
            .filter("[href='#" + o + "']")
            .parent()
            .addClass("active"));
});
var delayShowOnlineToast = 3e4;
setTimeout(function () {
    $(".btonlinetoast").toast("show");
}, delayShowOnlineToast),
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({ boundary: "window" });
    });


$('#youtubereviewModal').on('shown.bs.modal', function (event) {
    var anybutton = $(event.relatedTarget);
    if (anybutton.data('reviewevent') == "ReviewVideo") {
        var modalyoutubelink = anybutton.data('link');
        $('#youtubeReviewVideo').html(modalyoutubelink);
    }
})
$("#youtubereviewModal").on('hide.bs.modal', function (e) {
    $('#youtubeReviewVideo').html('');
})


//refer & earn page scroll to show bottom strip script

$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 500) {
        //$('.btrefer_bottomMenu').fadeIn();
        $('.alumni_bottom').fadeIn();
    } else {
       // $('.btrefer_bottomMenu').fadeOut();
        $('.alumni_bottom').fadeOut();
    }
});
   

function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    var myImage = 'data:image/png;base64,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';
    source = $('#content')[0];
    pdf.addImage(myImage, 'JPEG', 200, 15, 185, 40);
    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return !0
        }
    };
    margins = {
        top: 80
        , bottom: 60
        , left: 40
        , width: 522
    };
    pdf.fromHTML(source, margins.left, margins.top, {
        'width': margins.width
        , 'elementHandlers': specialElementHandlers
    }, function (dispose) {
        pdf.save('course_syllabus.pdf')
    }, margins)
}

