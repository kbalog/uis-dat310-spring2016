function initGrid() {
    // collect colors in an array
    var colors = [];
    var range = ["00", "33", "66", "99", "cc", "ff"];

    for (var r = 0; r < range.length; r++) {
        for (var g = 0; g < range.length; g++) {
            for (var b = 0; b < range.length; b++) {
                colors.push("#" + range[r] + range[g] + range[b]);
            }
        }
    }

    // creating colored tiles
    var cdiv = document.getElementById("color");
    for (var i = 0; i < colors.length; i++) {
        var tile = document.createElement("div");
//        tile.addClass("choice");
        tile.style.backgroundColor = colors[i];
        cdiv.appendChild(tile);
    }
}

window.onload = function () {
    initGrid();
}

/*
    // when a tile is clicked
    $(".choice").click(function () {
        var color = $(this).attr("color");
        $("#selected").html(color);
        $("#selected").css("background-color", color);
    });
*/