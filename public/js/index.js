$(function() {　　
  var redbagObj = {
    load: false,
    timeId: "",
    element: "<div class='items00 redbagEelement'></div>",
    userWater: $(".current_water").text(),
    inituserRunWater: function() {
      this.userWater = $(".current_water").text();
    },
    getRainTime: function() {
      var date = new Date();
      var hour = date.getHours();
      var month = date.getMonth();
      var raintime = [1, 3, 5, 7, 9, 10, 11, 4]
      /*for (var i = 0; i < raintime.length; i++) {
        return month == raintime[i];
      }*/
      return false;
    },
    rainAimate: function() {
      var item = this.element;
      console.log(item);
      if (this.element == undefined) {
        return false;
      };
      this.timeId = setInterval(function() {
        var dom_width = $(window).width();
        var cur_width = Math.floor(Math.random() * dom_width);
        var speed = 2500 + Math.floor(800 * Math.random());
        var randomNum = Math.floor(Math.random() * 3);
        $(item).clone().appendTo('.redbag_animate_area').css({
          left: cur_width + "px"
        }).removeClass('items00').
        addClass('items0' + randomNum).
        animate({
            top: $(window).height()
          },
          speed, "linear",
          function() {
            $(this).remove();

          });
      }, 150);

    },
    clearRainAimate: function() {
      window.clearInterval(this.timeId);


    }
  };
  /*console.log(redbagObj.getRainTime())
  $(".btn").click(function() {
    $(".redbag_animate_area").show()
    redbagObj.rainAimate();
  });*/
  if(redbagObj.getRainTime()){
    $(".redbag_animate_area").show()
    redbagObj.rainAimate();
  }
  /*window.setTimeout(redbagObj.clearRainAimate, 10000);*/
});
