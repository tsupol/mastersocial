<!DOCTYPE html>
<html lang="th" ng-app="xenon-app">
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
        function fn_selectpage(pageid,pagename,pageaccessToken){

            $('#page_id').val(pageid);
            $('#page_accesstoken').val(pageaccessToken);
            $('#page_name').val(pagename);
            $('#page_from').submit();

            {{--var postData = $("#fb_from").serializeArray();--}}
            {{--postData.push({ name: "page_accessToken", value: pageaccessToken });--}}
            {{--postData.push({ name: "page_id", value: pageid });--}}

            {{--$.ajax({--}}
                {{--url: "{{url('login/createpage')}}",--}}
                {{--type: "post",--}}
                {{--data: postData ,--}}
                {{--async: false,--}}
                {{--jsonp: "callback",--}}
                {{--dataType: "jsonp",--}}
                {{--success: function(result){--}}
                    {{--console.log('ajax',result );--}}
                    {{--total_row = result.total ;--}}
                    {{--var c_total_page = Math.ceil(parseInt(total_row)/6) ;--}}
                    {{--var min_id = result.min_id ;--}}
                    {{--var max_id = result.max_id ;--}}
                    {{--_html_content = "";--}}
                    {{--for (var r in result.data){--}}
                        {{--_html_content += "<div class=\"col-xs-12 col-sm-4\" style=\"margin: 10px 0px; \"> <video width=\"360\" height=\"360\" style=\"width: 100%; height: 100%;\"  preload=\"none\" poster=\""+result.data[r].img_low+"\" ><source src=\""+result.data[r].vid_low+"\" type='video/mp4'></video></div>" ;--}}
                    {{--}--}}
                    {{--if(max_id){--}}
                        {{--console.log('s_page',s_page);--}}
                        {{--$('.mobile-row').html(_html_content).find("video").mediaelementplayer({ hideVideoControlsOnLoad: true, features:['playpause']});--}}

                        {{--$('.pagination-page').html(s_page+" / "+c_total_page);--}}
                        {{--$('#page').val(s_page);--}}

                    {{--}--}}
                    {{--$('#max_id').val(max_id);--}}
                    {{--$('#min_id').val(min_id);--}}
                    {{--$('#totalPage').val(c_total_page);--}}

                    {{--if(window.usedLoading){--}}
                        {{--$('#overlay').delay(3000).fadeOut() ;--}}
                    {{--}--}}

                {{--},--}}
                {{--error: function (request, error) {--}}
                    {{--console.log(arguments);--}}
                    {{--alert(" Can't do because: " + error);--}}
                {{--},--}}
            {{--});--}}
        }

        function submitform() {
            if ($('#fb_accesstoken').val()!="" && $('#fb_id').val()!="" ){
               $('#fb_from').submit();
            }
        }

    </script>
    <style>
        .main {display:table; margin: 0 auto;height: 100%;}
        .content {display:table-cell;vertical-align:middle;}
        .media .pull-right {margin-top:7px;}
        .media-body {text-align: left;}
    </style>
</head>
<body  >
    <div class="main">
        <div class="content">
            <div class="container text-center ">
                <div class="row ">
                    <div class="col-sm-6 col-md-offset-3">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Select Page </h3>
                            </div>

                            <div class="panel-body">
                                <form role="form" method="POST" id="page_from" action="{{ url('login/createpage') }}">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="fb_accesstoken" id="fb_accesstoken" value="{{ $fb_accesstoken }}" >
                                    <input type="hidden" name="fb_id" id="fb_id" value="{{ $fb_id }}"  >
                                    <input type="hidden" name="id" id="id" value="{{ $id }}"  >
                                    <input type="hidden" name="page_accesstoken" id="page_accesstoken" value="" >
                                    <input type="hidden" name="page_id" id="page_id" value="" >
                                    <input type="hidden" name="page_name" id="page_name" value="" >
                                    <fieldset>
                                        @foreach ($fb_data['data'] as $p)

                                            <div class="media"  >
                                                 <span class="pull-right">
                                                    <button type="button" class="btn btn-info" onclick="fn_selectpage('{{ $p['id']  }}','{{ $p['name'] }}','{{ $p['access_token'] }}');"> เข้าใช้งาน </button>
                                                </span>
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="https://graph.facebook.com/{{ $p['id'] }}/picture" alt="...">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ $p['name'] }}</h4>
                                                    {{ $p['category']  }}
                                                </div>

                                            </div>

                                        @endforeach

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

        </div>

    </div>


    <div id="wrapper" >
        <div id="page-wrapper" >

            <!-- /.container-fluid -->
        </div>




    </div>
</body>
</html>