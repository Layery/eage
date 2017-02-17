$(function(){
    //$.post('/site/index', function(back){
    //    $(".body-content").html(back);
    //})
    $.ajax({
        url : '?r=site/index',
        type : 'GET',
        dataType : 'json'
        //data : {}
    })
    .done(function(back){
        var html_str = '';
        $.each(back, function(k , v){
            html_str += '<div class="body-content">' +
                '<h2>'+ v.name +'</h2>' +
                '<p>'+ v.post +'</p>' +
                '<p><a href="javascript:detail('+ v.id +')">vew detail</a></p>' +
                '</div>';
        });
        $("#container").html(html_str);
    })
});


function detail(id) {
    var url = '?r=article/detail';
    $.post(url, {id : id}, function(back){
        var html = jQuery.parseJSON(back);
        alert(html);
    })
}
