/**
 * Created by ju on 2017/8/15.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.like-button').click(function (event) {
    var target = $(event.target);
    var current_like = target.attr('like-value');
    var user_id = target.attr('like-user');
    if(current_like == 1) {
        $.ajax({
            url:"/user/"+user_id+"/unfan",
            method:"POST",
            dataType:'json',
            success:function (data) {
                if (data.error!=0) {
                    alert(data.msg);
                    return;
                }

                target.attr('like-value',0);
                target.text('关注');
            }
        })
    } else if (current_like == 0){
        $.ajax({
            url:"/user/"+user_id+"/fan",
            method:"POST",
            dataType:'json',
            success:function (data) {
                if (data.error!=0) {
                    alert(data.msg);
                    return;
                }

                target.attr('like-value',1);
                target.text('取消关注');
            }
        })
    }
});