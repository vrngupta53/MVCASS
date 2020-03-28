$(document).ready(function(){
    $("#upload-button").click(function(){
        var fd = new FormData();
        var files = $("#imgupload")[0].files[0];
        fd.append('file', files);
        fd.append('caption', $("#caption").val());

        $.ajax({
            url:"/post",
            type:"post",
            data:fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response != 0){
                    let msg = "file upload unsuccessful";
                    $("#div_msg").html(msg);
                }else{
                    alert("works!!");
                }
            }

        })
    });

    
}); 

