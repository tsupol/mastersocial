'use strict';

angular.module('gen.customCtrl', []).
    controller('purchaseTable', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        $scope.etData = $scope.val[$scope.value.model];
        if(!$scope.etData) {
            $scope.etData = [];
        }
        $scope.editable = [];
        $scope.amount = 1;
        $scope.total = 0;
        $scope.fields = ['name', 'amount', 'price', 'salePrice'];

        //$scope.prices = {
        //    'price_vip': 'VIP',
        //    'price_marketing': 'Marketing',
        //    'price_employee': 'Employee',
        //    'price_member': 'Member',
        //    'price': 'Normal'
        //};

        $scope.prices = [
            { code: 'price_vip', name: 'VIP'},
            { code: 'price_marketing', name: 'Marketing'},
            { code: 'price_employee', name: 'Employee'},
            { code: 'price_member', name: 'Member'},
            { code: 'price', name: 'Normal'},
        ];


        var pKeys = [
            'price_vip','price_marketing','price_employee','price_member','price'
        ];

        $scope.cPrice = pKeys[$scope.val.customer_price-1];

        $scope.priceId = $scope.val.customer_price-1;
        //console.log('cPrice', $scope.cPrice);

        myVars.ajaxQuery = 'api/search/packages';

        var returns = $scope.value.returns;
        var key = 'id';
        //console.log('root', myVars.ajaxQuery);

        // -- functions





        $scope.ctrls2.push({
            submitForm : function(data) {
                var myData = [];
                for(var i=0; i<$scope.etData.length; i++) {
                    var et = $scope.etData[i];
                    var item = {
                        'price': et.realPrice,
                        'discount': et.price - et.realPrice,
                        'amount': et.amount
                    };
                    item[$scope.value.idName] = et.id;
                    console.log('et', et);
                    myData.push(item);

                }
                data[$scope.value.name] = myData;
                return myData.length;
                //console.log('data', data)
            }
        });

        $scope.calTotal = function () {
            $scope.total = 0;
            for(var i=0; i<$scope.etData.length; i++) {
                $scope.total += $scope.etData[i].realPrice * $scope.etData[i].amount;
            }

            console.log('test');

            $scope.val[$scope.value.total_name] = $scope.total;
        };

        $scope.deletePurchase = function($id) {
            $scope.mdConfirm('Confirmation', 'Are you sure?', {
                confirm: function () {
                    $scope.etData.splice($id, 1);
                }
            });
        };

        $scope.changePrice = function(param, id, index) {
            param.realPrice = param[id];
            param.priceId = index;
            $scope.calTotal();
            //console.log('param', param, id, param[id]);
        };

        $scope.deleteItem = function(id) {
            $scope.etData[i].remove();
        };

        $scope.addItem = function() {

            var data = $scope.selectData;
            if(!data) {
                alert('no data!');
                return;
            }
            if(!$scope.amount) {
                alert('Please enter the amount.');
                return;
            }

            // duplicate check
            var item = data;
            if(key) {
                for(var i=0; i<$scope.etData.length; i++) {
                    if($scope.etData[i][key] == data[key]) {
                        alert('ข้อมูลซ้ำ: ' + key + ' = ' + data[key]);
                        return;
                    }
                }
            }
            item.realPrice = data[$scope.prices[$scope.priceId].code];
            item.amount = $scope.amount;
            item.priceId = $scope.priceId;
            //console.log('dd', data);
            $scope.etData.push(item);
            $scope.calTotal();
        };

        // --- DEV only !

        if(false) {

            var item = {
                amount: 1,
                buffet_points: 0,
                cost: 960.00,
                created_at: "2015-10-21 10:15:35",
                created_by: 0,
                deleted_at: null,
                deleted_by: 0,
                id: 2,
                name: "package_2",
                price: 1000.00,
                price_employee: 850.00,
                price_marketing: 900.00,
                price_member: 950.00,
                price_vip: 800.00,
                realPrice: 1000.00,
                priceId: 1,
                type: 0,
                updated_at: "2015-10-28 11:58:28",
                updated_by: 0
            };

            $scope.etData.push(item);
        }

        // ---END DEV only !

        $scope.calTotal();

    }).
    directive('purchaseTable', function(){
        return {
            restrict: 'E',
            replace: true,
            controller: 'purchaseTable',
            link: function(scope, elm, attrs, ctrl) {
                var dp = $(elm).find('.etSelect');
                dp.select2({
                    minimumInputLength: 1,
                    placeholder: 'Search',
                    ajax: {
                        url: function () {
                            //return myVars['ajaxQuery'];
                            return 'api/search/'+scope.value.model;
                        },
                        dataType: 'json',
                        quirsillis: 100,
                        data: function(term, page) {
                            return {
                                limit: -1,
                                q: term
                            };
                        },
                        results: function(data, page) {
                            return { results: data }
                        }
                        /* processResults: function (data) {
                         myVars.ajaxResult = data;
                         console.log('myVars.ajaxResult', myVars.ajaxResult);
                         return {
                         results: data
                         };
                         }, */
                    },

                    formatResult: function(student) {
                        return "<div class='select2-user-result'>" + student.name + "</div>";
                    },
                    formatSelection: function(student) {
                        return  student.name;
                    }

                }).on("select2-selecting", function(e) {
                    scope.$apply(function() { // Apply cause it is outside angularjs
                        scope.selectData = e.object;
                        //ctrl.$setViewValue(dateText); // Set new value of datepicker to scope
                    });
                    //myVars.selectData = e.object;
                });
            }
        }
    });



