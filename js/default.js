// JavaScript Document
jQuery(function($) {
  //eventToggleSyntax
  (function($) {
    $.fn.eventToggle = function(fn) {
      var args = arguments,
        guid = fn.guid || jQuery.guid++,
        i = 0,
        toggler = function(event) {
          var lastToggle = (jQuery._data(this, "lastToggle" + fn.guid) || 0) % i;
          jQuery._data(this, "lastToggle" + fn.guid, lastToggle + 1);
          event.preventDefault();
          return args[lastToggle].apply(this, arguments) || false;
        };
      toggler.guid = guid;
      while(i < args.length) {
        args[i++].guid = guid;
      }
      return this.click(toggler);
    };
  })(jQuery);
  //menuToggle
  $(".btnMenu").eventToggle(function() {
    $("nav.usersNavi").slideDown(500, "swing");
  }, function() {
    $("nav.usersNavi").slideUp(500, "swing");
  });
  //getCurrent
  $("nav.usersNavi ul li a").each(function() {
    var $href = $(this).attr("href");
    if(location.href.match($href)) {
      $(this).addClass("usersNaviCurrent");
    } else {
      $(this).removeClass("usersNaviCurrent");
    }
  });
  //planPriceValue
  var kimonoPrice = 50000,
    hakamaPrice = 75000,
    haoriPrice = 100000,
    sakuraPrice = 125000,
    fujiPrice = 150000;
  $("select#planSelect").change(function() {
    var planName = $("[name=planSelect]").val();
    if(planName == "KIMONO") {
      $("[name=planPrice]").val(kimonoPrice);
    } else if(planName == "HAKAMA") {
      $("[name=planPrice]").val(hakamaPrice);
    } else if(planName == "HAORI") {
      $("[name=planPrice]").val(haoriPrice);
    } else if(planName == "SAKURA") {
      $("[name=planPrice]").val(sakuraPrice);
    } else if(planName == "FUJI") {
      $("[name=planPrice]").val(fujiPrice);
    } else {
      $("[name=planPrice]").val("0");
    }
  });
  //sumSelectBox.
  $("select#planSelect, select#planNumberSelect").change(function() {
    var planPrice = $("[name=planPrice]").val();
    var planNumber = $("[name=planNumberSelect]").val();
    var total = planPrice * planNumber;
    $("output").html("&yen;" + Math.ceil(total)); //Math ceil → 切り上げ.
    var outputVal = $("output").html();
    if(outputVal == "¥0" || outputVal == "¥NaN") {
      $("output").html(null);
    }
  });
  //webPayButtonTextReplace.
  //$("form.webPayButton input[type=button]").attr("value", "クレジットカードで決済");
  //Get Contents Height.
  $(window).on("load resize", function() {
    var windowHeight = $(window).height(),
      headerHeight = $("header").height(),
      footerHeight = $("footer").height(),
      contentsHeight = windowHeight - (headerHeight + footerHeight);
    $("#contents").css({
      "height": contentsHeight + "px"
    });
  });
});