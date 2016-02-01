'use strict';

angular.module("augular.customerIndex",[])



    .factory("custIndex",["$http",
        function($http){
            var faccust = {};

            faccust.loadCustLevel = function(){
                return $http.get("cust-level-view-all");
            };
            faccust.loadCustKnow = function(){
                return $http.get("cust-know-view-all");
            };
            faccust.loadUserRole = function(){
                return $http.get("users-perm-view");
            };



            faccust.loadProvince = function(){
                return $http.get("load-province");
            };
            faccust.loadAmphur = function(id){
                return $http.get("load-amphur/"+id);
            };
            faccust.loadTumbon = function(a_id,p_id){
                return $http.get("load-tumbon/"+a_id+"/"+p_id);
            };
            faccust.loadZipcode = function(a_id,p_id,d_id){
                return $http.get("load-zipcode/"+a_id+"/"+p_id+"/"+d_id);
            };


            faccust.addData = function(obj,perm){
                return $http.post("customers-index-create",obj,perm);
            };
            faccust.editData = function(obj,id){
                return $http.post("customers-index-edit-action/"+id,obj);
            };
            faccust.viewData = function(page){
                return $http.get("customers-index-view?page="+page);
            };
            faccust.viewEditData = function(id){
                return $http.get("customers-index-edit/"+id);
            };
            faccust.deleteData = function(Id){
                return $http.get("customers-index-delete/"+Id);
            };
            faccust.restoreData = function(Id){
                return $http.get("customers-index-restore/"+Id);
            };


            return faccust; // คืนค่า object ไปให้ myFriend service
        }])

    .controller("customers-index",["$scope","$location","$state","$stateParams","custIndex",
        function($scope,$location,$state,$stateParams,custIndex){

            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){
                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                custIndex.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
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
                custIndex.deleteData(Id).success(function(){
                    $scope.reloadPage();
                });
            };

            $scope.restoreData = function(Id){
                custIndex.restoreData(Id).success(function(){
                    $scope.reloadPage();
                });
            };

            $scope.reloadPage = function(){
                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: false, notify: true });
            }
        }])

    .controller("customers-index-add-edit",["$scope","$location","$state","$stateParams","custIndex",
        function($scope,$location,$state,$stateParams,custIndex){
            $scope.error = null ;
            $scope.list1 = [];

            $scope.pageTitle = "แก้ไขลูกค้า";
            $scope.pageDescription = "แก้ไขข้อมูลทั่วไปของลูกค้า";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่มลูกค้า";
                $scope.pageDescription = "เพิ่มข้อมูลทั่วไปของลูกค้า";
                //if(window.customer_create != 1){
                //    alert("คุณไม่มี permission สำหรับใช้งานในส่วนนี้ค่ะ");
                //    $location.path("/app/customers-index");
                //}
            }else{
                //if(window.customer_update != 1){
                //    alert("คุณไม่มี permission สำหรับใช้งานในส่วนนี้ค่ะ");
                //    $location.path("/app/customers-index");
                //}
            }


            if($stateParams.id!==undefined) {
                custIndex.viewEditData($stateParams.id).success(function (result) { // ดึงข้อมูลสำเร็จ ส่งกลับมา

                    if (result.length === undefined) {    // ถ้ามีข้อมูลส่งมา ให้เรียกใช้คำสั่งต่างๆเพื่อเซ็ตค่าให้ form

                        $scope.id = $stateParams.id;
                        console.log(result);
                        $scope.data = result;  // เอาค่าข้อมูลที่ได้ กำหนดให้กับ ตัวแปร object
                        var pr_id = $scope.data.provinceSelected = result.province_id;
                        var am_id = $scope.data.amphurSelected = result.amphur_id;
                        var tu_id = $scope.data.tumbonSelected = result.district_id;
                        $scope.data.zipcode = result.zipcode_id;
                        var pattern_pr_id = (pr_id != "" || pr_id !== null || pr_id !== undefined);
                        var pattern_am_id = (am_id != "" || am_id !== null || am_id !== undefined);
                        var pattern_tu_id = (tu_id != "" || tu_id !== null || tu_id !== undefined);

                        var init = function () {
                            $scope.selectprovince();
                            $scope.selectamphur();
                        };

                        if (pattern_pr_id) {
                            init();
                        }   // ถ้ามีค่า อำเภอ ให้เรียกข้อมูลของ อำเภอ กับ ตำบล
                        //console.log('provinceSelected', pr_id) ;
                        //console.log('amphurSelected', am_id) ;
                        //console.log('tumbonSelected', tu_id) ;

                        $scope.amphurselectable = function (e) {
                            return (pattern_pr_id) ? true : false;
                        }
                        $scope.tumbonselectable = function (e) {
                            return (pattern_am_id) ? true : false;
                        }



                    }

                });
            }
            custIndex.loadCustLevel().success(function(result){
                $scope.CustLevel = result;
            });
            custIndex.loadCustKnow().success(function(result){
                $scope.CustKnow = result;
            });

            custIndex.loadProvince().success(function(result){
                $scope.province = result;
            });
            $scope.selectprovince = function() {
                var province_id = $scope.data.provinceSelected ;
                //console.log(province_id) ;
                custIndex.loadAmphur(province_id).success(function (result) {
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
                custIndex.loadTumbon(amphur_id,province_id).success(function (result) {
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
                custIndex.loadZipcode(amphur_id,province_id,tumbon_id).success(function (result) {
                    //console.log(result.ZIPCODE) ;
                    $scope.data.zipcode = result.ZIPCODE;
                });
            }



            //console.log($scope) ;

            $scope.submitForm = function(obj){
                if($scope.myForm.$valid|| $scope.list1.length>0){ // ตรวจสอบฟอร์ม หากพร้อมให้ทำงาน

                    obj.list = $scope.list1 ;


                    if($stateParams.id!==undefined) {

                        //console.log(obj) ; return false ;

                        custIndex.editData(obj,$stateParams.id).success(function(result){
                            $location.path("/app/customers-index");
                        });
                    }else{
                        //console.log('data',obj);
                        //console.log('list',$scope.list1);
                        custIndex.addData(obj).success(function(result){
                            console.log('result',result);
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }
                            $location.path("/app/customers-index");
                        });
                    }
                }
            };

            $scope.deleteData = function(Id){
                custIndex.deleteData(Id).success(function(){
                    $location.path ("/app/customers-index");
                });
            };

            $scope.restoreData = function(Id){
                custIndex.restoreData(Id).success(function(){
                    $location.path ("/app/customers-index");
                });
            };

        }])
