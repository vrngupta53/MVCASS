$(document).ready(function(){
    $("#upload-button").click(function(){
        var fd = new FormData();
        var files = $("#imgupload")[0].files[0];
        fd.append('file', files);

        $.ajax({
            url:"/profile/image",
            type:"post",
            data:fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    let msg = "Image upload unsuccessful";
                    $("#div_msg").html(msg);
                }else{
                    window.location = "/profile";
                }
            }
        });
    });    

    $("#username-button").click(function(){
        username = $("#username").val();
        $.ajax({
            url:"/profile/username",
            type:"post",
            data:{"username": username},
            success:function(){
                window.location = "/profile";
            }
        })
    });

    $("#pass-button").click(function(){
        pass = $("#password").val();
        $.ajax({
            url:"/profile/password",
            type:"post",
            data:{password: pass},
            success:function(){
                window.location = "/profile";
            }
        })
    });

    $("#choose-button").click(function(){
        $("#imgupload").click();
    });
});