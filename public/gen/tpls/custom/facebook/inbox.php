
<script>
    //    $(function(){

    //    })


</script>

<style >
    #inbox_message .media-heading{
        color: #000000;
        font-weight: bold;
    }


    .media-body span
    {
        display: inline-block;
        max-width: 200px;
        background-color: white;
        padding: 5px;
        border-radius: 4px;
        position: relative;
        border-width: 1px;
        border-style: solid;
        border-color: grey;

    }

    .media-body left
    {
        float: left;
    }

    .media-body span.left:after
    {
        content: "";
        display: inline-block;
        position: absolute;
        left: -8.5px;
        top: 7px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-right: 8px solid white;

    }

    .media-body span.left:before
    {
        content: "";
        display: inline-block;
        position: absolute;
        left: -9px;
        top: 7px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-right: 8px solid black;
    }

    .media-body span.right:after
    {
        content: "";
        display: inline-block;
        position: absolute;
        right: -8px;
        top: 6px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 8px solid #dbedfe;
    }

    .media-body span.right:before
    {
        content: "";
        display: inline-block;
        position: absolute;
        right: -9px;
        top: 6px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 8px solid black;
    }

    .media-body span.right
    {
        float: right;
        background-color: #dbedfe;
    }

    .clear
    {
        clear: both;
    }

</style>

<section id="inbox" style="height: 100%; margin: 0px; " ng-controller="Conversation" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"  ng-if="data" >
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        Status <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li ng-repeat="vs in data.status" style="padding: 5px;" >  <a ng-click="setStatus(vs.id)" >{{ vs.name }}</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-10">

                <div class="form-group">

                    <div class="col-sm-12 input-group" >


                        <input type="text"  class="form-control"  ng-model="cities" semi-tags data-url="api/search/tags" >
                        <span class="input-group-btn">
                            <button class="btn btn-purple" type="button" ng-click="setTag(cities)" >Set Tag</button>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <h3 style="border-top:1px solid #E0E0E0;border-bottom: 1px solid #E0E0E0;padding: 10px;">{{val.sender.name}}</h3>
    <!--<input type="text" class="form-control" placeholder="Search pattern" ng-keypress="keyPress($event)" tabindex="1">-->
    <div class="container-fluid">
        <div class="row" style="overflow: auto;">
            <div class="col-sm-12" ng-repeat="v in val.message | orderBy: 'chat_at':false">

                <div class="media" ng-if="v.fromId!='919082208176684'">
                    <a href="#" class="pull-left">
                        <img class="media-object"  src="{{ 'https://graph.facebook.com/'+val.sender.id+'/picture'}}" alt="..." style="height: 30px;">
                    </a>

                    <div class="media-body" style="float: left; margin-right: 10px;" >

                        <span class="left" style="margin-left:10px;white-space: pre-line;"  ng-if="v.message"  >{{v.message}}</span>
                        <img src="{{ v.attachments }}"  ng-if="v.attachments"  >
                        <img src="{{ v.shares }}"  ng-if="v.shares" style="width:50px;height: auto;" >

                    </div>
                    <p class="r" >
                    <p class="r" style="bottom: 0px;font-size: 8px; ">{{v.chat_at}}</p>
                    </p>
                </div>



                <div class="media"  ng-if="v.fromId=='919082208176684'">

                    <div class="media-body pull-right" >
                        <span class="right" ng-if="v.message" style="margin-right: 10px;" >  <?php
                            echo nl2br("One line.\nAnother line.");
                            ?>  {{v.message}}</span>
                        <img src="{{ v.attachments }}"  ng-if="v.attachments"  >
                        <img src="{{ v.shares }}"  ng-if="v.shares" style="width:50px;height: auto;" >

                    </div>
                    <p class="r pull-right"  >
                        <p class="r pull-right" style="font-size: 8px;">{{v.chat_at}}</p>
                    </p>
                </div>



            </div>

            <div class="col-sm-12" style="margin-top:50px; "  >
                <div class="input-group">
                    <textarea class="form-control" ng-model="replyinbox" placeholder="write a reply..."
                              rows="5" cols="50"
                        >

                    </textarea>

                    <span class="input-group-btn">
                         <button class="btn btn-default" type="button" ng-click="openModal('modal-5', 'lg');" >Save Reply</button>
                        <button class="btn btn-default" type="button" ng-click="replyMessage()">Send!</button>
                    </span>
                </div><!-- /input-group -->
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div id="" >

        </div>
    </div>

</section>

<script type="text/ng-template" id="modal-5">
    <div class="modal-header">
        <button type="button" class="close" ng-click="currentModal.close();" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal Content is Responsive</h4>
    </div>

    <div class="modal-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="input-group input-group-minimal">
                    <input type="text" class="form-control" placeholder="Search pattern" ng-model="searchPattern" ng-keyup="keyPress($event,searchPattern)" >
                    <span class="input-group-btn">
                            <button class="btn btn-purple" type="button"  ng-click="test()" >Set Tag</button>
                        </span>

                </div>

            </div>


        </div>

        <div class="row" ng-if="pattern != null" style="margin-top:10px;">
            <div class="col-sm-12" ng-repeat="p in pattern" ng-click="setreply(p.desc);currentModal.close();" style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc; :hover{ background:#F00; cursor: pointer; }" >
                <P style="font-weight: bold;"> {{ p.name }} </P>
                <pre> {{ p.desc }} </pre>
            </div>
        </div>



    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="currentModal.close();">Close</button>
        <button type="button" class="btn btn-info" ng-click="currentModal.dismiss();">Save changes</button>
    </div>
</script>