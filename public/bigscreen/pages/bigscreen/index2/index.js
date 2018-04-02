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
        // 图表渲染函数
        var charts = {};
        //图表生成函数
        var fns = {
            //项目总览
            c1: function () {
            
            },
            //列表
            c2: function (domId) {
                var param = getParam('name') || 'all';
                var util = layui.util;
                $.when(
                    $.ajax('http://dc.butterfly.mopaasapp.com/jd/jdList?state=' + param),
                    $.ajax('http://dc.butterfly.mopaasapp.com/user/listUser')
                ).done(function (jdList, userList) {
                    //用户
                    var userMap = {};
                    userList[0].forEach(function (user) {
                        userMap[user.USER_ID] = user.USER_NAME;
                    });
                    //数据
                    var data = jdList[0].datas[param].map(function (obj) {
                        return {
                            id: obj.id,
                            proName: obj.PROJECT_NAME,
                            stage: obj.PLAN_NAME,
                            taskName: obj.BUSINESS_MATTER_NAME,
                            handlerItems: obj.content || '-',
                            state: (function () {
                                var state = obj.WORK_STATES;
                                if (state === 2) {
                                    return '办结';
                                }
                                if (state === 4) {
                                    return '延期';
                                }
                                //判断未完成时状态
                                return new Date(obj.PLAN_END_DATE).getTime() - new Date().getTime() < 0 ? '滞后' : '正常';
                            })(),
                            lastTime: (function () {
                                var days = lastTime(new Date(), new Date(obj.PLAN_END_DATE));
                                return days + '天';
                            })(),
                            updateTime: (function () {
                                var days = lastTime(new Date(obj.news_at), new Date());
                                if (days > 30) {
                                    return util.toDateString(new Date(obj.news_at), 'yyyy/MM/dd');
                                }
                                return days + '天前';
                            })(),
                            leader: userMap[obj.BRANCH_LEADER],
                            dutyUser: userMap[obj.DUTY_USER],
                            finishTime: util.toDateString(new Date(obj.PLAN_END_DATE), 'yyyy/MM/dd'),
                            isStar: obj.NODE_LEVEL === 1
                        };
                    });
                    renderList(domId, data);
                });
                //列表点击事件
                $('#c2').on('click', '.sy-list', function () {
                    var itemId = $(this).data('item');
                    location.href = '../index5/index.html?itemId=' + itemId;
                });
            }
        };
        //执行
        $.each(fns, function (key, fn) {
            if ($.isFunction(fn)) {
                var opt = fn(key);
                if (opt) {
                    //生成图表
                    var chart = regChart('#' + key);
                    chart.setOption(opt);
                    //保存
                    charts[key] = chart;
                }
            }
        });
    }
    
    //渲染列表
    function renderList(domId, data, fn) {
        var $container = $('#' + domId);
        layui.laytpl($('#news-tpl').html()).render({
            list: data,
            //名称字段对应
            nameMap: {
                proName: '项目名称',
                stage: '项目阶段',
                taskName: '任务名称',
                handlerItems: '待办事项',
                state: '状态',
                lastTime: '剩余时间',
                updateTime: '最新进展',
                leader: '分管领导',
                dutyUser: '责任人',
                finishTime: '计划办结时间'
            },
            //文字对应颜色
            colorMap: {
                '滞后': 'red',
                '延期': 'org',
                '正常': 'green',
                '办结': 'blue'
            }
        }, function (html) {
            //滚屏内容
            var $dom = $container.find('.flow-content');
            $dom.html(html);
            //初始化组件
            $dom.slide({
                mainCell: ".infoList",
                autoPlay: true,
                effect: 'topLoop',
                vis: 20,
                delayTime: 300,
                interTime: 2000,
                easing: "swing",
                opp: false,
                pnLoop: true,
                mouseOverStop: false
            });
        });
    }
    
    //计算时间差值
    function lastTime(beginTime, endTime) {
        var mills = endTime.getTime() - beginTime.getTime();
        var days = mills / (1000 * 60 * 60 * 24);
        return Math.floor(days);
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

/**
 * 注册图表
 */
function regChart(domSel) {
    var dom = $(domSel)[0];
    var chart = echarts.getInstanceByDom(dom);
    if (chart) {
        chart.dispose();
    }
    chart = echarts.init(dom, 'dark');
    return chart;
}

//随即数组
function getRandomArr(num, begin, end) {
    var arr = [];
    for (var i = 0; i < num; i++) {
        arr.push(getRandomValue(begin, end));
    }
    return arr;
}

//随机数
function getRandomValue(begin, end) {
    begin = begin || 0 , end = end || 100;
    return Math.round(Math.random() * (end - begin) + begin);
}
