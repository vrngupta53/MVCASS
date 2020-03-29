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