<style>
    .ibox {
        clear: both;
        margin-bottom: 25px;
        margin-top: 0;
        padding: 0;
    }

    .ibox-title {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #ffffff;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 2px 0 0;
        color: inherit;
        margin-bottom: 0;
        padding: 15px 15px 7px;
        min-height: 48px;
    }

    .ibox-title h5 {
        display: inline-block;
        font-size: 14px;
        margin: 0 0 7px;
        padding: 0;
        text-overflow: ellipsis;
        float: left;
    }

    .ibox-tools {
        display: block;
        float: none;
        margin-top: 0;
        position: relative;
        padding: 0;
        text-align: right;
    }

    .ibox-tools a {
        cursor: pointer;
        margin-left: 5px;
        color: #c4c4c4;
    }

    .dropdown-menu {
        border: medium none;
        border-radius: 3px;
        box-shadow: 0 0 3px rgba(86, 96, 117, 0.7);
        display: none;
        float: left;
        font-size: 12px;
        left: 0;
        list-style: none outside none;
        padding: 0;
        position: absolute;
        text-shadow: none;
        top: 100%;
        z-index: 1000;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    }

    .dropdown-menu > li > a {
        border-radius: 3px;
        color: inherit;
        line-height: 25px;
        margin: 4px;
        text-align: left;
        font-weight: normal;
    }

    .dropdown-menu > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }

    .ibox-tools a {
        cursor: pointer;
        margin-left: 5px;
        color: #c4c4c4;
    }

    .ibox-content {
        clear: both;
        display: block;

    }

    .ibox-content {
        background-color: #ffffff;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
    }

    .feed-activity-list .feed-element {
        border-bottom: 1px solid #e7eaec;
    }

    .feed-element, .media-body {
        overflow: hidden;
    }

    .feed-element, .feed-element .media {
        margin-top: 15px;
    }

    .feed-element {
        padding-bottom: 15px;
    }

    .feed-element img.img-circle, .dropdown-messages-box img.img-circle {
        width: 38px;
        height: 38px;
    }

    .img-circle {
        border-radius: 50%;
    }

    .img-circle {
        border-radius: 50%;
    }

    .ibox-content img {
        vertical-align: middle;
    }

    .ibox-content img {
        border: 0;
    }

    .feed-element, .media-body {
        overflow: hidden;
        vertical-align: top;
    }

    .feed-element .photos {
        margin: 10px 0;
    }

    .feed-photo {
        max-height: 60px;
        border-radius: 4px;
        overflow: hidden;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .sidebar-panel .feed-element, .media-body, .sidebar-panel p {
        font-size: 12px;
    }

    .media-body {
        width: 10000px;
        padding-left: 20px;
    }

    .media-body, .media-left, .media-right {
        display: table-cell;
        vertical-align: top;
    }

    .text-navy {
        color: #1ab394;
    }

    .pull-right {
        float: right;
    }

    .pull-right {
        float: right !important;
    }

    .small, small {
        font-size: 85%;
    }

    .feed-element .actions {
        margin-top: 10px;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .media-body .well {
        padding: 10px;
        margin-bottom: 0px;
    }

</style>

<div class="row animated fadeInRight">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i class="fa fa-flag" style="color: #b33309; margin-right: 10px"></i>进展滞后</h5>
                <div class="ibox-tools">
                    {{ $lags->count() }} 项
                </div>


            </div>
            <div class="ibox-content">
                <div id="Roll" style="overflow:hidden;height: 600px;">
                    <div id="Roll1" class="feed-activity-list">
                        @foreach($lags as $article)

                                <div class="feed-element">
                                    @if($article->images)
                                        <a href="/admin/auth/screen/{{ $article->id }}" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                 src="/uploads/{{ $article->images[0] }}">
                                        </a>
                                    @endif
                                    <div class="media-body ">
                                        <small class="pull-right">{{ $article->updated_at->diffForHumans()  }}</small>
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
                                        <small class="text-muted">分管领导：</small>
                                        <strong>{{ $users[$article->BRANCH_LEADER] }}</strong>
                                        <small class="text-muted">责任人：</small>
                                        <strong>{{ $users[$article->DUTY_USER] }}</strong>
                                        <small class="text-muted">承办人：</small>
                                        <strong>{{ $users[$article->UNDER_TAKE_USER] }}</strong>
                                        <small class="text-muted">承办部门：</small>
                                        {{ $depts[$article->DUTY_DEPT] }}
                                        <small class="text-muted">开始日期：</small>
                                        {{ $article->PLAN_BEGIN_DATE }}
                                        <small class="text-muted">计划完成日期：</small>
                                        <strong>{{ $article->PLAN_END_DATE }}</strong>
                                        @if($article->PRO_PROGRESS != '')
                                            <div class="well">
                                                {{ $article->PRO_PROGRESS }}
                                            </div>
                                        @endif
                                        @if($article->images)
                                            <div class="photos">
                                                @foreach($article->images as $image)
                                                    <img src="/uploads/{{ $image }}" class="feed-photo" alt="">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <div id="Roll2" class="feed-activity-list">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var speed = 50
    Roll2.innerHTML = Roll1.innerHTML
    function Marquee() {
        if (Roll2.offsetTop - Roll.scrollTop <= 0)
            Roll.scrollTop -= Roll1.offsetHeight
        else {
            Roll.scrollTop++
        }
    }
    var MyMar = setInterval(Marquee, speed)
    Roll.onmouseover = function () {
        clearInterval(MyMar)
    }
    Roll.onmouseout = function () {
        MyMar = setInterval(Marquee, speed)
    }
</script>
