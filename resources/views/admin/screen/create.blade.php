@extends('admin::index')
@section('content')
    @include('vendor.ueditor.assets')
    <style>
        .col-lg-10 {
            padding-bottom: 70px;
        }
        .format-image {
            padding:30px;
        }
    </style>
    <div class="box">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="format-image group">
                    <h2>新建报告</h2>
                    {!! Form::open(['url'=>'/admin/auth/article/store']) !!}
                    <div class="form-group">
                        {!! Form::label('title','标题:') !!}
                        {!! Form::text('title',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content','正文:') !!}
                        <script id="container" name="content" style="height:300px;" type="text/plain"></script>
                    </div>
                    <div class="form-group">
                        {!! Form::label('published_at','发布日期') !!}
                        {!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tag_list','选择标签') !!}
                        {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('创建报告',['class'=>'btn btn-success form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </article>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $(".js-example-basic-multiple").select2({
                placeholder: "添加标签"
            });
        });
    </script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',
            {
                toolbars: [
                    ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'insertimage', 'fullscreen']
                ],
                elementPathEnabled: false,
                enableContextMenu: false,
                autoClearEmptyNode: true,
                wordCount: false,
                imagePopup: false,
                autotypeset: {indent: true, imageBlockLine: 'center'}
            }
        );
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>
@endsection
