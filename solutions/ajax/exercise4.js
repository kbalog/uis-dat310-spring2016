/**
 * All JS code related to Exercise #4 comes here
 */

function init() {
    // set the availability div to hidden
    document.getElementById("availability").style.display = "none";

    // assign event handlers to all selects with class name "dateselector"
    // (class="dateselector" was appended to all selects in exercise4.inc.php)
    var selects = document.getElementsByClassName("dateselector");
    for (var i = 0; i < selects.length; i++) {
        selects[i].onchange = checkAvailability;
    }
}

function getSelectedValue(id) {
    var s = document.getElementById(id);
    return s.options[s.selectedIndex].value;
}

function checkAvailability() {
    // request the availability from exercise4.ajax.php and display the
    // response (HTML tables) in the availability div
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            document.getElementById("avail_details").innerHTML = result;
        }
    };
    var checkin = getSelectedValue("year") + "-" + getSelectedValue("month") + "-" + getSelectedValue("day");
    var days = getSelectedValue("days");
    var property_id = document.getElementById("property_id").value;
    xhr.open("GET", "exercise4.ajax.php?checkin=" + checkin + "&days=" + days + "&property_id=" + property_id, true);
    xhr.send(null);

    // set the availability div to display
    document.getElementById("availability").style.display = "block";
    // display a spinning circle while waiting for the response
    document.getElementById("avail_details").innerHTML = "<img src='images/loader.gif' />";
}
