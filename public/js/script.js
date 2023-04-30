function clock() {
    var curTime = new Date();

    var curHours = curTime.getHours();
    var curMinutes = curTime.getMinutes();
    var curSeconds = curTime.getSeconds();

    curMinutes = (curMinutes < 10 ? "0" : "") + curMinutes;
    curSeconds = (curSeconds < 10 ? "0" : "") + curSeconds;

    var timeOfDay = (curHours < 12) ? "AM" : "PM";

    curHours = (curHours > 12) ? curHours - 12 : curHours;
    curHours = (curHours == 0) ? 12 : curHours;

    var curTimeStr = curHours + ":" + curMinutes + ":" + " " + timeOfDay;

    document.getElementById("clock").firstChild.nodeValue = curTimeStr;
  }

  setInterval(clock, 1000);
