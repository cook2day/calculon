
$( document ).ready(function() {
    $('#cook-unit').on('change', function (e) {
        var optionSelected = $("option:selected", this).text();
        $('#c_unit').text(optionSelected);
    });
    $('#shop-unit').on('change', function (e) {
        var optionSelected = $("option:selected", this).text();
        $('#s_unit').text(optionSelected);
    });

});
