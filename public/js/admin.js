
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".post-audit").click(function (event) {
    target = $(event.target);
    var post_id= target.attr('post-id');
    var status = target.attr('post-action-status');
    console.log(post_id);
    $.ajax({
        url:'/admin/posts/'+post_id+'/check',
        method:'POST',
        data:{'status':status},
        dataType:'json',
        success: function (res) {
            if(res.error!= 0){
                alert(res.msg);
                return;
            }
            target.parent().parent().remove();
        }
    });
});


// function check(button) {
//      var post_id=$(button).attr('post-id');
//     var status = $(button).attr('post-action-status');
//     $.post('posts/'+post_id+'/check',{'status':status},function (res) {
//         alert(res.status);
//         if(res.status==1) {
//             alert('成功');
//         }else if (res.status==0) {
//             alert('失败');
//         }
//     },'json');
// }