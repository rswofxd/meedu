<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$user ? $user['nick_name'].' - ' : ''}}{{$title ?? 'MeEdu'}}</title>
    <link href="{{asset('/h5/css/weui.min.css')}}" rel="stylesheet">
    <link href="{{asset('/h5/css/h5.css')}}" rel="stylesheet">
    <style>
        body {
            background-color: #ededed;
        }
    </style>
    <script src="https://cdn.staticfile.org/zepto/1.2.0/zepto.min.js"></script>
    @yield('css')
</head>
<body>

@yield('content')

<div class="weui-flex">
    <div class="weui-flex__item footer">
        <div class="weui-footer">
            <p class="weui-footer__text">Copyright © 2019 MeEdu</p>
        </div>
    </div>
</div>

@if(get_first_flash('warning') || get_first_flash('error'))
    <div class="weui-half-screen-dialog_show" id="errorDialog">
        <div class="weui-mask error-dialog-mask"></div>
        <div id="js_dialog_1" class="weui-half-screen-dialog">
            <div class="weui-half-screen-dialog__hd">
                <div class="weui-half-screen-dialog__hd__side">
                    <button class="weui-icon-btn weui-icon-btn_close">关闭</button>
                </div>
                <div class="weui-half-screen-dialog__hd__main">
                    <strong class="weui-half-screen-dialog__title">错误</strong>
                </div>
            </div>
            <div class="weui-half-screen-dialog__bd">
                <br><br>
                <p>{{get_first_flash('warning')}}{{get_first_flash('error')}}</p>
                <br><br>
            </div>
        </div>
    </div>
@endif

<script type="text/javascript">
    $(function () {
        $('.error-dialog-mask').click(function () {
            $('#errorDialog').hide(200);
        });
        $('#errorDialog .weui-icon-btn_close').click(function () {
            $('#errorDialog').hide(200);
        });
    });
</script>
<div style="display:none">{!! config('meedu.system.js') !!}</div>
@yield('js')
</body>
</html>