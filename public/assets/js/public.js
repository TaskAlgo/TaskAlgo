$(function () {
    $('select[value]').each(function () {
        $(this).val(this.getAttribute("value"));
    });
});

$(document).ready(function () {
    
});

