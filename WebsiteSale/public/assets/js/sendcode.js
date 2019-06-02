(function ($)
{
    $(document).ready(function ()
    {
        var time = new Date();
        // lay du lieu tu php ve va convert tu json to data
        $.get("http://localhost/websitesale/user/get_time_sendcode", function (data) {

            var obj = JSON.parse(data, function (key, value) {
                if (key == "birth") {
                    return new Date(value);
                } else {
                    return value;
                }
            });
            if (obj.status == 'ok') {
                var countDownDate = new Date(obj.time).getTime();
                // Update the count down every 1 second
                var x = setInterval(function () {
                    
                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById("timer_sendcode").innerHTML = minutes + " phút " + seconds + " giây ";

                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("timer_sendcode").innerHTML = "Hết thời gian";
                        window.location.href = "http://localhost/websitesale/home/index";
                    }
                }, 1000);
            } else {
                window.location.href = "http://localhost/websitesale/home/index";
            }
        });
        // Set the date we're counting down to


    });
})(jQuery);

