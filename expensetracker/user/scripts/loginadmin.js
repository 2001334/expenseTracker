$(document).ready(function(){
    /**
     * HANDLE FORM VALIDATION
     * ID of the login form = #adminForm
     */
    $("#adminLogin").validate({
        rules:
        {
            email: {
                required: true
            },
            pwd: {
                required: true,
                minlength: 6
            }
        },

        messages:
        {
            email: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Provide a valid email address</div>'
            },
            pwd: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Enter your password</div>',
                minlength: '<div class="clRed"> <span class="fa fa-warning"></span> Password length must not be less than six(6) characters </div>'
            }
        },

        submitHandler: loginUser
    });

    /**
     * Handler for submitForm method/function
     */
    function loginUser()
    {
        var data= $("#adminLogin").serialize();
        // alert(data);
        // declare needed constants
        const verifying= '<span class="fa fa-spinner"></span> Verifying your information ...';
        const invalidEmail= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> Oops! It seems you are not yet a registered admin</div>';
        const wrongPwd= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> Incorrect Password</div>';
        const retry= '<span class="fa fa-sign-in"></span> Retry ...';
        const submitted= '<span class="fa fa-check"></span> Logged In ...';
        const successful= '<div class="alert bgGreen"><span class="fa fa-warning"></span>Authentication is successful! Redirecting...</div>';

        // use ajax to fetch and post data to the database
        $.ajax({
            type: 'POST',
            url: 'loginadmin.php',
            data: data,
            beforeSend: function(){
                $("#error").fadeOut();
                $("#loginBtn").html(verifying);
            },
            success: function(response){
                if(response=="authenticated"){
                    $("#loginBtn").html(submitted);
                    $("#error").fadeIn(500, function(){
                        $("#error").html(successful);
                    });
                    setTimeout('window.location.href= "adashboard.php?login successful"', 3000);
                }
                else if(response=="notPrepared"){
                    $("#error").fadeIn(500, function(){
                        $("#error").html(invalidEmail);
                        $("#loginBtn").html(retry);
                    });
                }
                else if(response=="invalidEmail"){
                    $("#error").fadeIn(500, function(){
                        $("#error").html(invalidEmail);
                        $("#loginBtn").html(retry);
                    });
                }
                else if(response=="wrongPwd"){
                    $("#error").fadeIn(500, function(){
                        $("#error").html(wrongPwd);
                        $("#loginBtn").html(retry);
                    });
                }
                
                else{
                    $("#error").fadeIn(500, function(){
                        $("#error").html(notSubmitted);
                        $("#loginBtn").html(retry);
                    });
                }
            }
        });
        return false;
    }
    /**
     * end of function loginUser
     */
});