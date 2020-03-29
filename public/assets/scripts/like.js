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