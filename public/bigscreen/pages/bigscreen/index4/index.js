/**
 * Created with IntelliJ IDEA.
 * Description: 图表
 * User: wxl
 * Date: 2018-01-28
 * Time: 21:52
 */
$(function () {
    //获取数据
    $.when(
        //工作整体进展
        $.ajax('http://dc.butterfly.mopaasapp.com/jd/workChart'),
        //重点项目
        $.ajax('http://dc.butterfly.mopaasapp.com/xm/getTuiXmTj'),
        //重点任务
        $.ajax('http://dc.butterfly.mopaasapp.com/jd/workChart?nodeLevel=2')
    ).then(function (res1, res2, res3) {
        var data = {
            c1: res1[0],
            c2: res2[0],
            c3: res3[0]
        };
        var charts = initCharts(data);
        //注册点击事件
        var chart1 = charts.c1;
        chart1.on('click', function (params) {
            var name = params.name;
            var nameMap = {
                '办结': 'finish',
                '滞后': 'lags',
                '延期': 'slowly',
                '正常': 'normal'
            };
            //根据内容跳转
            location.href = '../index2/index.html?name=' + nameMap[name];
        });
        //列表点击事件
        $('#c5').on('click', '.sy-list', function () {
            var itemId = $(this).data('item');
            location.href = '../index5/index.html?itemId=' + itemId;
        });
    });
    
    //初始化图表
    function initCharts(chartDatas) {
        // 图表渲染函数
        var charts = {};
        //图表生成函数
        var fns = {
            //项目总览
            c1: function (domId) {//饼图
                var curData = chartDatas.c1;
                var scaleData = [
                    {
                        'name': '办结',
                        'value': curData.finish
                    },
                    {
                        'name': '正常',
                        'value': curData.normal
                    },
                    {
                        'name': '滞后',
                        'value': curData.lags
                    },
                    {
                        'name': '延期',
                        'value': curData.slowly
                    }
                ];
                //间隔数字
                var center = ['60%', '60%'];
                var tasks = curData.finish + curData.normal + curData.lags + curData.slowly;
                var option = {
                    title: {
                        text: '工作任务:' + tasks + '项\n\n延期任务:' + curData.slowly + '项\n\n{warn|滞后任务:' + curData.lags + '项}',
                        left: 20,
                        top: '35%',
                        textStyle: {
                            fontWeight: '200',
                            fontSize: 16,
                            rich: {
                                warn: {
                                    color: '#ed3f3f',
                                    fontSize: 18,
                                    fontWeight: 'bolder'
                                }
                            }
                        }
                    },
                    series: [
                        {
                            name: '项目总数',
                            type: 'pie',
                            radius: ['40%', '60%'],
                            center: center,
                            color: [
                                '#007aff',//办结
                                '#24d477',//正常
                                '#ed3f3f',//滞后
                                '#ff9000'//延期
                            ],
                            data: scaleData,
                            label: {
                                normal: {
                                    fontSize: 16,
                                    formatter: '{b}:{c}'
                                },
                                emphasis: {
                                    fontWeight: '300',
                                    fontSize: 18
                                }
                            }
                        },
                        {
                            name: '进度',
                            type: 'liquidFill',
                            data: (function () {
                                var a = curData.finish, b = curData.all;
                                if (b === 0) {
                                    return [0];
                                }
                                return [(a / b).toFixed(2)];
                            })(),
                            radius: '45%',
                            center: center,
                            outline: {
                                show: false
                            },
                            backgroundStyle: {
                                color: '#0e2a43'
                            },
                            color: ['#cf3b5a'],
                            label: {
                                color: '#fff',
                                formatter: function (param) {
                                    return param.seriesName + ':' + param.value * 100 + '%';
                                },
                                fontSize: 18
                            }
                        }
                    ]
                };
                return option;
            },
            c2: function (domId) {//饼图
                var curData = chartDatas.c2;
                var scaleData = [
                    {
                        'name': '正常项目',
                        'value': curData.all-curData.zhihou
                    },
                    // {
                    //     'name': '正常',
                    //     'value': curData.zhengchang
                    // },
                    {
                        'name': '滞后项目',
                        'value': curData.zhihou
                    },
                    // {
                    //     'name': '延期',
                    //     'value': curData.yanqi
                    // }
                ];
                //间隔数字
                var center = ['60%', '60%'];
                var option = {
                    title: {
                        text: '项目数:' + curData.all + '项\n\n{warn|滞后项目数:' + curData.zhihou + '项}',
                        left: 20,
                        top: '40%',
                        textStyle: {
                            fontWeight: '200',
                            fontSize: 16,
                            rich: {
                                warn: {
                                    color: '#ed3f3f',
                                    fontSize: 18,
                                    fontWeight: 'bolder'
                                }
                            }
                        }
                    },
                    series: [
                        {
                            name: '项目总数',
                            type: 'pie',
                            radius: ['45%', '55%'],
                            center: center,
                            color: [
                                '#007aff',//办结
                                // '#24d477',//正常
                                '#ed3f3f',//滞后
                                // '#ff9000'//延期
                            ],
                            data: scaleData,
                            label: {
                                normal: {
                                    fontSize: 16,
                                    formatter: '{b}:{c}'
                                },
                                emphasis: {
                                    fontWeight: '300',
                                    fontSize: 18
                                }
                            }
                        },
                        {
                            name: '滞后',
                            type: 'liquidFill',
                            data: (function () {
                                var a = curData.zhihou, b = curData.all;
                                if (b === 0) {
                                    return [0];
                                }
                                return [(a / b).toFixed(2)];
                            })(),
                            radius: '45%',
                            center: center,
                            outline: {
                                show: false
                            },
                            backgroundStyle: {
                                color: '#0e2a43'
                            },
                            color: ['#cf3b5a'],
                            label: {
                                color: '#fff',
                                formatter: function (param) {
                                    return param.seriesName + ':' + param.value * 100 + '%';
                                },
                                fontSize: 18
                            }
                        }
                    ]
                };
                return option;
            },
            c3: function (domId) {//饼图
                var curData = chartDatas.c3;
                var scaleData = [
                    {
                        'name': '正常任务',
                        'value': curData.all-curData.lags-curData.slowly
                    },
                    // {
                    //     'name': '正常',
                    //     'value': curData.normal
                    // },
                    {
                        'name': '滞后任务',
                        'value': curData.lags
                    },
                    {
                        'name': '延期任务',
                        'value': curData.slowly
                    }
                ];
                //间隔数字
                var center = ['60%', '60%'];
                var tasks = curData.finish + curData.normal + curData.lags + curData.slowly;
                var option = {
                    title: {
                        text: '正常任务:' + curData.all + '个\n\n延期任务:' + curData.slowly + '项\n\n{warn|滞后任务:' + curData.lags + '项}',
                        left: 20,
                        top: '35%',
                        textStyle: {
                            fontWeight: '200',
                            fontSize: 16,
                            rich: {
                                warn: {
                                    color: '#ed3f3f',
                                    fontSize: 18,
                                    fontWeight: 'bolder'
                                }
                            }
                        }
                    },
                    series: [
                        {
                            name: '项目总数',
                            type: 'pie',
                            radius: ['50%', '45%'],
                            center: center,
                            color: [
                                '#007aff',//办结
                                // '#24d477',//正常
                                '#ed3f3f',//滞后
                                '#ff9000'//延期
                            ],
                            data: scaleData,
                            label: {
                                normal: {
                                    fontSize: 16,
                                    formatter: '{b}:{c}'
                                },
                                emphasis: {
                                    fontWeight: '300',
                                    fontSize: 18
                                }
                            }
                        },
                        {
                            name: '滞后',
                            type: 'liquidFill',
                            data: (function () {
                                var a = curData.lags, b = curData.all;
                                if (b === 0) {
                                    return [0];
                                }
                                return [(a / b).toFixed(2)];
                            })(),
                            radius: '45%',
                            center: center,
                            outline: {
                                show: false
                            },
                            backgroundStyle: {
                                color: '#0e2a43'
                            },
                            color: ['#cf3b5a'],
                            label: {
                                color: '#fff',
                                formatter: function (param) {
                                    return param.seriesName + ':' + param.value * 100 + '%';
                                },
                                fontSize: 18
                            }
                        }
                    ]
                };
                return option;
            },
            c4: function (domId) {
                var inmap = new inMap.Map({
                    id: domId,
                    skin: "Blueness",
                    center: [120.093832, 35.901597],
                    zoom: {
                        value: 14,
                        show: true,
                        max: 18,
                        min: 5
                    }
                });
                //散点
                $.ajax({
                    url: 'data/mapData.json'
                }).done(function (mapData) {
                    var overlay = new inMap.DotOverlay({
                        style: {
                            normal: {
                                backgroundColor: "#ee4340", // 填充颜色
                                shadowColor: "rgba(255, 255, 255, 1)", // 投影颜色
                                shadowBlur: 35, // 投影模糊级数
                                globalCompositeOperation: "lighter", // 颜色叠加方式
                                size: 5 // 半径
                            }
                        },
                        data: mapData
                    });
                    inmap.add(overlay);
                });
            },
            c5: function (domId) {
                var util = layui.util;
                $.when(
                    $.ajax('http://dc.butterfly.mopaasapp.com/jd/jdList'),
                    $.ajax('http://dc.butterfly.mopaasapp.com/user/listUser')
                ).done(function (jdList, userList) {
                    //用户
                    var userMap = {};
                    userList[0].forEach(function (user) {
                        userMap[user.USER_ID] = user.USER_NAME;
                    });
                    //数据
                    var data = jdList[0].datas.all.map(function (obj) {
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
        return charts;
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
    
    /**
     * 初始化内容
     */
    function initScroll(domId, data, fn) {
        //添加dom元素
        var idSel = '#' + domId;
        var $container = $(idSel);
        $container.css('position', 'relative');
        //控制元素
        var controlStr =
            '<div class="flow-control">' +
            //暂停
            '<i class="layui-icon flow-control-pause" title="暂停">&#xe651;</i>&nbsp;' +
            //位置下移
            '<i class="layui-icon flow-control-next" title="位置下移">&#xe61a;</i>' +
            //位置上移
            '<i class="layui-icon flow-control-pre" title="位置上移">&#xe619;</i>' +
            '</div>';
        $container.append(controlStr);
        //标题
        // var titleStr =
        //     '<div class="flow-title">' +
        //     '<div class="flow-name">项目名称</div>' +
        //     '<div class="flow-state">状态</div>' +
        //     '<div class="flow-time">耗时</div>' +
        //     '</div>';
        // $container.append(titleStr);
        //滚屏
        $container.append('<div class="flow-content"></div>');
        //选中状态logo
        $container.append('<i class="layui-icon flow-selected" data-sel="0" data-li="0">&#xe65c;</i>');
        
        //渲染内容
        layui.laytpl($('#news-tpl').html()).render({
            list: data,
            state: {
                '进行': 'jx',
                '待办': 'db'
            },
            task: {
                'zc': '正常',
                'yq': '延期',
                'zh': '滞后',
                'jx_yq': '延期',
                'jx_zc': '正常'
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
                vis: 8,
                delayTime: 300,
                interTime: 5000,
                easing: "swing",
                opp: false,
                pnLoop: true,
                mouseOverStop: false,
                playStateCell: idSel + ' .flow-control-pause',
                startFun: function (liIndex, count) {
                    $container.find('.flow-selected').data('li', liIndex);
                    //执行动作
                    doRemove();
                }
            });
            //暂停事件
            $container.find('.flow-control-pause').click(function () {
                var $btn = $(this);
                var isPause = $btn.hasClass('pauseState');
                if (isPause) {//暂停
                    $btn.html('&#xe652;');
                } else {
                    $btn.html('&#xe651;');
                }
            });
            //下移事件
            $container.find('.flow-control-next').click(function () {
                //位置移动
                var $sel = $container.find('.flow-selected');
                var selIndex = $sel.data('sel');//当前定位第几个
                if (selIndex >= 7) {
                    layui.layer.msg('不可再下移', {icon: 4});
                } else {
                    $sel.data('sel', selIndex + 1);//位置+1
                    //移动
                    var top = $sel.position().top;
                    $sel.css('top', top + 35);
                    //执行
                    doRemove();
                }
            });
            //上移事件
            $container.find('.flow-control-pre').click(function () {
                //位置移动
                var $sel = $container.find('.flow-selected');
                var selIndex = $sel.data('sel');//当前定位第几个
                if (selIndex <= 0) {
                    layui.layer.msg('不可再上移', {icon: 4});
                } else {
                    $sel.data('sel', selIndex - 1);//位置+1
                    //移动
                    var top = $sel.position().top;
                    $sel.css('top', top - 35);
                    //执行
                    doRemove();
                }
            });
            
            //移动
            function doRemove() {
                var $sel = $container.find('.flow-selected');
                var num = $sel.data('sel') + $sel.data('li');
                var curData = data[num % data.length];
                console.log(curData);
                
                //获取数据
                var list;
                if (fn) {
                    list = fn(curData);
                } else {
                    list = [
                        {
                            time: '2017-05-13',
                            img: '../static/img/person.png',
                            name: '承办人',
                            text: '申请办结'
                        }, {
                            time: '2017-04-025',
                            img: '../static/img/person.png',
                            name: '董事长',
                            text: '请于3月15日前协同责任人甲,进行办理.'
                        }, {
                            time: '2017-04-15',
                            img: '../static/img/person.png',
                            name: '督办人员',
                            text: '请求领导批示'
                        }, {
                            time: '2017-04-07',
                            img: '../static/img/person.png',
                            name: '分管领导',
                            text: '同意问题'
                        }, {
                            time: '2017-04-07',
                            img: '../static/img/person.png',
                            name: '责任人',
                            text: '同意问题'
                        }, {
                            time: '2017-04-06',
                            img: '../static/img/person.png',
                            name: '承办人',
                            text: '发起问题'
                        }, {
                            time: '2017-04-05',
                            img: '../static/img/person.png',
                            name: '承办人',
                            text: '上报进度信息'
                        }
                    ];
                }
                //对话框
                var $dialogContainer = $('#' + domId + '-dialog');
                //设置标题
                $dialogContainer.prev().html(curData.name);
                //渲染对话
                layui.laytpl($('#dialog-tpl').html()).render({
                    list: list
                }, function (dialogStr) {
                    $dialogContainer.html(dialogStr);
                });
            }
        });
    }
    
});

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
