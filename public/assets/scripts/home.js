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
                    $("#caption").val("");
                }
            }

        })
    });    
}); 

function likePosts(id){
    $.ajax({
        url:"/like",
        type:"post",
        data:{postid: id},
        success: function(response){
            $("#butt-"+id).val("Like:"+response);
        }
    })
}

function addComment(id){
    comment = $("#comm-"+id).val();
    $.ajax({
        url:"/comment",
        type:"post",
        data:{postid: id, text: comment},
        success:function(response){
            $("#comm-"+id).val("");

            //insert comment by js.

            // comm_html = "<strong>"+response["username"]+"</strong></br><p>" + comment
            // $("#div_comm_".concat(id)).html($("#div_comm_".concat(id)).html().concat());
        }
    });
}

