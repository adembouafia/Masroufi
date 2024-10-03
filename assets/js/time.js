// var d = new Date();
// var h = d.getHours();
// var m = d.getMinutes();
// if (m >= 10) {
//     var time = h + ":" + m;
// } else {
//     var time = h + ":" + "0" + m;
// }
// document.getElementById("datetime").innerHTML = time;

function updateClock() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");

    const timeString = `${hours}:${minutes}`;
    document.getElementById("datetime").innerHTML = timeString;
}

setInterval(updateClock, 1000);
updateClock();
