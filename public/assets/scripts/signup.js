$(document).ready(function(){
    $("#signup-button").click(function(){
        var susername = $("#susername").val();
        var spassword = $("#spassword").val();
        var semail = $("#semail").val();
        if(susername == "" || spassword == "" || semail == ""){
            let msg = "Must provide username, email and password";
            $("#signupmsg").html(msg);
        }else{
            $.ajax({
                url:"/signup",
                type:'post',
                data:{username:susername, password:spassword, email:semail},
                success:function(response){
                    if(response == 0){
                        alert("account created");
                    }else{
                        let msg = "Email already registered";
                        $("#signupmsg").html(msg);
                    }
                }

            });
        }

    });
});