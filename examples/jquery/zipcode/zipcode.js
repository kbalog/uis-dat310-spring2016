$(document).ready(function() {
    $("input[name=postcode]").blur(function() {
        $.get("getplace.php", {postcode: $(this).val()}, function (data) {
            $("#place").val(data);
        });
    });
});
