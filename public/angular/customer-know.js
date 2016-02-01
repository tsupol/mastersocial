'use strict';

angular.module("augular.custKnow",[])

    .factory("custKnow",["$http",
        function($http){
            var faccustKnow = {};
            faccustKnow.addData = function(obj){
                return $http.post("cust-know-create",obj);
            };
            faccustKnow.editData = function(obj,id){
                return $http.post("cust-know-edit-action/"+id,obj);
            };
            faccustKnow.viewData = function(page){
                return $http.get("cust-know-view?page="+page);
            };
            faccustKnow.viewEditData = function(id){
                return $http.get("cust-know-edit/"+id);
            };
            faccustKnow.deleteData = function(Id){
                return $http.get("cust-know-delete/"+Id);
            };
            faccustKnow.restoreData = function(Id){
                return $http.get("cust-know-restore/"+Id);
            };
            return faccustKnow; // คืนค่า object ไปให้ myFriend service
        }])

    .controller("customers-know",["$scope","$location","$state","$stateParams","custKnow",
        function($scope,$location,$state,$stateParams,custKnow){
            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){
                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                custKnow.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
                    console.log(result);
                    $scope.data = result.data;  // เอาค่าข้อมูลที่ได้ กำหนดให้กับ ตัวแปร object
                    $scope.totalPages   = result.last_page;
                    $scope.currentPage  = result.current_page;
                    // Pagination Range
                    var pages = [];
                    for(var i=1;i<=result.last_page;i++) {
                        pages.push(i);
                    }
                    $scope.range = pages;
                });
            };
            $scope.getPosts();
            //---- end pagination

            $scope.deleteData = function(Id){
                custKnow.deleteData(Id).success(function(){
                    $scope.reloadPage();
                });
            };
            $scope.restoreData = function(Id){
                custKnow.restoreData(Id).success(function(){
                    $scope.reloadPage();
                });
            };
            $scope.reloadPage = function(){
                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: false, notify: true });
            }

        }])

    .controller("customers-know-add-edit",["$scope","$location","$stateParams","custKnow",
        function($scope,$location,$stateParams,custKnow){
            $scope.pageTitle = "แก้ไขรู้จักคลินิก";
            $scope.pageDescription = "แก้ไขข้อมูลรู้จักคลินิก";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่มรู้จักคลินิก";
                $scope.pageDescription = "เพิ่มข้อมูลรู้จักคลินิก";
            }
            if ($stateParams.id!==undefined) {
                custKnow.viewEditData($stateParams.id).success(function (result) {
                    if (result.length === undefined) {
                        $scope.id = $stateParams.id;
                        $scope.data = result;
                    }
                });
            }
            $scope.submitForm = function(objFriend){
                if($scope.myForm.$valid){ // ตรวจสอบฟอร์ม หากพร้อมให้ทำงาน
                    // โดยจะส่งข้อมูล object เข้าไป
                    if($stateParams.id!==undefined) {
                        custKnow.editData(objFriend,$stateParams.id).success(function(result){
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/customers-know");
                        });
                    }else{
                        custKnow.addData(objFriend).success(function(result){
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/customers-know");
                        });
                    }
                }
            };
            $scope.deleteData = function(Id){
                custKnow.deleteData(Id).success(function(){
                    $location.path ("/app/customers-know");
                });
            };
            $scope.restoreData = function(Id){
                custKnow.restoreData(Id).success(function(){
                    $location.path ("/app/customers-know");
                });
            };
        }])