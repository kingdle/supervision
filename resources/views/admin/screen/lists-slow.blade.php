<style>
    #scrollDiv ul {
        padding-left: 0px;
    }
</style>
<div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i class="fa fa-flag" style="color: #c87a29;margin-right: 10px"></i>进展缓慢</h5>
                <div class="ibox-tools">
                    {{ $slows->count() }} 项
                </div>
            </div>
            <div class="ibox-content">
                <div style="overflow:hidden;height: 600px;">
                    <div id="scrollDiv" class="feed-activity-list">
                        <ul style="padding-left: 0px">
                            @foreach($slows as $article)
                                @if($article->WORK_STATES !=2)
                                    <li class="feed-element">
                                        @if($article->images)
                                            <a href="/admin/auth/screen/{{ $article->id }}" class="pull-left">
                                                <img alt="image" class="img-circle"
                                                     src="/uploads/{{ $article->images[0] }}">
                                            </a>
                                        @endif
                                        <div class="media-body ">
                                            <small class="pull-right">{{ $article->updated_at->diffForHumans() }}</small>
                                            <a href="/admin/posts/{{ $article->id }}/edit">
                                                <strong>
                                                    {{ $article->PROJECT_NAME }}
                                                    -{{ $article->PLAN_NAME }}
                                                    -{{ $article->BUSINESS_MATTER_NAME }}
                                                </strong>
                                            </a>
                                            @if($article->NODE_LEVEL == '1')
                                                <i class='fa fa-star' style='color:#ff8913'></i>
                                            @endif
                                            @if($article->NODE_LEVEL == '2')
                                                <i class='fa fa-star' style='color:#ff8913'></i>
                                                <i class='fa fa-star' style='color:#ff8913'></i>
                                            @endif
                                            @if($article->NODE_LEVEL == '3')
                                                <i class='fa fa-star' style='color:#ff8913'></i>
                                                <i class='fa fa-star' style='color:#ff8913'></i>
                                                <i class='fa fa-star' style='color:#ff8913'></i>
                                            @endif
                                            <small class="text-muted">任务号：</small>{{ $article->id }}
                                            <br>
                                            <span style="display:none">
                                            @foreach($users as $user)
                                                    @if($user->USER_ID == $article->BRANCH_LEADER)
                                                        {{ $BRANCH_LEADER=$user->USER_NAME }}
                                                    @endif
                                                    @if($user->USER_ID == $article->DUTY_USER)
                                                        {{ $DUTY_USER=$user->USER_NAME }}
                                                    @endif
                                                    @if($user->USER_ID == $article->UNDER_TAKE_USER)
                                                        {{ $UNDER_TAKE_USER=$user->USER_NAME }}
                                                    @endif
                                                @endforeach
                                            </span>
                                            <small class="text-muted">分管领导：</small>
                                            <strong>{{ $BRANCH_LEADER }}</strong>
                                            <small class="text-muted">责任人：</small>
                                            <strong>{{ $DUTY_USER }}</strong>
                                            <small class="text-muted">承办人：</small>
                                            <strong>{{ $UNDER_TAKE_USER }}</strong>
                                            <small class="text-muted">承办部门：</small>
                                            @foreach($depts as $dept)
                                                @if($dept->DEPT_ID == $article->DUTY_DEPT)
                                                    {{ $dept->DEPT_NAME }}
                                                @endif
                                            @endforeach
                                            <small class="text-muted">开始日期：</small>
                                            {{ $article->PLAN_BEGIN_DATE }}
                                            <small class="text-muted">计划完成日期：</small>
                                            <strong>{{ $article->PLAN_END_DATE }}</strong>
                                            @if($article->PRO_PROGRESS != '')
                                                <div class="well">
                                                    {{ $article->PRO_PROGRESS }}
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //滚动插件
    (function ($) {
        $.fn.extend({
            Scroll: function (opt, callback) {
                //参数初始化
                if (!opt) var opt = {};
                var _this = this.eq(0).find("ul:first");
                var lineH = _this.find("li:first").height(), //获取行高
                    line = opt.line ? parseInt(opt.line, 10) : parseInt(this.height() / lineH, 10), //每次滚动的行数，默认为一屏，即父容器高度
                    speed = opt.speed ? parseInt(opt.speed, 10) : 500, //卷动速度，数值越大，速度越慢（毫秒）
                    timer = opt.timer ? parseInt(opt.timer, 20) : 3000; //滚动的时间间隔（毫秒）
                if (line == 0) line = 1;
                var upHeight = 0 - line * lineH;
                //滚动函数
                scrollUp = function () {
                    _this.animate({
                        marginTop: upHeight
                    }, speed, function () {
                        for (i = 1; i <= line; i++) {
                            _this.find("li:first").appendTo(_this);
                        }
                        _this.css({marginTop: 0});
                    });
                }
                //鼠标事件绑定
                _this.hover(function () {
                    clearInterval(timerID);
                }, function () {
                    timerID = setInterval("scrollUp()", timer);
                }).mouseout();
            }
        })
    })(jQuery);

    $(document).ready(function () {
        $("#scrollDiv").Scroll({line: 1, speed: 200, timer: 1000});
    });
</script>
