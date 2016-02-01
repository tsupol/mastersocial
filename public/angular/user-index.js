'use strict';

angular.module("augular.userIndex",[])
    .directive("passwordVerify", function() {     //--- เซ็ตการเช็ค confirm password ให้ angularjs
        return {
            require: "ngModel",
            scope: {
                passwordVerify: '='
            },
            link: function(scope, element, attrs, ctrl) {
                scope.$watch(function() {
                    var combined;

                    if (scope.passwordVerify || ctrl.$viewValue) {
                        combined = scope.passwordVerify + '_' + ctrl.$viewValue;
                    }
                    return combined;
                }, function(value) {
                    if (value) {
                        ctrl.$parsers.unshift(function(viewValue) {
                            var origin = scope.passwordVerify;
                            if (origin !== viewValue) {
                                ctrl.$setValidity("passwordVerify", false);
                                return undefined;
                            } else {
                                ctrl.$setValidity("passwordVerify", true);
                                return viewValue;
                            }
                        });
                    }
                });
            }
        };
    })



    .factory("userIndex",["$http",
        function($http){
            var facuser = {};

            facuser.loadUserGroup = function(){
                return $http.get("users-group-all");
            };
            facuser.loadUserBranch = function(){
                return $http.get("users-branch-view-all");
            };
            facuser.loadUserRole = function(){
                return $http.get("users-perm-view-all");
            };



            facuser.loadProvince = function(){
                return $http.get("load-province");
            };
            facuser.loadAmphur = function(id){
                return $http.get("load-amphur/"+id);
            };
            facuser.loadTumbon = function(a_id,p_id){
                return $http.get("load-tumbon/"+a_id+"/"+p_id);
            };
            facuser.loadZipcode = function(a_id,p_id,d_id){
                return $http.get("load-zipcode/"+a_id+"/"+p_id+"/"+d_id);
            };

            facuser.loadPermission = function(){
                return $http.get("load-permission");
            };

            facuser.addData = function(obj,perm){
                return $http.post("users-index-create",obj,perm);
            };
            facuser.editData = function(obj,id){
                return $http.post("users-index-edit-action/"+id,obj);
            };
            facuser.viewData = function(page){
                return $http.get("users-index-view?page="+page);
            };
            facuser.viewEditData = function(id){
                return $http.get("users-index-edit/"+id);
            };



            return facuser; // คืนค่า object ไปให้ myFriend service
        }])

    .controller("users-index",["$scope","$location","$state","$stateParams","userIndex",
        function($scope,$location,$state,$stateParams,userIndex){
            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){

                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                userIndex.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
                    //console.log(result);
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


        }])

    .controller("users-index-add-edit",["$scope","$location","$state","$stateParams","userIndex",
        function($scope,$location,$state,$stateParams,userIndex){
            $scope.error = null ;

            $scope.pageTitle = "แก้ไขลูกจ้าง";
            $scope.pageDescription = "แก้ไขข้อมูลทั่วไปของลูกจ้าง";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่มลูกจ้าง";
                $scope.pageDescription = "เพิ่มข้อมูลทั่วไปของลูกจ้าง";
            }

            if ($stateParams.id!==undefined){

                userIndex.viewEditData($stateParams.id).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
                    if (result.status=="500"){   // กรณีไม่พบข้อมูล ให้เด้งออกไปหน้า list
                        alert(result.message) ;
                        $location.path("/app/users-index");
                    }

                    if(result.length===undefined ) {    // ถ้ามีข้อมูลส่งมา ให้เรียกใช้คำสั่งต่างๆเพื่อเซ็ตค่าให้ form

                        $scope.id = $stateParams.id ;
                        console.log(result) ;
                        $scope.data = result;  // เอาค่าข้อมูลที่ได้ กำหนดให้กับ ตัวแปร object
                        var pr_id = $scope.data.provinceSelected = result.province_id ;
                        var am_id = $scope.data.amphurSelected = result.amphur_id ;
                        var tu_id = $scope.data.tumbonSelected = result.district_id ;
                        $scope.data.zipcode = result.zipcode_id ;
                        var pattern_pr_id = (pr_id != "" || pr_id !== null || pr_id !== undefined) ;
                        var pattern_am_id = (am_id != "" || am_id !== null || am_id !== undefined) ;
                        var pattern_tu_id = (tu_id != "" || tu_id !== null || tu_id !== undefined) ;

                        var init = function () {
                            $scope.selectprovince(); $scope.selectamphur();
                        };

                        if (pattern_pr_id)  { init();  }   // ถ้ามีค่า จังหวัด ให้เรียกข้อมูลของ อำเภอ กับ ตำบล
                        $scope.amphurselectable=function(e) {
                            return (pattern_pr_id) ? true : false ;
                        }
                        $scope.tumbonselectable=function(e) {
                            return (pattern_am_id) ? true : false ;
                        }
                    }

                });
            }
            userIndex.loadUserGroup().success(function(result){
                $scope.userGroup = result;
            });
            userIndex.loadUserBranch().success(function(result){
                $scope.userBranch = result;
            });
            userIndex.loadUserRole().success(function(result){
                $scope.userRole = result;
            });
            userIndex.loadProvince().success(function(result){
                $scope.province = result;
            });
            $scope.selectprovince = function() {
                var province_id = $scope.data.provinceSelected ;
                userIndex.loadAmphur(province_id).success(function (result) {
                    $scope.amphur = result;
                    if(result.length>1) {
                        $scope.amphurselectable = function (e) { return true; }; // ถ้ามีการส่งค่ากลับ จะตั้ง enable ให้ อำเภอ
                    }
                });
                if (province_id===undefined||province_id===null){  // ถ้าไม่มีการเลือก จังหวัด จะตั้ง disable ให้ อำเภอ กับ ตำบล และ zipcode = ค่าว่าง
                    $scope.amphurselectable = function (e) { return false; };
                    $scope.tumbonselectable = function (e) { return false; };
                    $scope.data.zipcode = "" ;
                }
            }
            $scope.selectamphur = function() {
                var province_id = $scope.data.provinceSelected ;
                var amphur_id = $scope.data.amphurSelected ;
                userIndex.loadTumbon(amphur_id,province_id).success(function (result) {
                    $scope.tumbon = result;
                    if(result.length>1) {
                        $scope.tumbonselectable = function (e) { return true; }; // ถ้ามีการส่งค่ากลับ จะตั้ง enable ให้ ตำบล
                    }
                });
                if (amphur_id===undefined||amphur_id===null){   // ถ้าไม่มีการเลือก อำเภอ จะตั้ง disable ให้ ตำบล และ zipcode = ค่าว่าง
                    $scope.tumbonselectable = function (e) { return false; };
                    $scope.data.zipcode = "" ;
                }
            }
            $scope.selecttumbon = function() {  // รับค่า จังหวัด อำเภอ ตำบล เพื่อดึง รหัสไปรษณีย์
                var province_id = $scope.data.provinceSelected ;
                var amphur_id = $scope.data.amphurSelected ;
                var tumbon_id = $scope.data.tumbonSelected ;
                userIndex.loadZipcode(amphur_id,province_id,tumbon_id).success(function (result) {
                    $scope.data.zipcode = result.ZIPCODE;
                });
            }



            //console.log($scope) ;

            $scope.submitForm = function(obj){
                if($scope.myForm.$valid){ // ตรวจสอบฟอร์ม หากพร้อมให้ทำงาน

                    if($stateParams.id!==undefined) {

                        //console.log(obj) ; return false ;
                        userIndex.editData(obj,$stateParams.id).success(function(result){
                            //console.log('result',result);
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/users-index");
                        });
                    }else{
                        //console.log('data',obj);
                        //console.log('list',$scope.list1);
                        //obj.list = $scope.list1 ;
                        //console.log('BF : ',obj) ;
                        if(obj.provinceSelected===undefined){
                            obj.provinceSelected = "0" ;
                        }
                        if(obj.amphurSelected===undefined){
                            obj.amphurSelected = "0" ;
                        }
                        if(obj.tumbonSelected===undefined){
                            obj.tumbonSelected = "0" ;
                        }
                        if(obj.zipcode===undefined){
                            obj.zipcode = "" ;
                        }
                        if(obj.customer_level_id===undefined){
                            obj.customer_level_id = "4" ;
                        }
                        if(obj.know_reason_id===undefined){
                            obj.know_reason_id = "6" ;
                        }
                        //console.log('AF : ',obj) ;

                        userIndex.addData(obj).success(function(result){
                            //console.log('result',result);
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/users-index");
                        });
                    }
                }
            };

        }])
