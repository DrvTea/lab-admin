$('document').ready(function() {
    $("#registration-form").validate({
        errorClass: "error-class",
    validClass: "valid-class",
    errorElement: 'div',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    onError : function(){
        $('.input-group.error-class').find('.help-block.form-error').each(function() {
          $(this).closest('.form-group').addClass('error-class').append($(this));
        });
    },
        rules: {
            cont_no: {
                required: true,
                minlength: 10,
                maxlength: 10

            },
            username: {
                required: true,
                minlength: 3
            },
            gender: {
                required: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 15
            },
            confirmpassword: {
                required: true,
                equalTo: '#password'
            },
            user_email: {
                required: true,
                email: true
            },
        },
        messages: {
            contact_no: "Invalid number!",
            username: "Enter a Valid Username",
            gender: "Select a Gender",
            password:{
                required: "Provide a Password",
                minlength: "Password Needs To Be Minimum of 6 Characters"
            },
            user_email: "Enter a Valid Email",
            confirmpassword:{
                required: "Retype Your Password",
                equalTo: "Password Mismatch! Retype"
            }
        },
        submitHandler: submitForm
    });

    function submitForm() {
        var data = $("#registration-form").serialize();
        $.ajax({
            type : 'POST',
            url  : 'registerquery.php',
            data : data,
            beforeSend: function() {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span>Submitting <i class="fas fa-spinner"></i>');
            },
            success :  function(data) {
                if(data == "emailtaken"){
                    $("#error").fadeIn(100, function(){
                        $("#error").html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> &nbsp; That Email has already been taken!</div>');
                        $("#btn-submit").html('<i class="fas fa-sign-in-alt"></i> &nbsp; Create Account');
                    });
                } else if(data == "usertaken") { 
                    $("#error").fadeIn(100, function(){
                        $("#error").html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> &nbsp; That Username has already been taken!</div>');
                        $("#btn-submit").html('<i class="fas fa-sign-in-alt"></i> &nbsp; Create Account');
                    });
                } else if(data == "accexist") { 
                    $("#error").fadeIn(100, function(){
                        $("#error").html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> &nbsp; That account has already been created! Try Logging in or Check your username and email!</div>');
                        $("#btn-submit").html('<i class="fas fa-sign-in-alt"></i> &nbsp; Create Account');
                    });
                } else if(data == "registered") {
                    $("#btn-submit").html('Signing Up <i class="fas fa-spinner">');
                    setTimeout('$(".reg-form").fadeOut(250, function(){ $(".create-acc").load("success.php"); }); ',2500);
                } else { //Any Bugs on Query, etc. will be displayed here!
                    $("#error").fadeIn(100, function(){
                        $("#error").html('<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> &nbsp; ' + data + ' !</div>');
                        $("#btn-submit").html('<i class="fas fa-sign-in-alt"></i> &nbsp; Create Account');
                    });
                }
            }
        });
        return false;
    }
});