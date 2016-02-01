'use strict';

angular.module("augular.custLevel",[])

    .factory("custLevel",["$http",
        function($http){
            var faccustLevel = {};
            faccustLevel.addData = function(obj){
                return $http.post("cust-level-create",obj);
            };
            faccustLevel.editData = function(obj,id){
                return $http.post("cust-level-edit-action/"+id,obj);
            };
            faccustLevel.viewData = function(page){
                return $http.get("cust-level-view?page="+page);
            };
            faccustLevel.viewEditData = function(id){
                return $http.get("cust-level-edit/"+id);
            };
            faccustLevel.deleteData = function(Id){
                return $http.get("cust-level-delete/"+Id);
            };
            faccustLevel.restoreData = function(Id){
                return $http.get("cust-level-restore/"+Id);
            };
            return faccustLevel; // คืนค่า object ไปให้ myFriend service
        }])

    .controller("customers-level",["$scope","$location","$state","$stateParams","custLevel",
        function($scope,$location,$state,$stateParams,custLevel){
            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){
                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                custLevel.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
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
                custLevel.deleteData(Id).success(function(){
                    $scope.reloadPage();
                });
            };
            $scope.restoreData = function(Id){
                custLevel.restoreData(Id).success(function(){
                    $scope.reloadPage();
                });
            };
            $scope.reloadPage = function(){
                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: false, notify: true });
            }

        }])

    .controller("customers-level-add-edit",["$scope","$location","$stateParams","custLevel",
        function($scope,$location,$stateParams,custLevel){
            $scope.pageTitle = "แก้ไขสาขา";
            $scope.pageDescription = "แก้ไขข้อมูลของสาขา";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่มระดับลูกค้า";
                $scope.pageDescription = "เพิ่มข้อมูลระดับของลูกค้า";
            }
            if ($stateParams.id!==undefined) {
                custLevel.viewEditData($stateParams.id).success(function (result) {
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
                        custLevel.editData(objFriend,$stateParams.id).success(function(result){
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/customers-level");
                        });
                    }else{
                        custLevel.addData(objFriend).success(function(result){
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/customers-level");
                        });
                    }
                }
            };
            $scope.deleteData = function(Id){
                custLevel.deleteData(Id).success(function(){
                    $location.path ("/app/customers-level");
                });
            };
            $scope.restoreData = function(Id){
                custLevel.restoreData(Id).success(function(){
                    $location.path ("/app/customers-level");
                });
            };
        }])