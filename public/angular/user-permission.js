'use strict';

angular.module("augular.userPermission",[])

    .factory("userPermission",["$http",
        function($http){
            var facuserBranch = {};

            facuserBranch.loadPermission = function(){
                return $http.get("load-permission");
            };

            facuserBranch.addData = function(obj,perm){
                return $http.post("users-perm-create",obj,perm);
            };
            facuserBranch.editData = function(obj,id){
                return $http.post("users-perm-edit-action/"+id,obj);
            };
            facuserBranch.viewData = function(page){
                return $http.get("users-perm-view?page="+page);
            };
            facuserBranch.viewEditData = function(id){
                return $http.get("users-perm-edit/"+id);
            };

            return facuserBranch; // คืนค่า object ไปให้ myFriend service
        }])


    .controller("users-perm",["$scope","$location","$state","$stateParams","userPermission",
        function($scope,$location,$state,$stateParams,userPermission){
            //userPermission.viewData().success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
            //    $scope.data = result;  // เอาค่าข้อมูลที่ได้ กำหนดให้กับ ตัวแปร object
            //});

            $scope.data = [];
            //---- pagination
            $scope.totalPages = 0;
            $scope.currentPage = 1;
            $scope.range = [];
            $scope.getPosts = function(pageNumber){

                if(pageNumber===undefined){
                    pageNumber = '1';
                }
                userPermission.viewData(pageNumber).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
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
    .controller("users-perm-add-edit",["$scope","$location","$state","$stateParams","userPermission",
        function($scope,$location,$state,$stateParams,userPermission){
            $scope.error = null ;
            $scope.list1 = [];

            $scope.pageTitle = "แก้ไข Permission";
            $scope.pageDescription = "แก้ไขข้อมูล Permission ของ users";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่ม Permission";
                $scope.pageDescription = "เพิ่มข้อมูล Permission ของ users";
            }


            $scope.selectperm = function(item){
                //console.log(item) ;
                var index = $scope.list5.indexOf(item);
                $scope.list5.splice(index, 1);
                $scope.list1.push(item);
            };
            $scope.deleteperm = function(item){
                var index = $scope.list1.indexOf(item);
                $scope.list1.splice(index, 1);
                $scope.list5.push(item);
            };

            userPermission.loadPermission().success(function(result){
                $scope.list5 = result;
                //console.log( $scope.permissions);
            });

            userPermission.viewEditData($stateParams.id).success(function(result){ // ดึงข้อมูลสำเร็จ ส่งกลับมา
                //console.log('result',result);
                //console.log(result.length);

                if (result.length === undefined) {    // ถ้ามีข้อมูลส่งมา ให้เรียกใช้คำสั่งต่างๆเพื่อเซ็ตค่าให้ form


                    $scope.id = $stateParams.id;
                    $scope.data = result;  // เอาค่าข้อมูลที่ได้ กำหนดให้กับ ตัวแปร object
                    for (var i = 0; i < result.permission.length; i++) {
                        $scope.list1.push(
                            {
                                id: result.permission[i].id,
                                name: result.permission[i].name
                            }
                        )
                    }
                    //---  ขั้นตอนเอาค่า ที่มีใน list1  ออกจาก list5
                    for (var i = 0; i < $scope.list1.length; i++) {
                        for (var y = 0; y < $scope.list5.length; y++) {

                            //console.log( $scope.list1[i].name ,'i:'+i,'y:'+y,$scope.list1[i].id ,$scope.list5[y].id )

                            if ($scope.list5[y].id == $scope.list1[i].id  ) {
                                $scope.list5.splice(y, 1);
                            }
                        }
                    }
                }
            });

            //console.log($scope) ;

            $scope.submitForm = function(obj){
                if($scope.myForm.$valid|| $scope.list1.length>0){ // ตรวจสอบฟอร์ม หากพร้อมให้ทำงาน

                    obj.list = $scope.list1 ;


                    if($stateParams.id!==undefined) {
                        userPermission.editData(obj,$stateParams.id).success(function(result){

                            //console.log('Result : ',result) ;
                            $location.path("/app/users-perm");
                        });
                    }else{
                        //console.log('data',obj);
                        //console.log('list',$scope.list1);
                        userPermission.addData(obj).success(function(result){
                            //console.log('result',result);
                            if (result.status=="500"){
                                $scope.error = result.message ; return false;
                            }

                            //console.log('redirect');
                            $location.path("/app/users-perm");



                        });
                    }
                }
            };

        }])
