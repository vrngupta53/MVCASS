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
                    window.location = "/home/latest"; 
                }else{
                    let msg = "Invalid email or password";
                    $("#loginmsg").html(msg);
                }
            }
        });
    });
});