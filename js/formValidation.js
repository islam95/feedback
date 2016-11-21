document.my_form.name.onblur = function () {
    if(document.my_form.name.value === ""){
        document.getElementById("name-error").innerHTML = "Пожалуйста, введите своё имя";
    } else {
        document.getElementById("name-error").innerHTML = "";
    }
}

document.my_form.email.onblur = function () {

    var email = document.my_form.email.value;
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email === ""){
        document.getElementById('email-error').innerHTML = "Пожалуйста, введите свой email";
    } else if (!(re.test(email))) {
        document.getElementById('email-error').innerHTML = "Пожайлуйста, введите правильный email";
    } else {
        document.getElementById("email-error").innerHTML = "";
    }

} // email

document.my_form.message.onblur = function () {
    if(document.my_form.message.value === ""){
        document.getElementById("message-error").innerHTML = "Пожалуйста, введите ваш отзыв";
    } else {
        document.getElementById("message-error").innerHTML = "";
    }
}

/*
$(document).ready(function () {
   $('#my_form').submit(function () {
       var abort = false;
       $("div.errorForm").remove();
       $(':input[required]').each(function () {
           if ($(this).val() === ''){
               $(this).after('<div class="errorForm">Это обязательное поле</div>');
               abort = true;
           }
       }); // go through each required value
        if (abort){
            return false;
        } else {
            return true;
        }
   }) // on submit
}); // ready

    */