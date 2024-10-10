jQuery(function ($) {
  $(document).ready(function () {
    $("input.text").attr("type", "hidden");
    var ftext1 = [];
    var ftext2 = [];
    var ftext3 = [];

    $(".input1 .check-list .check-item").on("click", function () {
      $(this).toggleClass("clicked");
      aa = $(this).text();
      if ($(this).hasClass("clicked")) {
        ftext1.push(aa);
      } else if ($(this).removeClass("clicked")) {
        ftext1.splice($.inArray(aa, ftext1), 1);
      }

      $(".input1 .inputt").empty();
      for (k = 0; k < ftext1.length; k++) {
        $(".input1 .inputt").append("<li>" + ftext1[k] + "</li>");
      }
      var text1 = "";
      $(".input1 .inputt li").each(function () {
        lii = $(this).text();
        text1 = text1 + $.trim(lii) + "/";
      });

      $(".input1 .inputt li").on("click", function () {
        var ab = $(this).text();
        var abc = $.trim(ab) + "/";

        text1 = text1.replace(abc, "");
        $(".text1").attr("value", text1);
        $(this).remove();

        $.each(ftext1, function (i, val) {
          if (val === ab) {
            ftext1.splice(i, 1);
          }
        });
        $(".input1 .check-list .check-item").each(function () {
          if ($(this).text() === ab) {
            $(this).removeClass("clicked");
          }
        });
      });
      $(".text1").attr("value", text1);
      $("#region_0").val(ftext1.join("/"));
      $("#region_0").attr("value", ftext1.join("/"));
    });

    $(".input2 .check-list .check-item").on("click", function () {
      $(this).toggleClass("clicked");
      aa = $(this).text();
      if ($(this).hasClass("clicked")) {
        ftext2.push(aa);
      } else if ($(this).removeClass("clicked")) {
        ftext2.splice($.inArray(aa, ftext2), 1);
      }

      $(".input2 .inputt").empty();
      for (k = 0; k < ftext2.length; k++) {
        $(".input2 .inputt").append("<li>" + ftext2[k] + "</li>");
      }
      var text2 = "";
      $(".input2 .inputt li").each(function () {
        lii = $(this).text();
        text2 = text2 + $.trim(lii) + "/";
      });
      $(".input2 .inputt li").on("click", function () {
        var ab = $(this).text();
        var abc = $.trim(ab) + "/";

        text2 = text2.replace(abc, "");
        $(".text2").attr("value", text2);
        $(this).remove();
        $.each(ftext2, function (i, val) {
          if (val === ab) {
            ftext2.splice(i, 1);
          }
        });
        $(".input2 .check-list .check-item").each(function () {
          if ($(this).text() === ab) {
            $(this).removeClass("clicked");
          }
        });
      });
      $(".text2").attr("value", text2);
      $("#region_1").val(ftext2.join("/"));
      $("#region_1").attr("value", ftext2.join("/"));
    });

    $(".input3 .check-list .check-item").on("click", function () {
      $(this).toggleClass("clicked");
      aa = $(this).text();
      if ($(this).hasClass("clicked")) {
        ftext3.push(aa);
      } else if ($(this).removeClass("clicked")) {
        ftext3.splice($.inArray(aa, ftext3), 1);
      }

      $(".input3 .inputt").empty();
      for (k = 0; k < ftext3.length; k++) {
        $(".input3 .inputt").append("<li>" + ftext3[k] + "</li>");
      }
      var text3 = "";
      $(".input3 .inputt li").each(function () {
        lii = $(this).text();
        text3 = text3 + $.trim(lii) + "/";
      });
      $(".input3 .inputt li").on("click", function () {
        var ab = $(this).text();
        var abc = $.trim(ab) + "/";

        text3 = text3.replace(abc, "");
        $(".text3").attr("value", text3);
        $(this).remove();
        $.each(ftext3, function (i, val) {
          if (val === ab) {
            ftext3.splice(i, 1);
          }
        });
        $(".input3 .check-list .check-item").each(function () {
          if ($(this).text() === ab) {
            $(this).removeClass("clicked");
          }
        });
      });
      $(".text3").attr("value", text3);
      $("#region_2").val(ftext3.join("/"));
      $("#region_2").attr("value", ftext3.join("/"));
    });
    var rel = $("#survey .dl1").text().replaceAll(",", "/");
    $("#survey .dl1").text(rel);
    rel = $("#survey .dl2").text().replaceAll(",", "/");
    $("#survey .dl2").text(rel);

    $("#survey .ard").on("click", function (e) {
      $(this).parent().find(".scroll-bar").toggleClass("vip");
      $(this).toggleClass("up");
      $(".scroll-bar")
        .not($(this).parent().find(".scroll-bar"))
        .removeClass("vip");
      $("#survey .ard").not($(this)).removeClass("up");
    });
    $(".inputt").click(function (e) {
	  if(e.target != 'li'){
		$(this).parent().find(".scroll-bar").addClass("vip");
      	$(this).parent().find(".ard").addClass("up");
	  }
     e.stopPropagation();
     
    });
    $(".survey-form .check-list .check-item.focus").trigger("click");
    $(window).click(function (e) {
      if (
        $(window).width() > 768 &&
        $(".inputv-item").has(e.target).length == 0 &&
        !$(".inputv-item").is(e.target)
      ) {
        $("#survey .ard").removeClass("up");
        $(".scroll-bar").removeClass("vip");
      }
    });
  });
});
