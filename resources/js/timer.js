function formatTime(seconds) {
    var h = Math.floor(seconds / 3600),
    m = Math.floor(seconds / 60) % 60,
    s = seconds % 60;
    if (h < 10) h = "0" + h;
    if (m < 10) m = "0" + m;
    if (s < 10) s = "0" + s;
    return m + ":" + s;
}

var hms = document.getElementById('timer').innerText;
var a = hms.split(':');
var count = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
var counter = setInterval(timer, 1000);

function timer() {
    count--;
    if (count < 0) {
        alert("Het gio");
        window.location.href = 'https://google.com';
    }
    document.getElementById('timer').innerHTML = formatTime(count);
}
