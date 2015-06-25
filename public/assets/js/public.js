$(function () {
    $('select[value]').each(function () {
        $(this).val(this.getAttribute("value"));
    });
});

function checkAll(bx) {
    var chkinput = document.getElementsByTagName('input');
    for (var i = 0; i < chkinput.length; i++) {
        if (chkinput[i].type == 'checkbox') {
            chkinput[i].checked = bx.checked;
        }
    }
}

$(document).ready(function () {

});

