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
                            <span class="text-muted"><i class="fa fa-clock-o"></i> {{ $posts->updated_at->diffForHumans()  }}</span>
                        </div>
                        <div class="post-deco"></div>
                        <div class="article">
                            <p class="post-abstract">
                                <span class="abstract-tit">进展：</span>
                                {{ str_limit(strip_tags($posts->PRO_PROGRESS), $limit = 100, $end = '...') }}
                            </p>

                            <p>{!! $posts->PRO_PROGRESS !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
