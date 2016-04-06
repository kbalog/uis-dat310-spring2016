$(document).ready(function () {
    $("#username").blur(function () {
        var url = "check_username.php?username=" + $(this).val();
        $("#username_status").load(url);
    });
});
