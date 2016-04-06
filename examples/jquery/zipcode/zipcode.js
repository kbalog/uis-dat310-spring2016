$(document).ready(function() {
    $("input[name=postcode]").blur(function() {
        var postcode = $(this).val();
        $.get("getplace.php?postcode=" + postcode, function(data){
            $("#place").val(data);
        });
    });
});
