$(document).ready(function()
{
    /**(1)
     * HANDLE FORM VALIDATION
     * ID of the registration form = #myRegister
     */
    $("#myRegister").validate({
        rules:
        {
            ename: {
                required: true
            },
            amountSpent: {
                required: true
            },
            dateSpent: {
                required: true
            }
        },

        messages:
        {
            ename: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Expenses name is required</div>'
            },
            amountSpent: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Amount Spent is required</div>'
            },
            dateSpent: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Date is required</div>'
            }
        },

        submitHandler: registerRecord
    });

    /**
     * Handler for submitForm method/function
     */
    function registerRecord()
    {
        var data= $("#myRegister").serialize();

        const submitting= '<span class="fa fa-spinner"></span> Submitting ...';
        const unprepared= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> SQL statement not prepared</div>';
        const retry= '<span class="fa fa-sign-in"></span>   Retry...';
        const submitted= '<span class="fa fa-check"></span> Submitted ...';
        const recordAdded= '<div class="alert alert-success"> <span class="fa fa-warning"></span> New Expenses Record added successfully!</div>';
        const notSubmitted= '<div class="alert alert-danger"><span class="fa fa-warning"></span>  Registration unsuccessful '+data+' !</div>';
        
        // use ajax to fetch and post data to the database
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: data,
            beforeSend: function(){
                $("#error").fadeOut();
                $("#registerBtn").html(submitting);
            },
            success: function(response){
                // alert(response)
                if(response=="registered"){
                    $("#registerBtn").html(submitted);
                    $("#error").fadeIn(500, function(){
                        $("#error").html(recordAdded);
                    });
                    setTimeout('window.location.href= "manageexpenses?Submission was successful"', 3000);
                }
                else if(response=="notPrepared"){
                    $("#error").fadeIn(500, function(){
                        $("#error").html(unprepared);
                        $("#registerBtn").html(retry);
                    });
                }
                
                else{
                    $("#error").fadeIn(500, function(){
                        $("#error").html(notSubmitted);
                        $("#registerBtn").html(retry);
                    });
                }
            }
        });
        return false;
    }
    /**
     * end of function register new records
     */


    
    /**(2)
     * HANDLE RECOVER DELETE RECORDS
     * ID of the recover form = #recoverStaff
     */
    $("#recoverStaff").validate({
        rules:
        {
            recoverID: {
                required: true
            }
        },

        messages:
        {
            recoverID: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span>Admin ID is required</div>'
            }
        },

        submitHandler: recoverUser
    });

    /**
     * HANDLE RECOVER ADMIN FORM
     * function to delete user
     */
    function recoverUser()
    {
        var data= $("#recoverStaff").serialize();

        const submitting= '<span class="fa fa-spinner"></span> Submitting ...';
        const unprepared= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> SQL statement not prepared</div>';
        const notFound= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> Admin not found in the database!</div>';
        const recovered= '<div class="alert alert-success"> <span class="fa fa-warning"></span> Admin Data Recovered Successfully</div>';
        const retry= '<span class="fa fa-sign-in"></span>   Retry...';
        const submitted= '<span class="fa fa-check"></span> Submitted ...';
        const notSubmitted= '<div class="alert alert-danger"><span class="fa fa-warning"></span>  Registration unsuccessful '+data+' !</div>';
        
        // use ajax to fetch and post data to the database
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: data,
            beforeSend: function(){
                $("#error3").fadeOut();
                $("#recoverBtn").html(submitting);
            },
            success: function(response){
                // alert(response)
                if(response=="recovered"){
                    $("#recoverBtn").html(submitted);
                    $("#error3").fadeIn(500, function(){
                        $("#error3").html(recovered);
                    });
                    setTimeout('window.location.href= "manageexpenses?recovered successfully"', 2500);
                }
                else if(response=="notPrepared"){
                    $("#error3").fadeIn(500, function(){
                        $("#error3").html(unprepared);
                        $("#recoverBtn").html(retry);
                    });
                }
                else if(response=="notFound"){
                    $("#error3").fadeIn(500, function(){
                        $("#error3").html(notFound);
                        $("#recoverBtn").html(retry);
                    });
                }
                
                else{
                    $("#error3").fadeIn(500, function(){
                        $("#error3").html(notSubmitted);
                        $("#recoverBtn").html(retry);
                    });
                }
            }
        });
        return false;
    }
    /**
     * end of the recover controller js function
     */

    
    /**
     * HANDLE FORM VALIDATION
     * ID of the edit profile form = #adminForm
     */
    $("#editProfileForm").validate({
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
            phone: {
                required: true
            }
        },

        messages:
        {
            fname: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Firstname is required</div>'
            },
            lname: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Lastname is required</div>'
            },
            email: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Provide a valid email address</div>'
            },
            phone: {
                required: '<div class="clRed"> <span class="fa fa-warning"></span> Phone number is required</div>'
            }
        },

        submitHandler: editProfile
    });

    /**
     * Handler for edit profileForm method/function
     */
    function editProfile()
    {
        var data= $("#editProfileForm").serialize();

        const submitting= '<span class="fa fa-spinner"></span> Submitting ...';
        const unprepared= '<div class="alert alert-danger"> <span class="fa fa-warning"></span> SQL statement not prepared</div>';
        const retry= '<span class="fa fa-sign-in"></span>   Retry...';
        const submitted= '<span class="fa fa-check"></span> Submitted ...';
        const userUpdated= '<div class="alert alert-success"> <span class="fa fa-warning"></span> Profile Updated has been successfully added!</div>';
        const notSubmitted= '<div class="alert alert-danger"><span class="fa fa-warning"></span>  Registration unsuccessful '+data+' !</div>';
        
        // use ajax to fetch and post data to the database
        $.ajax({
            type: 'POST',
            url: 'controller.php',
            data: data,
            beforeSend: function(){
                $("#error6").fadeOut();
                $("#editProfile").html(submitting);
            },
            success: function(response){
                // alert(response)
                if(response=="updated"){
                    $("#editProfile").html(submitted);
                    $("#error6").fadeIn(500, function(){
                        $("#error6").html(userUpdated);
                    });
                    setTimeout('window.location.href= "editprofile.php?Submission was successful"', 1500);
                }
                else if(response=="notPrepared"){
                    $("#error6").fadeIn(500, function(){
                        $("#error6").html(unprepared);
                        $("#editProfile").html(retry);
                    });
                }
                else if(response=="notFound"){
                    $("#error6").fadeIn(500, function(){
                        $("#error6").html(notFound);
                        $("#editProfile").html(retry);
                    });
                }
                
                else{
                    $("#error6").fadeIn(500, function(){
                        $("#error6").html(notSubmitted);
                        $("#editProfile").html(retry);
                    });
                }
            }
        });
        return false;
    }
    /**
     * end of function register admin
     */
     

    
});

