<!DOCTYPE html>
<html lang="en" ng-app="xenon-app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Xenon - Boostrap Admin Template</title>

    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}">
    <script src="{{url('assets/js/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '175384656159057',
                xfbml      : true,
                version    : 'v2.5'
            });
        };

        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            if (response.status === 'connected') {
                $('#fb_accesstoken').val(response.authResponse.accessToken);
                $('#fb_id').val(response.authResponse.userID);
                submitform();
            }
        }
        function checkLoginState() {

            FB.login(function (response) {
                if (response.authResponse != null && response.authResponse != undefined) {
                    FB.getLoginStatus(function (response) {
                        statusChangeCallback(response);
                    });
                }
            }, {scope: 'public_profile,email,manage_pages,read_page_mailboxes,publish_pages,read_insights'});

        }
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function submitform() {
            if ($('#fb_accesstoken').val()!="" && $('#fb_id').val()!="" ){
               $('#fb_from').submit();
            }
        }

    </script>
    <style>
        .main {display:table; margin: 0 auto;height: 100%;}
        .content {display:table-cell;vertical-align:middle;}
        .media:hover{ background: #CCC; }
        .media-body {text-align: left;}
    </style>
</head>
<body  >
    <div class="main" >
        <div class="content" >
            <div class="container text-center ">
                <div class="row ">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Please Sign In </h3>
                            </div>

                            <div class="panel-body">
                                <form role="form" method="POST" id="fb_from" action="{{ url('login/processfb') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="fb_accesstoken" id="fb_accesstoken" >
                                    <input type="hidden" name="fb_id" id="fb_id">
                                    <input type="hidden" name="fb_email" id="fb_email">

                                    <fieldset>
                                        <div class="form-group">
                                            <button class="btn btn-primary" onclick="checkLoginState()">Login with facebook</button>

                                            {{--<fb:login-button scope="public_profile,email,manage_pages,read_page_mailboxes,publish_pages,read_insights" onlogin="checkLoginState();">--}}
                                            {{--</fb:login-button>--}}
                                            <div id="status"></div>
                                        </div>
                                        @if($errors->any())

                                            <div class="alert alert-danger">{{$errors->first()}}</div>
                                        @endif
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>




    </div>
</body>
</html>