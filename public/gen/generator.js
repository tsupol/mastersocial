'use strict';

var app = angular.module("gen.generator", []);

app.controller("generator", function ($scope, $rootScope, $location, $state, $stateParams, apiService, $modal) {

        // -- delete
        window.deleteData = function (me, id) {
            $scope.mdConfirm('Confirmation', 'Are you sure?', {
                confirm: function() {
                    apiService.deleteData('api/' + $scope.url.submit + '/' + id).success(function (result) {
                        //console.log('$scope.url.submit', $scope.url.submit);
                        if(result.status == 'error') {
                            $scope.mdAlert('Error!', result.message);
                            return;
                        }
                        $(me).closest('table').dataTable().api().ajax.reload();
                        //$scope.reloadPage();
                    });
                }
            });
        };


        // -- delete
        window.restoreData = function (me, id) {
            $scope.mdConfirm('Confirmation', 'Are you sure?', {
                confirm: function() {
                    apiService.deleteData('api/' + $scope.url.submit + '/' + id).success(function (result) {
                        //console.log('$scope.url.submit', $scope.url.submit);
                        if(result.status == 'error') {
                            $scope.mdAlert('Error!', result.message);
                            return;
                        }
                        $(me).closest('table').dataTable().api().ajax.reload();
                        //$scope.reloadPage();
                    });
                }
            });
        };

        //var deregister = $rootScope.$on("modal.clicked", function (e, value) {
        //    if($rootScope.modal.uid != uid) return;
        //    if (value[0]) {
        //        var rs = value[1];
        //        apiService.deleteData('api/' + submitUrl + '/' + rs.id).success(function (result) {
        //            //console.log('$scope.url.submit', $scope.url.submit);
        //            if(result.status == 'error') {
        //                $scope.mdAlert('Error!', result.message);
        //                return;
        //            }
        //            rs.deleted = true;
        //        });
        //    }
        //});

        $scope.reloadPage =function() {
            $state.go($state.current, {}, {reload: true}); //second parameter is for $stateParams
        };

        //var me = this;

        // -- init data
        $scope.data = {};
        $scope.views = {};
        $scope.val = {};

        // -- Modals

        $scope.alert = {};
        $scope.alert.purchase = false; // -- for Purchase
        $rootScope.modal = {
            title: '-',
            body: '-'
        };

        $scope.tabClick = function(url) {
            $location.path(url);
        };

        // -- basic table

        var page_bf_cnt = 0;
        var page_af_cnt = 0;
        var bigCurPage = 1;

        // -- end basic table

        // Open Simple Modal

        $scope.openModal = function(modal_id, modal_size, modal_backdrop)
        {
            $rootScope.currentModal = $modal.open({
                templateUrl: modal_id,
                size: modal_size,
                backdrop: typeof modal_backdrop == 'undefined' ? true : modal_backdrop
            });
        };

        $scope.mdConfirm = function(title, message, param, uid) {
            $rootScope.modal.title = title;
            $rootScope.modal.body = message;
            $rootScope.modal.type = 'confirm';
            $rootScope.modal.param = param;
            $rootScope.modal.uid = uid;
            $scope.openModal('modal-1');
        };

        $scope.mdAlert = function(title, message) {
            $rootScope.modal.title = title;
            $rootScope.modal.body = message;
            $rootScope.modal.type = 'alert';
            $scope.openModal('modal-1');
        };

        //$rootScope.mdConClick = function(modal, value) {
        //    modal.close();
        //    $rootScope.$emit("modal.clicked", [value, $rootScope.modal.param]);
        //};

        $rootScope.mdConClick = function(modal, e) {
            console.log('e', e);
            modal.close();
            if(e) $rootScope.modal.param.confirm();
        };

        $scope.loadData = function(result) {

            var rootUrl = $location.absUrl().split('#')[0]; // Before # ( http://localhost/real_pos/public/main )
            var publicUrl = rootUrl.replace(/\/(main)/g, '/'); // Before # ( http://localhost/real_pos/public/ )
            var baseUrl = $location.absUrl().split('#')[1].replace(/\/(create|edit|delete)\/?\w*/g, ''); // After # Before create ( /app/customers )
            //var submitUrl = $state.current.initUrl.split('/')[0]; // customers
            var submitUrl = (result.settings.submitUrl) ? result.settings.submitUrl : $state.current.initUrl.split('/')[0]; // customers
            //console.log('baseUrl', baseUrl);

            $rootScope.currentUrl = $location.path();
            // $location.path() // after hash

            $scope.url = {
                root: rootUrl,
                submit: submitUrl,
                base: baseUrl,
                public: publicUrl,
                fix: 'real_pos/public/'
            };

            $scope.error = false;
            // -- Permission Denied
            if(result.status == 'error') {
                $scope.mdAlert('Error!', result.message);
                return;
            }

            $scope.data = result.data;
            $scope.settings = result.settings;
            $scope.views = result.views;
            //$scope.readonly = (result.readonly) ? true : false;
            $scope.readonly = (result.settings.readonly) ? true : false;

            if (result.val) {
                $scope.val = result.val;
            }

            console.log('result', result);

            if($scope.views.length == 1) {
                $scope.views[0].active = true;
            }

            for (var v in $scope.views) {
                var view = $scope.views[v];
                if(view.active) {
                    view.class = 'active';
                } else {
                    if (view.type == 'custom') {

                    } else if (view.type == 'table') { // -- table

                        basicTable(view);

                    } else {

                    }
                }
            }
        };

        // -- init page

        $scope.getPosts = function(pageNumber){

            if(pageNumber===undefined){
                pageNumber = '1';
            }

            var loadUrl = $state.current.initUrl;
            if(loadUrl.match(/create|edit/g) == null) { // to do : more precise (near last section)
                loadUrl += '?page='+pageNumber;
            }

            console.log('$stateParams', $stateParams);
            for(var key in $stateParams) {
                var re = new RegExp(':'+key, "g");
                loadUrl = loadUrl.replace(re, $stateParams[key]);
            }
            //loadUrl = loadUrl.replace(/:id/g, $stateParams.id);
            //loadUrl = loadUrl.replace(/:cid/g, $stateParams.cid);

            apiService.loadData(loadUrl).success(function(result){
                $scope.loadData(result);
            });

        };

        // -- send request

        $scope.getPosts();


        // -- basic table

        function basicTable(view) {

            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];

            // -- table formatting

            for(var i = 0; i < view.fields.length; i++) {
                //if(!Array.isArray(view.fields[i])) {
                //    var f = view.fields[i][1];
                view.fields[i] = [view.fields[i][0], apiService.prettify(view.fields[i][1])];
                //}
            }

            // -- create button

            if(view.create) {
            } else {
                view.create = '/app'+$state.current.url+'/create';
            }

            // -- pagination

            $scope.totalPages = $scope.data.last_page;
            $scope.currentPage = $scope.data.current_page;


            if (  (($scope.currentPage%5)==0)&&(bigCurPage>$scope.currentPage )   ){
                bigCurPage -= 5;
                //console.log('mod = 0');
                page_bf_cnt = bigCurPage;
                page_af_cnt = bigCurPage+4;
            }

            if (($scope.currentPage%5)==1 ){
                bigCurPage = $scope.currentPage ;
                //console.log('mod = 1');
                page_af_cnt = $scope.currentPage+4;
                page_bf_cnt = page_af_cnt-4;
            }


            if ($scope.currentPage==$scope.data.last_page ){
                bigCurPage = $scope.currentPage ;
                //console.log('mod = 1');
                page_bf_cnt = $scope.currentPage;
                page_af_cnt = $scope.currentPage+4;
            }

            if(page_af_cnt>$scope.data.last_page){
                page_af_cnt = $scope.data.last_page;
            }
            if(page_bf_cnt==$scope.data.last_page){
                page_bf_cnt =  $scope.data.last_page-4 ;
            }
            if(page_af_cnt-page_bf_cnt<4){
                page_bf_cnt = page_af_cnt-4 ;
            }
            if(page_bf_cnt<1){
                page_bf_cnt = 1 ;
            }
            if(page_af_cnt<5&&$scope.data.last_page>5){
                page_af_cnt = 5;
            }

            var pages_cr = [] ;
            for(var i=page_bf_cnt;i<=page_af_cnt;i++) {
                pages_cr.push(i);
            }
            $scope.range_cr = pages_cr;

            $scope.maxSize = 5;
            $scope.bigTotalItems = $scope.data.total;
        }
        setTimeout(function(){
            console.log('-', $('#datat1').length);
        }, 1000);

    }
);

app.filter('capitalize', function() {
    return function(input, scope) {
        if (input!=null)
            input = input.toLowerCase();
        return input.substring(0,1).toUpperCase()+input.substring(1);
    }
});

app.directive('dynAttr', function() {
    return {
        scope: { list: '=dynAttr' },
        link: function(scope, elem, attrs){
            for(var attr in scope.list){
                elem.attr(scope.list[attr].attr, scope.list[attr].value);
            }
            //console.log(scope.list);
        }
    };
});

