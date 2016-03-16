/**
 * This file is part of Exercise #3
 */

function lookup(item_id) {
    if (item_id.length == 3) { /* if item id is 3 digits */
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // TODO parse JSON response

                // TODO fill in form fields
            }
        };
        /* send the request using GET */
        xhr.open("GET", "inventory.php?item_id=" + item_id, true);
        xhr.send(null);
    }
    else {
        /* clear form values */
        document.getElementById("name").value = "";
        document.getElementById("brand").value = "";
        document.getElementById("size_x").value = "";
        document.getElementById("size_y").value = "";
        document.getElementById("size_z").value = "";
        document.getElementById("price").value = "";
        document.getElementById("available").checked = false;
    }
}

