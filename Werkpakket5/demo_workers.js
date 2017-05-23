/**
 * Created by 11502350 on 17/05/2017.
 */
var i = 0;
// code gemaakt met hulp van: https://www.w3schools.com/html/html5_webworkers.asp
function timedCount() {
    i = i + 1;
    postMessage(i);
    setTimeout("timedCount()",500);
}

timedCount();