'use strict';

angular.module("augular.package",[])

    .factory("userPermission",["$http",
        function($http){
            var facuserBranch = {};

            facuserBranch.loadProduct = function(){
                return $http.get("load-product");
            };
            facuserBranch.loadProcedure = function(){
                return $http.get("load-procedure");
            };


            facuserBranch.addprocedure = function(obj){

                console.log('factory',obj);

                return $http.post("procedure/add-product",obj);
            };
            facuserBranch.viewData = function(id){
                return $http.get("procedure/view-product/"+id);
            };
            facuserBranch.deleteItem = function(id){
                return $http.get("procedure/del-product/"+id);
            };

            facuserBranch.editItem = function(id,obj){
                return $http.post("procedure/edit-product/"+id,obj);
            };





            return facuserBranch; // คืนค่า object ไปให้ myFriend service
        }])



    .controller("goods-packages-add",["$scope","$location","$state","$stateParams","userPermission",
        function($scope,$location,$state,$stateParams,userPermission){
            $scope.error = null ;
            $scope.list1 = [];

            $scope.pageTitle = "แก้ไข Permission";
            $scope.pageDescription = "แก้ไขข้อมูล Permission ของ users";
            if($stateParams.id===undefined){
                $scope.pageTitle = "เพิ่ม Permission";
                $scope.pageDescription = "เพิ่มข้อมูล Permission ของ users";
            }

            $scope.procedure_id = 31 ;

            $scope.loadtable = function(){

                userPermission.viewData( $scope.procedure_id ).success(function(result){

                    $scope.procedure_product = result;

                    console.log($scope.procedure_product);

                });
            };

            $scope.loadtable();

            $scope.additem = function(obj){


                var obj   = {
                    'procedure_id' : $scope.procedure_id ,
                    'product_id' : $scope.product_id,
                    'amount' : $scope.amount
                };



                userPermission.addprocedure(obj).success(function(result){
                    $scope.reloadPage();
                });
            }

            $scope.reloadPage = function(){
                $state.transitionTo($state.current, $stateParams, { reload: true, inherit: false, notify: true });
            }



            $scope.deleteitem = function(id){

                userPermission.deleteItem(id).success(function(result){
                    $scope.reloadPage();
                });
            };

            $scope.updateitem = function(id,amount){

                var obj =
                {
                    amount: amount
                };


                userPermission.editItem(id,obj).success(function(result){

                    $scope.reloadPage();
                });
            };


            userPermission.loadProcedure().success(function(result){
                //$scope.procedures = result;
                //console.log( $scope.permissions);
            });
            userPermission.loadProduct().success(function(result){
                $scope.products = result;
                //console.log( $scope.permissions);
            });






        }])
