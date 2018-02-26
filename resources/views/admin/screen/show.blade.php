@extends('admin::index')
@section('content')
    <style>
        ul li {
            list-style-type: none;
        }

        .ibox-content {
            padding: 20px;
        }

        .article-title {
            text-align: center;
            margin: 30px 0;
        }

        .text-muted {
            color: #888888;
        }

        .article h1 {
            font-size: 48px;
            font-weight: 700;
            color: #2F4050;
        }

        .article p {
            font-size: 16px;
            line-height: 32px;
            text-indent: 2em;
        }

        .article p img {
            width: 80%;
            margin: 0 auto;
            padding: 20px 20px;
        }

        .post-deco {
            background: #039c9e;
            position: relative;
            height: 2px;
            width: 100%;
            margin-bottom: 10px;
        }

        .a-img {
            padding-bottom: 10px;
            text-align: left;
        }

        .a-img img {
            max-width: 130px;
            max-height: 130px;
            display: inline-block;
            max-width: 100%;
            height: auto;
            padding: 4px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        p.post-abstract {
            padding: 20px 30px;
            font-size: 14px;
            font-size: 1.4rem;
            line-height: 24px;
            color: #808080;
            margin: 0 0 20px 0;
            background-color: #f6f6f6;
        }

        p.post-abstract .abstract-tit {
            font-weight: bold;
        }

        .article table tr, .article table td {
            border: 1px solid #959595;
        }
        .tag h5 {
            float: left;
            padding-right: 20px;
        }
        .tag li {
            line-height: 36px;
        }
        .tag li i{
            color: #039c9e;
        }
        .return {
            top: 40px;
        }
        .pic img {
            width: 38px;
            height: 38px;
        }
        .img-circle {
            border-radius: 50%;
        }
        .feed-photo{
            width:200px;
        }
    </style>
    <div class="box">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">
                    <div class="col-md-11 hidden-xs">
                        <div id=""></div>
                    </div>
                    <div class="return col-md-1 hidden-xs">
                        <button class="button button-box"><i class="fa fa-reply"></i></button>
                    </div>
                    <script>
                        $(".col-md-1 button").click(function () {
                            history.go(-1)
                        })
                    </script>
                    <div class="ibox-content">
                        <div class="text-center article-title">
                            <h1>
                                {{ $posts->PROJECT_NAME }}
                                -{{ $posts->PLAN_NAME }}
                                -{{ $posts->BUSINESS_MATTER_NAME }}
                            </h1>
                            <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $posts->updated_at->diffForHumans()  }}</span>更新
                        </div>
                        <div class="post-deco"></div>
                        <div class="article">
                            <small class="text-muted">任务号：</small>{{ $posts->id }}
                            <small class="text-muted">级别：</small>
                            @if($posts->NODE_LEVEL == '1')
                                <i class='fa fa-star' style='color:#ff8913'></i>
                            @endif
                            @if($posts->NODE_LEVEL == '2')
                                <i class='fa fa-star' style='color:#ff8913'></i>
                                <i class='fa fa-star' style='color:#ff8913'></i>
                            @endif
                            @if($posts->NODE_LEVEL == '3')
                                <i class='fa fa-star' style='color:#ff8913'></i>
                                <i class='fa fa-star' style='color:#ff8913'></i>
                                <i class='fa fa-star' style='color:#ff8913'></i>
                            @endif

                            <br>
                            <small class="text-muted">分管领导：</small>
                            <strong>{{ $posts->BRANCH_LEADER }}</strong>
                            <small class="text-muted">责任人：</small>
                            <strong>{{ $posts->DUTY_USER }}</strong>
                            <small class="text-muted">承办人：</small>
                            <strong>{{ $posts->UNDER_TAKE_USER }}</strong>
                            <small class="text-muted">承办部门：</small>
                            {{ $posts->DUTY_DEPT }}
                            <small class="text-muted">开始日期：</small>
                            {{ $posts->PLAN_BEGIN_DATE }}
                            <small class="text-muted">计划完成日期：</small>
                            <strong>{{ $posts->PLAN_END_DATE }}</strong>
                            <p></p>
                            @if($posts->PRO_PROGRESS != '')
                                <div class="well">
                                    最新进展：{{ $posts->PRO_PROGRESS }}
                                </div>
                            @endif
                            <p>现场图片：</p>

                            @if($posts->images)
                                <div class="photos">
                                    @foreach($posts->images as $image)
                                        <img src="/uploads/{{ $image }}" class="feed-photo" alt="">
                                    @endforeach
                                </div>
                            @endif

                        </div>
                        <div class="ibox-content">
                            <p>历次提报进展：（实例数据）</p>


                        <table class="TableBlock" style="margin-top:25px;margin-bottom:25px;border:0px;" width="98%" align="center">
                            <tbody><tr class="TableControl" style="text-align:left">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">土地修编已经完成，土地农转用已完成组卷，目前正在市国土局进行审查。<br><span style="color:#098706">尽快办理完成土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-12-29 14:15:49</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl" style="text-align:right">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">土地修编已经完成，土地农转用已完成组卷，正在对接国土局进行联合会审。<br><span style="color:#098706">尽快办理完成土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-11-28 16:51:43</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl" style="text-align:left">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">土地修编已经完成，土地农转用已完成组卷，正在对接国土局进行联合会审。<br><span style="color:#098706">尽快办理完成土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-10-09 09:53:37</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>


                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">土地修编已经完成，土地农转用已完成组卷，正在对接国土局进行联合会审。<br><span style="color:#098706">办理完成土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-10-09 09:45:27</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">土地修编已经完成，土地农转用已完成组卷，正在对接国土局进行联合会审。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，办理土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-10-09 09:43:50</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">土地修编已经上报省国土厅，正在积极对接国土部门进行批复。同时正在办理土地农转用报批组卷签字盖章工作。土地修编已经完成，土地农转用已完成组卷，正在对接国土局进行联合会审。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，办理土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-10-09 09:35:02</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">土地修编已经上报省国土厅，正在积极对接国土部门进行批复。同时正在办理土地农转用报批组卷签字盖章工作。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，办理土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-09-06 10:01:30</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">土地修编已经上报省国土厅，正在积极对接国土部门进行批复。同时正在办理土地农转用报批组卷签字盖章工作。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，办理土地农转用手续。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-08-22 10:33:12</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编，土地修编已经上报省国土厅，正在积极对接国土部门。土地修编完成后，待区政府下达农转用指标后方能进行土地农转用上报工作。已延期。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-08-01 10:54:37</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编，土地修编已经上报省国土厅，正在积极对接国土部门。土地修编完成后，待区政府下达农转用指标后方能进行土地农转用上报工作。已延期。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-06-30 08:19:47</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编，土地修编已经上报省国土厅，正在积极对接国土部门。土地修编完成后，待区政府下达农转用指标后方能进行土地农转用上报工作。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-06-23 12:45:36</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编，土地修编已经上报省国土厅，正在积极对接国土部门。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-06-16 16:12:40</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编，土地修编已经上报省国土厅，正在积极对接国土部门。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-06-09 11:37:14</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编，土地修编已经上报省国土厅，正在积极对接国土部门。<br><span style="color:#098706">继续对接区国土局尽快完成土地修编，下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-06-03 07:20:27</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编。<br><span style="color:#098706">正在对接区国土局下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-05-27 15:12:01</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">正在办理土地修编。<br><span style="color:#098706">正在对接区国土局下达土地报批指标。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-05-27 13:45:38</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-05-19 13:36:05</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-05-12 08:34:05</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-05-05 08:40:01</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-04-28 08:35:54</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-04-21 12:15:34</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-04-14 13:41:15</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-04-07 16:31:55</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-03-31 11:36:39</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-03-24 09:00:55</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-03-17 11:26:26</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-03-10 11:14:00</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-03-03 08:34:50</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-02-26 09:45:06</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-02-20 08:59:22</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-02-18 09:02:34</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-02-13 10:19:30</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-02-10 15:07:49</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-02-07 16:02:48</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-02-03 11:30:03</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-01-25 11:43:36</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-01-23 09:24:10</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-01-20 12:29:56</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-01-16 08:53:00</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-01-13 14:42:26</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-01-09 10:11:54</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2017-01-06 11:10:33</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2017-01-04 08:56:40</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-12-30 13:25:30</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-12-26 09:22:23</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已经完成土地招拍挂，已办结。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-12-23 16:37:18</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-12-19 08:58:57</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-12-16 13:43:13</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-12-12 09:00:44</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-12-09 10:16:29</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-12-05 09:04:09</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-12-02 09:10:02</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-11-28 09:32:32</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-11-25 14:41:20</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-11-21 10:08:54</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-11-18 13:35:34</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-11-14 09:34:34</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-11-11 15:26:01</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-11-07 08:45:44</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，已完成相关社区签字盖章工作。<br><span style="color:#098706"></span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-11-04 10:12:36</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，协调灵山卫街道办事处和蔡家庄社区进行签字盖章。<br><span style="color:#098706">下一步继续与街道办事处对接，完成签字盖章工作。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-10-31 09:04:19</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，协调灵山卫街道办事处和蔡家庄社区进行签字盖章。<br><span style="color:#098706">下一步继续与街道办事处对接，完成签字盖章工作。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-10-28 11:29:57</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园符合供地条件8宗地已完成土地招拍挂，并已签订出让合同，缴清出让金和相关税费。目前正在进行地籍调查，协调灵山卫街道办事处和蔡家庄社区进行签字盖章。<br><span style="color:#098706">下一步继续与街道办事处对接，完成签字盖章工作。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-10-26 12:52:44</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-10-24 09:22:48</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-10-21 14:46:49</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-10-17 08:48:50</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-10-14 11:39:57</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-09-30 13:15:04</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">管理员</span>&nbsp;<span style="color:red;">(督办管理员)</span>&nbsp;2016-09-27 14:07:34</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-09-26 09:22:12</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-09-23 14:08:39</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-09-19 09:43:15</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-09-18 12:32:22</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-09-12 09:50:32</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园已完成土地报批组卷，正在对接灵山卫街道办事处、相关社区签字盖章。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-09-09 10:20:19</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-09-05 09:14:04</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-09-02 14:31:35</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-08-29 09:18:31</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-08-26 11:03:29</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-08-22 09:25:18</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-08-19 12:45:42</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-08-15 08:50:33</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">创智产业园剩余土地正在办理土地报批组卷工作。</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-08-12 12:32:22</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-08-08 08:16:18</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同，并缴清出让金，正在进行相关税费核定缴纳工作。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-08-05 11:17:27</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-08-01 09:32:45</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-07-29 15:33:58</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: right;">
                                <td style="width:40px;border:0px;"></td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王文君</span>&nbsp;<span style="color:red;">(责任人)</span>&nbsp;2016-07-25 09:34:39</td>
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                            </tr>

                            <tr class="TableControl overflow" style="text-align: left;">
                                <td style="width:40px;border:0px;"> @if($posts->images)
                            <a href="/admin/auth/screen/{{ $posts->id }}" class="pic visible-lg">
                                <img src="/uploads/{{ $posts->images[0] }}" class="img-circle" alt="" width="200">
                            </a>
                            @endif</td>
                                <td style="font-size:16px;border:0px;">创智产业园已具备供地条件8宗地完成土地招拍挂，并已签订出让合同。<br><span style="color:#098706">写写下步计划!</span><br><span style="color:#abd9ea">王涛</span>&nbsp;<span style="color:red;">(承办人)</span>&nbsp;2016-07-25 09:22:47</td>
                                <td style="width:40px;border:0px;"></td>
                            </tr>

                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
