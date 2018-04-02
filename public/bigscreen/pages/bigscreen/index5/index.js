/**
 * Created with IntelliJ IDEA.
 * Description: 图表
 * User: wxl
 * Date: 2018-01-28
 * Time: 21:52
 */
$(function () {
    initCharts();
    
    //初始化图表
    function initCharts() {
        var itemId = getParam('itemId');
        //获取数据
        $.when(
            //任务表
            $.ajax('http://xha.me:7080/api/v1/post/' + itemId),
            //用户表
            $.ajax('http://dc.butterfly.mopaasapp.com/user/listUser'),
            //流程
            $.ajax('http://xha.me:7080/api/v1/news/' + itemId)
        ).done(function (data, userList, flows) {
            //用户
            var userMap = {};
            userList[0].forEach(function (user) {
                userMap[user.USER_ID] = user;
            });
            //任务
            var task = data[0].data;
            //设置任务内容
            var laytpl = layui.laytpl;
            laytpl($('#task-tpl').html()).render({
                task: task,
                userMap: userMap,
                //获取部门名称
                getDepName: function (depId) {
                    var depName = '';
                    $.ajax({
                        url: 'http://xha.me:7080//api/v1/dept/' + depId,
                        async: false
                    }).done(function (data) {
                        depName = data.data.dept_name;
                    });
                    return depName;
                }
            }, function (html) {
                $('#c1').html(html);
            });
            //图片展示
            laytpl($('#images-tpl').html()).render({
                list: task.images || []
            }, function (html) {
                $('#c2').html(html);
            });
            //流程展示
            laytpl($('#flow-tpl').html()).render({
                list: flows[0].data,
                userMap: userMap
            }, function (html) {
                $('#c3').html(html);
            });
        });
    }
    
});


/**
 * 获取页面参数
 */
function getParam(name) {
    var url = decodeURI(window.location.search);   //location.search是从当前URL的?号开始的字符串
    if (url.indexOf(name) !== -1) {
        var pos_start = url.indexOf(name) + name.length + 1;
        var pos_end = url.indexOf("&", pos_start);
        
        if (pos_end === -1) {
            return url.substring(pos_start)
        }
        return null;
    }
    return null;
}
