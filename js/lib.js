//
$(function(){
    //показываем и скриваем подпункты меню "Мой профиль"
    $('#menu_prof li:first').siblings().hide();
    $('#menu_prof li:first').on('mouseenter', function(){
        $(this).siblings().show();
    });
    $('#menu_prof').on('mouseleave', function(){
        $('#menu_prof li:first').siblings().hide();
    });
    
    //очистка поля для поиска 
    var search = document.getElementById('search');
    $(search).on('focus', function(){
        if (search.defaultValue == search.value)
            $(this).val("").css("color", "black");
    });
    
    //очистка поля для ввода логина 
    var user = document.getElementById('txtUser');
    $(user).on('focus', function(){
        if (user.defaultValue == user.value)
            $(this).val("");
    });
    
});


function checkForm(form){
    var formFields = document.getElementById(form);
    console.log(formFields);
    var flag = true;
    for (var i = 0; i < formFields.length; ++i){
        if (formFields[i].type == "text"){
            if (formFields[i].value == ""){
                flag = false;
                formFields[i].style.borderColor = "red";
            } else{
                formFields[i].style.borderColor = "";
            }
        }
    }
    if (flag){
        return true;
    } else
        alert("Заполните все поля формы");
        return false;
    }


//получаем данные из регистрационной формы и отправляем на сервер
function registration(){
    if (checkForm('regForm')){
        var s = $('#regForm').serialize();
        alert(s);
        $(function(){
            $.ajax({
                type: "POST",
                url: "inc/registration.ajax.php",
                data: s,
                success: function(html){
                            $('#regForm').parent().html(html);
                        }
            });
        });
    }
    return false;
}

//добавляем товар в базу данных
function addItemToBase(){
    if (checkForm('addItem')){
        var s = $('#addItem').serialize();
        $(function(){
            $.ajax({
                type: "POST",
                url: "inc/addItem.ajax.php",
                data: s,
                success: function(html){
                            document.getElementById('addItem').reset();
                        }
            });
        });
    }
    return false;
}

// редактируем товар и заносим в базу данных
function redactItem(){
    var s = $('#redItem').serialize();
    alert(s);
    $(function(){
        $.ajax({
            type: "POST",
            url: "inc/redactItem.ajax.php",
            data: s,
            success: function(html){
                        alert(html);
                        location = "http://testwork.com/index.php?page=getmyitem";
                    }
        });
    });
    return false;
}

//поиск товара по названию
function getItemsByTitle(){
    var v = document.getElementById('search').value;
    var defV = document.getElementById('search').defaultValue;
    if (v && v != defV)
        location.replace("http://testwork.com/index.php?page=getbytitle&search=" + v); 
    return false;
}