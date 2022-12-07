function linkTo(id){
    var url = "detail.php?id=" + id;
    $(location).attr('href', url);
}

function more(page,id)
{
    page = page + 1;
    var url = "detail.php?page="+ page + "&id=" + id;
    $(location).attr('href', url);
}

function goto(){
    $(location).attr('href', "#goto");
}

$(document).ready(function(){
    $('#pay').val("cod");
    var check = $('input[name="payment-methods"]');
    check.change(function(){
        if(check.is(":checked")){
            var vlu = $('input[name="payment-methods"]:checked').val();
            $('#pay').val(vlu);
        }
    });
});