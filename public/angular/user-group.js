'use strict';

angular.module("augular.userGroup",[])

    .factory("userGroup",["$http",
        function($http){
            var factory = {};

            factory.viewData = function(page){
                return $http.get("users-group?page="+page);
            };

            factory.addData = function(obj){
                return $http.post("users-group-create",obj);
            };

            factory.editData = function(obj){
                return $http.post("users-group-edit",obj);
            };

            factory.deleteData = function(Id){
                return $http.get("users-group-delete/"+Id);
            };
            factory.restoreData = function(Id){
                return $http.get("users-group-restore/"+Id);
            };

            return factory; // คืนค่า object ไปให้ myFriend service
        }])


    .controller("users-group",["$scope","$location","$state","$stateParams","userGroup",
        function($scope,$location,$state,$stateParams,userGroup){ // กำหนดตรงนี้ด้วย แต่ไม่ต้องมี ""

            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){

                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                userGroup.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
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

            $scope.reloadPage = function(){
                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: false, notify: true });
            }

            $scope.predicate = "id";  // อันนี้กำหนดค่า สำหรับการเรียงข้อมูลเริ่มต้น ในตารางไฟล์ list.html
            // เรียงข้อมูลจาก id

            $scope.submitForm = function(){
                if($scope.myForm.$valid){ // ตรวจสอบฟอร์ม หากพร้อมให้ทำงาน
                    // เรียกใช้งาน ฟังก์ชั่น ใน myFriend service ที่เราสร้าง ชื่อ addFriend
                    // โดยจะส่งข้อมูล object เข้าไป
                    var obj =
                    {
                        auth_name: $scope.queryString.auth_name

                    };
                    userGroup.addData(obj).success(function($route){
                        // หากทำการบันทึกข้อมูลสำเร็จ
                       // $scope.myForm.$setPristine(); // ล้างค่าข้อมูลในฟอร์ม พร้อมบันทึกใหม่
                       // $scope.data = null; // ให้ object ชื่อ data เป็นค่าว่าง รอรับข้อมูลใหม่
                        $scope.reloadPage();
                    });
                }
            };

            $scope.editData = function(Name,Id){
                var obj =
                {
                    auth_name: Name ,
                    group_id : Id
                };

                userGroup.editData(obj).success(function($route){
                    $scope.reloadPage();
                });
            };

            // กำหนดฟังก์ชัน ลบข้อมูล จากที่เรียกใช้ในหน้า template list.html
            $scope.deleteData = function(Id){ // ส่ง Id เข้ามา

                userGroup.deleteData(Id).success(function(){ // ถ้า ok ลบข้อมูล
                    $scope.reloadPage();
                });
            };
            $scope.restoreData = function(Id){
                userGroup.restoreData(Id).success(function(){
                    $scope.reloadPage();
                });
            };

        }])
