<!DOCTYPE html>
<html lang="en" ng-app="xenon-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Xenon - Boostrap Admin Template</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{url('assets/css/fonts/linecons/css/linecons.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/xenon-core.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/xenon-forms.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/xenon-components.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/xenon-skins.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/custom.css')}}">

    <script src="{{url('assets/js/jquery-1.11.1.min.js')}}"></script>
    <script>
        // รับค่าจาก laravel แล้วให้ controller ของ angular เรียกใช้
        window.username = "{{ $username }}" ;
        window.usertype = "{{ $usertype }}" ;

        var appHelper = {
            // Vars (paths without trailing slash)
            templatesDir: 'app/tpls',
            assetsDir: 'assets',


            // Methods
            urlPath: function(view_name)
            {
                return '/' + view_name ;
            },
            laravelPath: function(view_name)
            {
                return this.templatesDir + '/' + view_name + '.blade.php';
            },

            templatePath: function(view_name)
            {
                return this.templatesDir + '/' + view_name + '.html';
            },

            assetPath: function(file_path)
            {
                return this.assetsDir + '/' + file_path;
            }
        };
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body"  ng-controller="MainCtrl" ng-class="{'settings-pane-open': layoutOptions.settingsPane.isOpen, 'chat-open': layoutOptions.chat.isOpen, 'login-page': isLoginPage && isMainPage == false, 'login-light': isLightLoginPage && isMainPage == false, 'lockscreen-page': isLockscreenPage && isMainPage == false, 'right-sidebar': layoutOptions.sidebar.isRight, 'boxed-container': layoutOptions.container.isBoxed}">


<settings-pane  who="profile"></settings-pane>

<horizontal-menu ng-if="layoutOptions.horizontalMenu.isVisible"></horizontal-menu>

<div class="page-container" ui-view></div>

<!-- Remove this code if you want to disable Loading Overlay in the beginning of document loading -->
<div class="page-loading-overlay">
    <div class="loader-2"></div>
</div>


<!-- Bottom Scripts -->
<script src="{{url('app/js/angular/angular.min.js')}}"></script>
<script src="{{url('app/js/angular-ui/angular-ui-router.min.js')}}"></script>
<script src="{{url('app/js/angular-ui/ui-bootstrap-tpls-0.11.2.min.js')}}"></script>
<script src="{{url('app/js/angular/angular-cookies.min.js')}}"></script>
<script src="{{url('app/js/oc-lazyload/ocLazyLoad.min.js')}}"></script>
<script src="{{url('app/js/angular-fullscreen.js')}}"></script>
<script src="{{url('assets/js/TweenMax.min.js')}}"></script>
<script src="{{url('assets/js/joinable.js')}}"></script>
<script src="{{url('assets/js/resizeable.js')}}"></script>


<!-- App -->
<script src="{{url('app/js/app.js')}}"></script>
<script src="{{url('app/js/controllers.js')}}"></script>
<script src="{{url('app/js/directives.js')}}"></script>
<script src="{{url('app/js/factory.js')}}"></script>
<script src="{{url('app/js/services.js')}}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{url('app/js/xenon-custom.js')}}"></script>

</body>
</html>