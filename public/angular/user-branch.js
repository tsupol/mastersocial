'use strict';

angular.module("augular.userBranch",[])

    .factory("userBranch",["$http",
        function($http){
            var facuserBranch = {};

            facuserBranch.loadProvince = function(){
                return $http.get("load-province");
            };
            facuserBranch.loadAmphur = function(id){
                return $http.get("load-amphur/"+id);
            };
            facuserBranch.loadTumbon = function(a_id,p_id){
                return $http.get("load-tumbon/"+a_id+"/"+p_id);
            };
            facuserBranch.loadZipcode = function(a_id,p_id,d_id){
                return $http.get("load-zipcode/"+a_id+"/"+p_id+"/"+d_id);
            };
            facuserBranch.addData = function(obj){
                return $http.post("users-branch-create",obj);
            };
            facuserBranch.editData = function(obj,id){
                return $http.post("users-branch-edit-action/"+id,obj);
            };
            facuserBranch.viewData = function(page){
                return $http.get("users-branch-view?page="+page);
            };
            facuserBranch.viewEditData = function(id){
                return $http.get("users-branch-edit/"+id);
            };
            facuserBranch.deleteData = function(Id){
                return $http.get("users-branch-delete/"+Id);
            };
            facuserBranch.restoreData = function(Id){
                return $http.get("users-branch-restore/"+Id);
            };


            return facuserBranch; // คืนค่า object ไปให้ myFriend service
        }])


    .controller("users-branch",["$scope","$location","$state","$stateParams","userBranch",
        function($scope,$location,$state,$stateParams,userBranch){
            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){

                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                userBranch.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
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

            $scope.predicate = "id";  // อันนี้กำหนดค่า สำหรับการเรียงข้อมูลเริ่มต้น ในตารางไฟล์ list.html
            // เรียงข้อมูลจาก id

            $scope.deleteData = function(Id){
                userBranch.deleteData(Id).success(function(){
                    $scope.reloadPage();
                });
            };

            $scope.restoreData = function(Id){
                userBranch.restoreData(Id).success(function(){
                    $scope.reloadPage();
                });
            };

            $scope.reloadPage = function(){
                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: false, notify: true });
            }

        }])

    .controller("users-branch-add-edit",["$scope","$location","$stateParams","userBranch",
        function($scope,$location,$stateParams,userBranch){

            $scope.pageTitle = "แก้ไขสาขา";
            $scope.pageDescription = "แก้ไขข้อมูลของสาขา";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่มสาขา";
                $scope.pageDescription = "เพิ่มข้อมูลของสาขา";
            }else{

            }

            if($stateParams.id!==undefined){
                userBranch.viewEditData($stateParams.id).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา

                    if(result.length===undefined ) {    // ถ้ามีข้อมูลส่งมา ให้เรียกใช้คำสั่งต่างๆเพื่อเซ็ตค่าให้ form
                        $scope.pageTitle = "แก้ไขสาขา" ;
                        $scope.pageDescription = "แก้ไขข้อมูลของสาขา" ;
                        $scope.id = $stateParams.id ;

                        $scope.data = result;  // เอาค่าข้อมูลที่ได้ กำหนดให้กับ ตัวแปร object
                        var pr_id = $scope.data.provinceSelected = result.br_province ;
                        var am_id = $scope.data.amphurSelected = result.br_amphur ;
                        var tu_id = $scope.data.tumbonSelected = result.br_distinct ;
                        $scope.data.zipcode = result.br_zipcode ;
                        var pattern_pr_id = (pr_id != "" || pr_id !== null || pr_id !== undefined) ;
                        var pattern_am_id = (am_id != "" || am_id !== null || am_id !== undefined) ;
                        var pattern_tu_id = (tu_id != "" || tu_id !== null || tu_id !== undefined) ;

                        var init = function () {
                            $scope.selectprovince(1); $scope.selectamphur(1);
                        };

                        if (pattern_pr_id)  { init();  }   // ถ้ามีค่า อำเภอ ให้เรียกข้อมูลของ อำเภอ กับ ตำบล
                        //console.log('provinceSelected', pr_id) ;
                        //console.log('amphurSelected', am_id) ;
                        //console.log('tumbonSelected', tu_id) ;

                        $scope.amphurselectable=function(e) {
                            return (pattern_pr_id) ? true : false ;
                        }
                        $scope.tumbonselectable=function(e) {
                            return (pattern_am_id) ? true : false ;
                        }
                    }

                });
            }


            userBranch.loadProvince().success(function(result){
                $scope.province = result;
            });



            $scope.selectprovince = function(statusOnload) {
                var province_id = $scope.data.provinceSelected ;
                //console.log(province_id) ;
                userBranch.loadAmphur(province_id).success(function (result) {
                    $scope.amphur = result;
                    if(result.length>1) {
                        $scope.amphurselectable = function (e) { return true; }; // ถ้ามีการส่งค่ากลับ จะตั้ง enable ให้ อำเภอ
                    }
                });
                if (province_id===undefined||province_id===null||statusOnload===undefined){  // ถ้าไม่มีการเลือก จังหวัด จะตั้ง disable ให้ อำเภอ กับ ตำบล และ zipcode = ค่าว่าง
                    $scope.amphurselectable = function (e) { return false; };
                    $scope.tumbonselectable = function (e) { return false; };
                    $scope.data.zipcode = "" ;
                }

            }

            $scope.selectamphur = function(statusOnload) {
                var province_id = $scope.data.provinceSelected ;
                var amphur_id = $scope.data.amphurSelected ;

                userBranch.loadTumbon(amphur_id,province_id).success(function (result) {
                    $scope.tumbon = result;
                    if(result.length>1) {
                        $scope.tumbonselectable = function (e) { return true; }; // ถ้ามีการส่งค่ากลับ จะตั้ง enable ให้ ตำบล

                    }
                });
                if (amphur_id===undefined||amphur_id===null||statusOnload===undefined){   // ถ้าไม่มีการเลือก อำเภอ จะตั้ง disable ให้ ตำบล และ zipcode = ค่าว่าง
                    $scope.tumbonselectable = function (e) { return false; };
                    $scope.data.zipcode = "" ;
                }

            }

            $scope.selecttumbon = function() {  // รับค่า จังหวัด อำเภอ ตำบล เพื่อดึง รหัสไปรษณีย์
                var province_id = $scope.data.provinceSelected ;
                var amphur_id = $scope.data.amphurSelected ;
                var tumbon_id = $scope.data.tumbonSelected ;
                userBranch.loadZipcode(amphur_id,province_id,tumbon_id).success(function (result) {
                    //console.log(result.ZIPCODE) ;
                    $scope.data.zipcode = result.ZIPCODE;
                });
            }

            $scope.submitForm = function(objFriend){
                if($scope.myForm.$valid){ // ตรวจสอบฟอร์ม หากพร้อมให้ทำงาน
                    // โดยจะส่งข้อมูล object เข้าไป
                    if($stateParams.id!==undefined) {
                        userBranch.editData(objFriend,$stateParams.id).success(function(result){
                            $location.path("/app/users-branch");
                        });
                    }else{
                        userBranch.addData(objFriend).success(function(result){
                            $location.path("/app/users-branch");
                        });
                    }
                }
            };

            $scope.deleteData = function(Id){
                userBranch.deleteData(Id).success(function(){
                    $location.path ("/app/users-branch");
                });
            };

            $scope.restoreData = function(Id){
                userBranch.restoreData(Id).success(function(){
                    $location.path ("/app/users-branch");
                });
            };


        }])