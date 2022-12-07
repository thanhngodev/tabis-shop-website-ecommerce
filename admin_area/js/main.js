$(document).ready(function(){
    const name = $('#name');
    const quantity = $('#quantity');
    const price = $('#price');
    const category = $('select[name=category]');
    const type = $('select[name=type]');
    const make = $('select[name=make]');
    const description = $('textarea#description');
    const images = $('#images');

    const name_view = $('.name-view');
    const quantity_view = $('.quantity-view');
    const price_view = $('.price-view');
    const category_view = $('.category-view');
    const type_view = $('.type-view');
    const make_view = $('.make-view');
    const description_view = $('.description-view');
    const images_view = $('.loadImg');

    const submit = $('button[type="submit"]');
    const clear = $('#clear');

    // Default value
    var optionSelected = $("option:selected", category);
    category_view.text(optionSelected.val());

    var optionSelected = $("option:selected", type);
    type_view.text(optionSelected.val());

    var optionSelected = $("option:selected", make);
    make_view.text(optionSelected.val());

    // Change value
    function changed(obj,val){
        obj.text(val);
    };


    name.change(function(){
        changed(name_view,name.val());
    });

    quantity.change(function(){
        changed(quantity_view,quantity.val());
    });

    price.change(function(){
        changed(price_view,price.val());
    });

    category.change(function(){
        var optionSelected = $("option:selected", this);
        changed(category_view,optionSelected.val());
    });

    type.change(function(){
        var optionSelected = $("option:selected", this);
        changed(type_view,optionSelected.val());
    });

    make.change(function(){
        var optionSelected = $("option:selected", this);
        changed(make_view,optionSelected.val());
    });

    description.change(function(){
        changed(description_view,description.val());
    });

    // read url to image display
    function readURL(input) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
            images_view.attr('src', e.target.result);
        };
        
    }

    images.change(function(){
        console.log(images);
        readURL(this);
    });

    clear.click(function(e){
        name.val("");
        quantity.val("");
        price.val("");
        description.val("");
        e.preventDefault();
    });

});

function del_product(id){
    var option = confirm("Cảnh báo: Xóa sản phẩm?");
    if(!option){
        return;
    }
    $.post("ajax.php",
    {
        action: "delete",
        id: id
    },
    function(){
        location.reload();
    });
}

function del_category(id){
    var option = confirm("Cảnh báo: Xóa danh mục?");
    if(!option){
        return;
    }
    $.post("ajax.php",
    {
        action: "delete category",
        id: id
    },
    function(){
        location.reload();
    });
}
// function ACCOUNT

function edit(id){
    var input = document.getElementById(id);
    var button = document.querySelector('button[type="submit"]');
    input.removeAttribute("readonly");
    input.classList.add("input-active");
    button.removeAttribute("disabled");
}

function changePass(){
    var parent = document.querySelector('.center');
    var first = document.querySelector('.first');

    parent.classList.toggle("none");
}

function checkOld(){
    var usr_input = $("#usr");
    var pass_input = $("#pass");
    var password = pass_input.val();
    var usrname = usr_input.val();

    
    var validate = $('#validate');

    if(password != ""){
        $.post("ajax.php",
            {
                usrname: usrname,
                password: password,
                action: 'checkOld'
            },
            function(response){
                var msg = "";
                if(response == 1){
                    window.location = "account.php?state=changing";
                }else{
                    msg = "Mật khẩu không đúng!";
                    validate.html(msg);
                }
            }
        );
    }
}

function makeNew(){
    var new_pass_input = $("#new-pass");
    var confirm_input = $("#check");
    var new_pass = new_pass_input.val();
    var confirm = confirm_input.val();
    
    var validate = $('#validate1');

    if(new_pass != "" && confirm!=""){
        if(new_pass == confirm){
            $.post("ajax.php",
            {
                passwrd: new_pass,
                action: 'makeNew'
            },
            function(response){
                var msg = "";
                if(response == 1){
                    window.location = "logout.php";
                }else{
                    window.location = "account.php?state=changing";
                    msg = "Không thể đổi mật khẩu!";
                    validate.html(msg);
                    console.log(response);
                }
            }
            );
        }else{
            window.location = "account.php?state=changing";
            msg = "Xác nhận không đúng!";
            validate.html(msg);
        }
    } else{
        window.location = "account.php?state=changing";
        msg = "Mật khẩu trống!";
        validate.html(msg);
    }
}

$(document).ready(function(){
    var sta_type = $('#statistic-type');
    var timest = $('#time');
    sta_type.change(function(){
        switch (sta_type.val()) {
            case "time":
                timest.removeClass("none");
                break;
            case "product":
                timest.addClass("none");
                break;
            case "type":
                timest.addClass("none");
                break;
            case "make":
                timest.addClass("none");
                break;
        }
    });
    var time_sta = $('#time-sta');
                console.log(time_sta);
                time_sta.change(function(){
                    switch (time_sta.val()) {
                        case "day":
                            console.log($('#dtime'));
                            $('#dtime').removeClass("none");
                            $('#mtime').addClass("none");
                            $('#ytime').addClass("none");
                            break;
                        case "month":
                            $('#dtime').addClass("none");
                            $('#ytime').addClass("none");
                            $('#mtime').removeClass("none");
                            break;
                        case "year":
                            $('#dtime').addClass("none");
                            $('#mtime').addClass("none");
                            $('#ytime').removeClass("none");
                            break;
                    }
                })
});