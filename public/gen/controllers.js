'use strict';

angular.module('gen.controllers', []).
    controller('charter', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {

    }).
    controller('editTable', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        // <i class="fa fa-trash-o"></i>
        $scope.etData = $scope.val[$scope.value.model];
        if(!$scope.etData) {
            $scope.etData = [];
        }
        $scope.editable = [];
        $scope.addData = {};
        $scope.total = 0;

        $scope.btn = {
            delete: {
                class: 'btn btn-danger btn-xs',
                title: 'delete',
                icon: 'fa fa-trash-o',
                label: ''
            }
        };
        if($scope.value.btn) {
            if($scope.value.btn.delete) $scope.btn.delete = _.extend($scope.btn.delete, $scope.value.btn.delete);
        }

        console.log('$scope.btn', $scope.btn);


        var uid = new Date().getTime(); // unique ID for modal

        myVars.ajaxQuery = 'api/search/'+$scope.value.model;

        var fields = $scope.value.fields;
        var returns = $scope.value.returns;
        var key = $scope.value.key;

        var submitUrl = ($scope.value.submitUrl) ? $scope.value.submitUrl : $scope.url.submit;

        if($scope.value.searchable === undefined) {
            $scope.value.searchable = true;
        }

        if($scope.value.editable === undefined) {
            $scope.value.editable = true;
        }

        if($scope.value.deletable === undefined) {
            $scope.value.deletable = true;
        }
        //console.log('$scope.value.deletable', $scope.value.deletable);
        //console.log('root', myVars.ajaxQuery);

        // -- functions

        $scope.ctrls.push({
            submitForm : function(data) {
                var myData = [];
                for(var i=0; i<$scope.etData.length; i++) {
                    if(!$scope.etData[i].deleted) {

                        var item = {};
                        for(var j=0; j<returns.length; j++) {
                            var f = returns[j];
                            if(Array.isArray(f)) {
                                item[f[1]] = $scope.etData[i][f[0]];
                            } else {
                                item[f] = $scope.etData[i][f];
                            }
                        }
                        myData.push(item);
                    }
                }
                data[$scope.value.name] = myData;
                return data;
            }
        });

        $scope.calTotal = function () {
            $scope.total = 0;
            for(var i=0; i<$scope.etData.length; i++) {
                if($scope.etData[i].deleted) continue;
                var mul = 1;
                for(var j=0; j<$scope.value.multiply.length; j++) {
                    mul *= $scope.etData[i][$scope.value.multiply[j]];
                }
                $scope.total += mul;
                // to do : dynamic from total field equation
            }
        };

        $scope.ajaxDelete = function (rs) {
            if($scope.value.ajaxDelete) {
                $scope.mdConfirm('Confirmation', 'Are you sure?', {
                    confirm: function () {
                        apiService.deleteData('api/' + submitUrl + '/' + rs.id).success(function (result) {
                            //console.log('$scope.url.submit', $scope.url.submit);
                            if(result.status == 'error') {
                                $scope.mdAlert('Error!', result.message);
                                return;
                            }
                            rs.deleted = true;
                        });
                    }
                });
            } else {
                rs.deleted = !rs.deleted;
            }
        };

        $scope.addItem = function() {

            //var data = myVars.selectData;
            var data = $scope.selectData;
            if(!data) {
                alert('no data!');
                return;
            }

            //console.log('data[key]', data[key]);

            // duplicate check
            var item = {};
            if(key) {
                for(var i=0; i<$scope.etData.length; i++) {
                    if($scope.etData[i][key] == data[key]) {
                        alert('ข้อมูลซ้ำ: ' + key + ' = ' + data[key]);
                        return;
                    }
                }
                item[key] = data[key];
            }
            for(var i=0; i<fields.length; i++) {
                if($scope.isEditable(i)) {
                    if(!$scope.addData[fields[i].name]) {
                        alert('no '+fields[i].name);
                        return;
                    }
                    item[fields[i].name] = $scope.addData[fields[i].name];
                    $scope.addData[fields[i].name] = 0;
                } else {
                    item[fields[i].name] = data[fields[i].name];
                }
            }
            $scope.etData.push(item);
            $scope.calTotal();
        };

        // -- $scope.editable
        for(var i=0; i<fields.length; i++) {
            if(fields[i].editable) {
                $scope.editable.push({
                    id: i,
                    name: fields[i].name
                });
            }
            if(fields[i].key == true) {
                key = fields[i].name;
            }
        }

        $scope.isEditable = function(id) {
            for(var i=0; i< $scope.editable.length; i++) {
                if($scope.editable[i].id == id) return true;
                return false;
            }
        }

        $scope.calTotal();

    }).
    controller('InboxCtrl', function($scope, $rootScope, $location, $state, $stateParams, apiService,$element)
    {
        var $chat = jQuery($element),
            $chat_conv = $chat.find('.chat-conversation');

        $chat.find('.chat-inner').perfectScrollbar(); // perfect scrollbar for chat container
        $chat.find('.chat-inner').perfectScrollbar('update');
        $chat_conv.find('textarea').autosize();
        console.log('555', 555);


        // Chat Conversation Window (sample)
        $chat.on('click', '.chat-group a', function(ev)
        {
            ev.preventDefault();

            $chat_conv.toggleClass('is-open');

            if($chat_conv.is(':visible'))
            {

                console.log('in co;l');
                $chat.find('.chat-inner').perfectScrollbar('update');
                $chat_conv.find('textarea').autosize();
            }
        });

        $chat_conv.on('click', '.conversation-close', function(ev)
        {
            ev.preventDefault();

            $chat_conv.removeClass('is-open');
        });
    }).



    controller('dashboard', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {

    }).
    controller('genTable', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        // Nothing
    }).
    controller('genSelect', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        // -- Select
        $scope.onChange = function(name, url, value) {
            if(name) {
                console.log('genSelect - load', url);
                apiService.loadData2('/real_pos/public/api/'+url+value).success(function(result){
                    if(typeof result == 'string') {
                        $scope.val[name] = result;
                    } else {
                        $scope.data[name] = result;
                    }
                });
            }
        };
    }).
    controller('genFormController', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        // -- for child controller
        $scope.ctrls = [];
        $scope.ctrls2 = []; // for require only one - like purchase
        $scope.isnotification = false ;
        $scope.btn = {
            save: {
                caption: 'Save'
            }
        };

        // *** init

        var view = $scope.view;
        var summation = [];

        // -- Buttons

        if (view.buttons) {
            var buttons = view.buttons;
            for (var b in buttons) {
                var btn = buttons[b];
                console.log('btn', btn);
                $scope.btn[b] = btn;
            }
        }

        // -- form formatting
        for (var k in view.items) {

            var current = view.items[k];
            var elemName = current.name;

            if (current.label === undefined) {
                if (current.placeHolder) {
                    current.label = apiService.prettify(current.placeHolder);
                } else {
                    current.label = apiService.prettify(elemName);
                }
            }

            if (current.type === undefined) {
                current.type = 'text';
            } else if (current.type == 'select') { // to do - draglist too!
                if (!Array.isArray(current.model)) {
                    var mn = current.model;
                    current.model = [mn, 'id', 'name'];
                }
            } else if (current.type == 'draglist') {

                var list = $scope.data[current.model[0]];

                // for reference
                var ref = {};

                for (var c = 0; c < list.length; c++) {
                    list[c].selected = false;
                    ref[list[c].id] = c;
                    //$scope.val = $scope;
                    //console.log('dElem', list[c]);
                }

                // convert object to 1D array

                var vals = $scope.val[elemName];
                var temp = [];
                if (vals) {
                    for (var c = 0; c < vals.length; c++) {
                        temp.push(vals[c].id);
                        list[ref[vals[c].id]].selected = true;
                    }
                    $scope.val[elemName] = temp;
                }

                //console.log('ddd', $scope.val[elemName]);
                //$scope.val = $scope;
            }

            if (current.errorMessage === undefined) {
                current.errorMessage = 'This Field is Required!';
            }

            if (current.change === undefined) {
                current.change = [false, false];
            }

            // *** Required Label
            //console.log('match', current.name, current.validator, current.validator.match(/require/) )
            if (current.validator && current.validator.match(/required/)) {
                current.label = current.label + ' *';
                current.labelClass = 'required';
            }

            // *** Number
            if (current.type == 'number') {
                $scope.val[current.name] = parseFloat($scope.val[current.name]);
            }

            // *** Summation
            if (current.summation) {
                if (summation[current.summation] === undefined)
                    summation[current.summation] = [];
                summation[current.summation].push(current.name);
                //console.log('summation',current.summation) ;
            }

            // *** Dynamic Attributes
            current.attrs = [];
            if (current.validator) {
                current.attrs.push({attr: 'data-validate', value: current.validator});
                current.attrs.push({attr: 'data-message-required', value: current.errorMessage});
            }
            if (current.dataMask) {
                current.attrs.push({attr: 'data-mask', value: current.dataMask});
                current.attrs.push({attr: 'inputmask', value: ''});
            } else {
                //current.dataMask = '';
            }
            if (current.placeHolder) {
                current.attrs.push({attr: 'placeholder', value: current.placeHolder});
            }
            if (current.disabled) {
                current.attrs.push({attr: 'disabled', value: ''});
            }
            if ($scope.readonly) {
                current.attrs.push({attr: 'disabled', value: ''});
            }
        }

        //var summation = {};

        $scope.submitForm = function(submitData) {

            // already validated

            var ctrlCount = 0;
            ctrlCount = 0; // ** ctrl - purchase

            for(var i = 0; i < $scope.ctrls2.length; i++) {
                if($scope.ctrls2[i].submitForm) {
                    var res = $scope.ctrls2[i].submitForm(submitData);
                    if(res === false) {
                        return false;
                    }
                    ctrlCount += res;
                }
            }

            // ** ctrl - purchase

            if($scope.ctrls2.length) {
                $scope.alert.purchase = (ctrlCount == 0);
                if ($scope.alert.purchase) return false;
            }

            for(var i = 0; i < $scope.ctrls.length; i++) {
                if($scope.ctrls[i].submitForm) {
                    var res = $scope.ctrls[i].submitForm(submitData);
                    //console.log('res', res);
                    if(res === false) {
                        return false;
                    }
                    // ** ctrl - purchase
                    ctrlCount += res;
                }
            }

            // ** END ctrl - purchase

            console.log('submitData223', submitData);

            //return false;

            if($stateParams.id !== undefined) { // edit
                submitData['_method'] = 'PATCH';
                //console.log('submitDataPatch', submitData);
                apiService.editData(submitData, 'api/'+$scope.url.submit+'/'+$stateParams.id).success(function(result) {
                    if(result.status == 'error') {
                        $scope.mdAlert('Error!', result.message);
                    } else {

                        if(result.message.redirect) {
                            $location.path(result.message.redirect);
                        }else if(result.message.notification){
                            console.log('notification!' ,result.message.notification);
                        }else {
                            $location.path($scope.url.base);
                        }
                    }
                });
            } else { // create
                submitData['_method'] = 'POST';

                apiService.editData(submitData, 'api/'+$scope.url.submit).success(function(result) {
                    if(result.status == 'error') {
                        $scope.mdAlert('Error!', result.message);
                    } else {
                        if(result.message.redirect) {
                            $location.path(result.message.redirect);
                        }else if(result.message.notification){
                            console.log('notification!' ,result.message.notification);
                            $scope.notification = result.message.notification ;
                            $scope.val.notes = null ;
                            for(var key in $scope.val) {
                                delete  $scope.val[key] ;
                            }

                            $scope.val.cutomer_type_select = false;

                            new Countdown($scope).start();


                            //create a new event timer and start counting down

                        } else {
                            $location.path($scope.url.base);
                        }
                    }
                });
            }
        };

        function Countdown(scope) {
            var timer,
                instance = this ;

            function decrementCounter() {
                console.log(scope.seconds) ;
                if (scope.seconds === 0) {
                    instance.stop();
                    return;
                }
                scope.seconds--;
                if (scope.seconds === 0) {
                    console.log('in second === 0 ');
                    scope.isnotification = false;
                }
                scope.$apply(); //update the view bindings
            }

            this.start = function () {
                clearInterval(timer);
                scope.seconds = 3;
                scope.isnotification = true;
                timer = setInterval(decrementCounter, 1000);
            };

            this.stop = function () {
                clearInterval(timer);
            }
        }


        // -- Summation

        $scope.numChange = function (group) {
            $scope.val[group] = 0;
            for(var s in summation[group]) {
                if(!isNaN($scope.val[summation[group][s]]))
                    $scope.val[group] += $scope.val[summation[group][s]];
                //console.log('$scope.val[group]', $scope.val[group], group, summation[group][s]);
            }
            //console.log('$scope.val[group]', $scope.val[group], group,summation[group]);
        };

    }).
    controller('select2', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        //myVars.ajaxQuery = 'api/search/'+$scope.value.model;
    }).
    controller('genDatepicker', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        $scope.today = function() {
            $scope.dt = new Date();
        };
        $scope.today();

        $scope.clear = function () {
            $scope.dt = null;
        };

        // Disable weekend selection
        $scope.disabled = function(date, mode) {
            return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
        };

        $scope.toggleMin = function() {
            $scope.minDate = $scope.minDate ? null : new Date();
        };
        $scope.toggleMin();
        $scope.maxDate = new Date(2020, 5, 22);

        $scope.open = function($event) {
            $scope.status.opened = true;
        };

        $scope.setDate = function(year, month, day) {
            $scope.dt = new Date(year, month, day);
        };

        $scope.dateOptions = {
            formatYear: 'yy',
            startingDay: 1
        };

        $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
        $scope.format = $scope.formats[0];

        $scope.status = {
            opened: false
        };

        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        var afterTomorrow = new Date();
        afterTomorrow.setDate(tomorrow.getDate() + 2);
        $scope.events =
            [
                {
                    date: tomorrow,
                    status: 'full'
                },
                {
                    date: afterTomorrow,
                    status: 'partially'
                }
            ];

        $scope.getDayClass = function(date, mode) {
            if (mode === 'day') {
                var dayToCheck = new Date(date).setHours(0,0,0,0);

                for (var i=0;i<$scope.events.length;i++){
                    var currentDay = new Date($scope.events[i].date).setHours(0,0,0,0);

                    if (dayToCheck === currentDay) {
                        return $scope.events[i].status;
                    }
                }
            }

            return '';
        };
    }).
    controller('dragList', function($scope, $rootScope, $location, $state, $stateParams, apiService)
    {
        // -- Select
        $scope.dragChange = function(name, item) {
            if($scope.readonly) { return; }
            if(name) {
                item.selected = !item.selected;
                // update val
                var list = $scope.data[name];
                $scope.val[name] = [];
                for(var c = 0; c < list.length; c++) {
                    if(list[c].selected) {
                        $scope.val[name].push(list[c].id); // * id is to be changed
                    }
                }
                // console.log('name', $scope.val);
            }
        };
    });



