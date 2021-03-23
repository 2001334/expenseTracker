$(document).ready(function()
{
    /**(1)
     * HANDLE FORM VALIDATION FOR USER REGISTRATION
     */
    $("#registerUserForm").validate({
        rules:
        {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email: {
                required: true
            },
            psword: {
                required: true,
            },
            confirmPwd: {
                required: true,
                equalTo: "#pwd"
            }
        },

        messages:
        {
            fname: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Pls enter your first name</div>'
            },
            lname: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Pls enter your last name</div>'
            },
            email: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Enter a valid email address</div>'
            },
            psword: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Password must not be less than 6 characters</div>'
            },
            confirmPwd: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Password does not match </div>'
            }
        },

        submitHandler: submitUser
    });

    /**
     * Handler for submitForm method/function
     */
    function submitUser()
    {
        var data= $("#registerUserForm").serialize();

        const submitting= '<span class="fa fa-spinner"></span> Submitting ...';
        const unprepared= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> SQL statement not prepared</div>';
        const userAlreadyExist= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> Sorry! This user already exist in the database !</div>';
        const retry= '<span class="fa fa-sign-in"></span>   Retry...';
        const submitted= '<span class="fa fa-check"></span> Submitted ...';
        const userAdded= '<div class="alert alert-success"> <span class="fa fa-warning"></span> User registration is successful! Redirecting... </div>';
        const notSubmitted= '<div class="alert alert-danger"><span class="fa fa-warning"></span>  Failed '+data+' !</div>';
        
        // use ajax to fetch and post data to the database
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: data,
            beforeSend: function(){
                $("#error").fadeOut();
                $("#regBtn").html(submitting);
            },
            success: function(response){
                // alert(response)
                if(response=="registered"){
                    $("#regBtn").html(submitted);
                    $("#error").fadeIn(500, function(){
                        $("#error").html(userAdded);
                    });
                    /**
                     * setTimeOut() method allows some arguments to be executed at a set-time
                     * So the argument executed here helps redirect the user to a new location
                     */
                    setTimeout('window.location.href= "index.php#loginForm"', 3500);
                }
                else if(response=="notPrepared"){
                    $("#error").fadeIn(500, function(){
                        $("#error").html(unprepared);
                        $("#regBtn").html(retry);
                    });
                }
                else if(response=="1"){
                    $("#error").fadeIn(500, function(){
                        $("#error").html(userAlreadyExist);
                        $("#regBtn").html(retry);
                    });
                }
                else{
                    $("#error").fadeIn(500, function(){
                        $("#error").html(notSubmitted);
                        $("#regBtn").html(retry);
                    });
                }
            }
        });
        return false;
    }
    /**
     * end of function to register new user
     */


    /**(2)
     * HANDLE FORM VALIDATION
     * ID of the login form = #loginForm
     */
     $("#loginForm").validate({
        rules:
        {
            email: {
                required: true
            },
            pwd: {
                required: true
            }
        },

        messages:
        {
            email: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Provide a valid email address</div>'
            },
            pwd: {
                required: '<div class="clRed errorMssg"> <span class="fa fa-warning"></span> Enter your password</div>',
            }
        },

        submitHandler: loginUser
    });

    /**
     * Handler for submitForm method/function
     */
    function loginUser()
    {
        var data= $("#loginForm").serialize();
        // declare needed constants
        const verifying= '<span class="fa fa-spinner"></span> Verifying your information ...';
        const invalidEmail= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> Oops! It seems you are not yet a registered user</div>';
        const wrongPwd= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> Incorrect Password</div>';
        const retry= '<span class="fa fa-sign-in"></span> Retry ...';
        const submitted= '<span class="fa fa-check"></span> Logged In ...';
        const successful= '<div class="alert bgGreen"><span class="fa fa-warning"></span>Authentication is successful! Redirecting...</div>';

        /**
         * // use ajax to fetch and post data to the database
         * Ajax was used in order to eliminate unnecessary page reloads which in turn saves-
         * user data and improves their experience with fast and quick error reporting functionality.
         */
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: data,
            beforeSend: function(){
                $("#error2").fadeOut();
                $("#logBtn").html(verifying);
            },
            success: function(response){
                if(response=="authenticated"){
                    $("#logBtn").html(submitted);
                    $("#error2").fadeIn(500, function(){
                        $("#error2").html(successful);
                    });
                    setTimeout('window.location.href= "user/udashboard.php?login successful"', 3000);
                }
                else if(response=="notPrepared"){
                    $("#error2").fadeIn(500, function(){
                        $("#error2").html(invalidEmail);
                        $("#logBtn").html(retry);
                    });
                }
                else if(response=="invalidEmail"){
                    $("#error2").fadeIn(500, function(){
                        $("#error2").html(invalidEmail);
                        $("#logBtn").html(retry);
                    });
                }
                else if(response=="wrongPwd"){
                    $("#error2").fadeIn(500, function(){
                        $("#error2").html(wrongPwd);
                        $("#logBtn").html(retry);
                    });
                }
                
                else{
                    $("#error2").fadeIn(500, function(){
                        $("#error2").html(notSubmitted);
                        $("#logBtn").html(retry);
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