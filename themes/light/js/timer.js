// Set the date we're counting down to
//var countDownDate = new Date("Aug 18, 2018 11:00:00").getTime();
var d = new Date();
var countDownDate = new Date("Dec 31, "+d.getFullYear()+" 11:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days    = Math.floor( distance / (1000 * 60 * 60 * 24));
    var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    $(".timer_dia").html(days + "");
    $(".timer_hora").html(hours + "");
    $(".timer_min").html(minutes + "");
    $(".timer_seg").html(seconds);

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        $(".timer_dia").html(0 + "");
        $(".timer_horas").html(0 + "");
        $(".timer_min").html(0 + "");
        $(".timer_seg").html(0) ;
    }
}, 1000);

