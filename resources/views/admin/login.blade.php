<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập tài khoản mật khẩu</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{url ('/public/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url ('/public/admin')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url ('/public/admin')}}/css/AdminLTE.css">
    <link rel="stylesheet" href="{{url ('/public/admin')}}/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{url ('/public/admin')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{url ('/public/admin')}}/css/style.css" />


    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script nonce="5a675602-eec1-492c-bf8f-7fc0136e0976">
    (function(w, d) {
        ! function(a, e, t, r) {
            a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {
                deferred: []
            }, a.zaraz.q = [], a.zaraz._f = function(e) {
                return function() {
                    var t = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: t
                    })
                }
            };
            for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
            a.addEventListener("DOMContentLoaded", (() => {
                var t = e.getElementsByTagName(r)[0],
                    z = e.createElement(r),
                    n = e.getElementsByTagName("title")[0];
                for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.x =
                    Math.random(), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a
                    .zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a
                    .location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a
                    .zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a
                    .zarazData.q = []; a.zaraz.q.length;) {
                    const e = a.zaraz.q.shift();
                    a.zarazData.q.push(e)
                }
                z.defer = !0;
                for (const e of [localStorage, sessionStorage]) Object.keys(e).filter((a => a
                    .startsWith("_zaraz_"))).forEach((t => a.zarazData["z_" + t.slice(7)] = JSON
                    .parse(e.getItem(t))));
                z.referrerPolicy = "origin", z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(
                    JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z, t)
            }))
        }(w, d, 0, "script");
    })(window, document);
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html">Form đăng nhập</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập tài khoản mật khẩu</p>
            <form action="" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Nhập email để đăng nhập">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control"
                        placeholder="Nhập password để đăng nhập">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
            </form>
        </div>

    </div>


    <script src="{{url ('/public/admin')}}/js/jquery.min.js"></script>
    <script src="{{url ('/public/admin')}}/js/jquery-ui.js"></script>
    <script src="{{url ('/public/admin')}}/js/bootstrap.min.js"></script>
    <script src="{{url ('/public/admin')}}/js/adminlte.min.js"></script>
    <script src="{{url ('/public/admin')}}/js/dashboard.js"></script>
    <script src="{{url ('/public/admin')}}/tinymce/tinymce.min.js"></script>
    <script src="{{url ('/public/admin')}}/tinymce/config.js"></script>
    <script src="{{url ('/public/admin')}}/js/function.js"></script>

    <!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>