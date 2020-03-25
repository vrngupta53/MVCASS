$(document).ready(function(){
    $("#login-button").click(function(){
        var lemail = $("#lemail").val();
        var lpassword = $("#lpassword").val();
        $.ajax({
            url:'/',
            type:'post',
            data:{email:lemail, password:lpassword},
            success:function(response){
                if(response == 0){
                   /* window.location = ""; 
                   put address of page to be redirected to
                   */

                   alert("works!!");
                }else{
                    let msg = "Invalid email or password";
                    $("#loginmsg").html(msg);
                }
            }
        });
    });
});