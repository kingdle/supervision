<style>
    .content-header {
        position: relative;
        padding: 15px 15px 0 15px;
        text-align: center;
    }
    .activity-list {
        font-size: 16px;
    }
    .activity-list strong{
        font-size: 26px;
    }
    .activity-list svg {
        margin-left: 10px;
    }
    .activity-list i {
        font-size: 22px;
        margin-left: 10px;
    }
    .top {
        min-height: 30px;
    }
</style>
<script>
    $(document).ready(function () {
        setInterval("startRequest()",7200000);
//setInterval这个函数会根据后面定义的1000既每隔1秒执行一次前面那个函数
    });
    function startRequest()
    {
        location.reload();
    }
</script>
<div class="row animated fadeInRight" id="topdata">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="top">
                    <div class="activity-list">
                        <div class="col-md-6">
                            <svg class="peity" height="16" width="32">
                                <rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3"
                                      height="8.88888888888889"></rect>
                                <rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3"
                                      height="5.333333333333333"></rect>
                                <rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect>
                                <rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3"
                                      height="10.666666666666666"></rect>
                                <rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3"
                                      height="8.88888888888889"></rect>
                                <rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect>
                                <rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3"
                                      height="12.444444444444443"></rect>
                                <rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3"
                                      height="5.333333333333333"></rect>
                                <rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3"
                                      height="8.88888888888889"></rect>
                                <rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3"
                                      height="3.5555555555555554"></rect>
                            </svg>
                            <span>任务总数：</span><strong>{{ $lists->count() }}</strong>项
                            <svg class="peity" height="16" width="32">
                                <polygon fill="#1ab394"
                                         points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon>
                                <polyline fill="transparent"
                                          points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666"
                                          stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline>
                            </svg>
                            <span>办理完成：</span><strong>{{ $finish->count() }}</strong>项
                        </div>
                        <div class="col-md-6">
                            <i class="fa fa-flag" style="color: #259c73;"></i>
                            <span class="">进展正常：</span>
                            <strong style="color: #259c73;">
                                {{ $lists->count() - $finish->count() - $slows->count() - $lags->count() }}
                            </strong>项
                            <i class="fa fa-flag" style="color: #c87a29;"></i>
                            <span class="">进展缓慢：</span><strong style="color: #c87a29;">{{ $slows->count() }}</strong>项
                            <i class="fa fa-flag" style="color: #b33309;"></i>
                            <span class="">进展滞后：</span><strong style="color: #b33309;">{{ $lags->count() }}</strong>项
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
