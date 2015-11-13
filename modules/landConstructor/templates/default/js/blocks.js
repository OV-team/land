$(document).ready(function () {
// less start compile
    less = {
        env: "development",
        async: false,
        fileAsync: false,
        poll: 1000,
        functions: {},
        dumpLineNumbers: "comments",
        relativeUrls: false,
        rootpath: ":/a.com/"
      };
// less start compile

// Dynamic vertical align info block
    var contactFormHeight = document.getElementById('form').clientHeight;       // get contact form height
    document.getElementById('info').style.height = ""+contactFormHeight+"px";   // set info height like as form

    var contactInfoHeight = document.getElementById('infoIn').clientHeight;     // get infoIn height
    var contactInfoHeightHalf = contactInfoHeight/2;                            // get infoIn height/2
    document.getElementById('infoIn').style.height = ""+contactInfoHeight+"px"; // set info height like dynamic info

    $("#infoIn").css({"margin-top": "-"+contactInfoHeightHalf+"px"});           // set infoIn margin - (look at blocks.css)
// Dynamic vertical align info block

//countdoun
        var endDate = "January 26, 2016 20:39:00";
          $('.tk-countdown .row').countdown({
            date: endDate,
            render: function(data) {
              $(this.el).html('<div><div class="days"><span>' + this.leadingZeros(data.days, 2) + '</span><span>days</span></div><div class="hours"><span>' + this.leadingZeros(data.hours, 2) + '</span><span>hours</span></div></div><div class="tk-countdown-ms"><div class="minutes"><span>' + this.leadingZeros(data.min, 2) + '</span><span>minutes</span></div><div class="seconds"><span>' + this.leadingZeros(data.sec, 2) + '</span><span>seconds</span></div></div>');
            }
        });
//countdoun

function log(message) {
  var client = new XMLHttpRequest();
  client.open("POST", "/log");
  client.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");
  client.send(message);
}
});