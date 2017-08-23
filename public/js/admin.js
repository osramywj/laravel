

function check(button) {
     var post_id=$(button).attr('post-id');
    var status = $(button).attr('post-action-status');
    $.post('posts/'+post_id+'/check',{'status':status},function (res) {
        if(res.status==1) {
            alert('成功');
        }else if (res.status==0) {
            alert('失败');
        }
    },'json');
}