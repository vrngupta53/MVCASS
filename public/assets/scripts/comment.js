function addComment(id){
    comment = $("#comm-"+id).val();
        if(comment != ""){
            $.ajax({
                url:"/comment",
                type:"post",
                data:{postid: id, text: comment},
                success:function(response){
                    $("#comm-"+id).val("");
                }
            });
        }
}