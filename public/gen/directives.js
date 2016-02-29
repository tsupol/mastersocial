
angular.module("gen.directives", []).

    directive('tablePagination', function(){

        return{
            restrict: 'E',
            template: '<ul class="pagination">'+
            '<li ><a href="javascript:void(0)" ng-click="currentPage == 1||getPosts(1)">&laquo;</a></li>'+
            '<li ><a href="javascript:void(0)" ng-click="currentPage == 1||getPosts(currentPage-1)">&lsaquo; Prev</a></li>'+
            '<li ng-repeat="i in range_bf"   ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getPosts(i)">{{i}}</a>'+
            '</li>'+
            '<li ng-repeat="i in range_cr"  ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getPosts(i)">{{i}}</a>'+
            '</li>'+
            '<li ng-repeat="i in range_af" ng-class="{active : currentPage == i}">'+
            '<a href="javascript:void(0)" ng-click="getPosts(i)">{{i}}</a>'+
            '</li>'+
            '<li ><a href="javascript:void(0)" ng-click="currentPage == totalPages||getPosts(currentPage+1)">Next &rsaquo;</a></li>'+
            '<li ><a href="javascript:void(0)" ng-click="currentPage == totalPages||getPosts(totalPages)">&raquo;</a></li>'+
            '</ul>'
        };
    }).
    directive('indexItems', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('index-items'),
        }
    }).
    directive('genForm', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('gen-form'),
            controller: 'genFormController'
        }
    }).
    directive('basicTable', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('basic-table'),
            controller: 'basicController'
        }
    }).
    directive('genTable', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('gen-table'),
            controller: 'genTable',
            link: function(scope, elm, attrs, ctrl) {

                scope.$on(
                    "$destroy",
                    function handleDestroyEvent() {
                        $('#'+scope.view.id).dataTable().fnDestroy();
                        //console.log( 'dddd' );
                    }
                );

                //console.log('22', scope.view);
                var dp = $(elm);
                dp.attr('id', scope.view.id);
                //console.log('dp', dp);
                //var th = '';
                var columns = [];
                var yad = [];
                var buttons = [];
                var serverSide = false;
                if(scope.view.serverSide !== undefined) serverSide = scope.view.serverSide;
                var order = [];

                // -- default order to first column DESC
                order[0] = [ 0, 'desc'];
                //console.log('Add New Click -> create url '+scope.view.createUrl);
                if(scope.view.createUrl) {
                    buttons = [{
                        text: 'Add New<i class="fa fa-plus btnIcon">',
                        action: function ( e, dt, node, config ) {
                            location.href = scope.view.createUrl;
                            console.log('--', e, dt, node, config);
                        },
                        className: 'btn-secondary'
                    }];
                }

                $.each(scope.view.fields , function(count, item) {
                    //th += '<th>' + item.label + '</th>';
                    var col = { title: item.label };
                    if(item.width) col.width = item.width;
                    columns.push(col);
                    if(item.filter) {
                        var ya = { column_number : count };
                        if(item.filter != 'select') ya.filter_type = item.filter;
                        else {
                            ya.select_type = 'select2'
                        }
                        yad.push(ya);
                    }
                });

                // -- tools

                columns.push({
                    "className": 'details-control',
                    "orderable": false,
                    "defaultContent": '',
                    //"width": (scope.view.tools && scope.view.tools.width) ? scope.view.tools.width : 'auto'
                });

                //dp.find('thead tr').append(th);
                //dp.find('tfoot tr').append(th);
                var dom = "<'row'<'col-sm-5'<'input-group'";
                if(scope.view.useFilter) dom += "f<'input-group-addon'<'glyphicon glyphicon-search'>>";
                dom += "B>><'col-sm-7'l>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>";
                $('#'+scope.view.id).dataTable({
                    //dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>"+
                    //"t"+
                    //"<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    dom: dom,
                    buttons: [
                        //'copy', 'excel', 'pdf', 'print'
                        buttons
                    ],
                    'oLanguage': {
                        'sSearch' : ''
                    },
                    order : order,
                    'createdRow': function ( row, data, index ) {
                        //$('td', row).last().addClass('highlight');
                        //console.log('data', data);
                        if ( data[data.length-1].match(/restore/)) {
                            //console.log('s', data[5]);
                            $(row).addClass('deleted');
                        }
                        //if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
                        var pro = scope.view.process;
                        for(var k in pro) {
                            if(pro[k].label) {
                                $('td', row).eq(k).html('<span class="label '+pro[k].label[data[k]]+'">'+data[k]+'</span>');
                            }
                        }

                        //}

                        // -- label

                    },
                    columns: columns,
                    aLengthMenu: [
                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                    ],
                    "processing": serverSide,
                    "serverSide": serverSide,
                    "ajax": {
                        "url": scope.view.ajaxUrl,
                        "type": "GET"
                    }
                }).yadcf(yad);


                //var elems = document.getElementsByClassName('confirmation');
                //var confirmIt = function (e) {
                //    if (!confirm('Are you sure?')) e.preventDefault();
                //};
                //for (var i = 0, l = elems.length; i < l; i++) {
                //    elems[i].addEventListener('click', confirmIt, false);
                //}
            }
        }
    }).
    directive('editTable', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('edit-table'),
            controller: 'editTable',
            link: function(scope, elm, attrs, ctrl) {
                var dp = $(elm).find('.etSelect');

                //console.log('dp', dp, scope.value.model);

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
    }).
    directive('genSelect', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('gen-select'),
            controller: 'genSelect',
            link: function(scope, elm, attrs, ctrl) {
                var dp = $(elm).find('select');
                setTimeout( function() {
                    if(scope.readonly) {}
                    dp.select2({
                        placeholder: '-- Please Select --',
                        allowClear: true,
                        minimumResultsForSearch: 5,
                    }).on("select2-selecting", function(e) {
                        console.log('e', e.object);
                        var onSelect = scope.value.onSelect;
                        //console.log('scope.value',scope.value);
                        //console.log('onSelect', onSelect);
                        //console.log('db',dp);
                        if(onSelect) {
                            if(onSelect.data) {
                                //console.log('scope.value.name',scope.value.name , 'scope.val' , scope.val[scope.value.name] );
                                var query = '?q='+scope.data[scope.value.name][e.object.id].id;
                                if(onSelect.data.params) {
                                    for(var p in onSelect.data.params) {
                                        query += '&'+onSelect.data.params[p][0]+'='+onSelect.data.params[p][1];
                                    }
                                }
                                $.ajax(onSelect.data.url+query, {
                                    dataType: "json"
                                }).done(function(data) {
                                    scope.$apply(function() { // Apply cause it is outside angularjs
                                        //console.log('name : ',onSelect.data.name ,data);
                                        if(onSelect.data.type && onSelect.data.type == 'val') {
                                           scope.val[onSelect.data.name] = data;
                                        } else {
                                            scope.data[onSelect.data.name] = data;
                                        }
                                        //ctrl.$setViewValue(dateText); // Set new value of datepicker to scope
                                    });
                                });
                            }
                        }
                        scope.$apply(function() { // Apply cause it is outside angularjs
                            scope.val[scope.value.name] = e.object.id;
                            //ctrl.$setViewValue(dateText); // Set new value of datepicker to scope
                        });
                        //myVars.selectData = e.object;
                    });
                }, 500) ;



                //setTimeout( dp.val(scope.val[scope.value.name]), 1000) ;
                //
                //setTimeout( function() {
                //    dp.val(scope.val[scope.value.name]);
                //}, 1000) ;
                //
                //dp.val(scope.val[scope.value.name]);

            }
        }
    }).
    directive('select2', function(){
        return {
            restrict: 'A',
            //replace: true,
            //template: 'select2',
            link: function(scope, elm) {
                var dp = $(elm);
                if(scope.readonly) {
                    //dp.after('<input type="text" value="'+scope.val[scope.value.name]+'" class="form-control">');
                    //return;
                }
                //console.log('dp', dp, scope.value.model);
                dp.select2({
                    minimumInputLength: 1,
                    placeholder: 'Search',
                    ajax: {
                        url: function () {
                            //return myVars['ajaxQuery'];
                            return scope.value.url;
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

                            //if($scope.value.child_model) {
                            //    return {
                            //        results: data.data
                            //    }
                            //}
                            return { results: data }
                        }
                    },
                    initSelection: function (element, callback) {
                        $.ajax(scope.value.url+'?id='+scope.val[scope.value.name], {
                            dataType: "json"
                        }).done(function(data) {
                            //console.log('dddon', data);
                            callback(data[0]);
                        });
                    },
                    formatResult: function(student) {
                        return "<div class='select2-user-result'>" + student.name + "</div>";
                    },
                    formatSelection: function(student) {
                        return  student.name;
                    }

                }).on("select2-selecting", function(e) {
                    console.log(e);
                    var onSelect = scope.value.onSelect;

                    if(onSelect) {
                        if (onSelect.data) {
                            $.ajax(onSelect.data.url + '?q=' + e.val, {
                                dataType: "json"
                            }).done(function (data) {
                                scope.$apply(function () { // Apply cause it is outside angularjs
                                    //console.log('name : ',onSelect.data.name ,data);
                                    if (onSelect.data.type && onSelect.data.type == 'val') {
                                        scope.val[onSelect.data.name] = data;
                                    } else {
                                        scope.data[onSelect.data.name] = data;
                                    }
                                    //ctrl.$setViewValue(dateText); // Set new value of datepicker to scope
                                });

                            });
                        }
                    }
                    scope.$apply(function() { // Apply cause it is outside angularjs
                        scope.val[scope.value.name] = e.object.id;
                        //ctrl.$setViewValue(dateText); // Set new value of datepicker to scope
                    });
                    //myVars.selectData = e.object;
                });
            }
        }
    }).
    directive('dropzone', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('dropzone'),
            link: function(scope, elm, attrs, ctrl) {
                var dp = $(elm);
                if(scope.readonly) {
                    //dp.after('<input type="text" value="'+scope.val[scope.value.name]+'" class="form-control">');
                    //return;
                }
                var i = 1,
                    $example_dropzone_filetable = dp.find("table"),
                    example_dropzone = dp.find("div.droppable-area").dropzone({
                        url: attrs.url ,

                        maxFiles: 1 ,
                        maxfilesexceeded: function(file) {
                            this.removeAllFiles();
                            this.addFile(file);
                        },

                        // Events
                        addedfile: function(file)
                        {
                            if(i == 1)
                            {
                                $example_dropzone_filetable.find('tbody').html('');
                            }

                            var size = parseInt(file.size/1024, 10);
                            size = size < 1024 ? (size + " KB") : (parseInt(size/1024, 10) + " MB");

                            var $entry = $('<tr>\
                                    <td class="text-center">'+(i++)+'</td>\
                                    <td>'+file.name+'</td>\
                                    <td><div class="progress progress-striped"><div class="progress-bar progress-bar-warning"></div></div></td>\
                                    <td>'+size+'</td>\
                                    <td>Uploading...</td>\
                                </tr>');

                            $example_dropzone_filetable.find('tbody').append($entry);
                            file.fileEntryTd = $entry;
                            file.progressBar = $entry.find('.progress-bar');

                            scope.$apply(function() {
                                scope.val[scope.value.name] = file.name;
                            });
                        },

                        sending: function(file, xhr, formData) {
                            console.log('scope',scope);
                            console.log('attrs.csrf_token',attrs.token);
                            // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
                            formData.append("_token", attrs.token ); // Laravel expect the token post value to be named _token by default
                        },

                        uploadprogress: function(file, progress, bytesSent)
                        {
                            file.progressBar.width(progress + '%');
                        },

                        success: function(file,response)
                        {
                            console.log('success',response);
                            file.fileEntryTd.find('td:last').html('<span class="text-success">Uploaded</span>');
                            file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-success');
                            scope.$apply(function() {
                                scope.val[attrs.modelname] = response.img_url;



                            });
                        },

                        error: function(file)
                        {
                            file.fileEntryTd.find('td:last').html('<span class="text-danger">Failed</span>');
                            file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-red');
                        }
                    });
                //    .on("maxfilesexceeded", function(file)
                //{
                //    //this.removeAllFiles();
                //    //this.addFile(file);
                //});
            }
        }
    }).

    directive('autoComplete', function(){
        return {
            restrict: 'A',
            //replace: true,
            //template: 'select2',
            link: function(scope, elm, attrs, ctrl) {
                var me = $(elm);
                var bh = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: 'api',
                        replace: function (url, query) {
                            if (me.attr('data-url')) {
                                //url = me.attr('data-url')+encodeURIComponent($('#'+me.attr('data-param')).val());
                                url = me.attr('data-url') + '?q=' + encodeURIComponent(me.val());
                            }
                            return url;
                        }
                    }
                });

                bh.initialize();

                me.typeahead({
                    hint: true,
                    minLength: 1,
                    highlight: true
                }, {
                    name: 'string-randomizer',
                    displayKey: 'value',
                    source: bh.ttAdapter()
                }).on('typeahead:selected', function() {
                    scope.$apply(function() {
                        scope.val[scope.value.name] = me.val();
                    });
                });
            }
        }
    }).
    directive('dragList', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('drag-list'),
            controller: 'dragList'
        }
    }).
    directive('genDatepick', function(){
        return {
            restrict: 'A',
            //replace: true,
            //templateUrl: appHelper.genTemplatePath('gen-datepick'),
            //controller: 'genDatepicker',
            link: function(scope, elm, attrs, ctrl) {
                var me = $(elm);
                me.val(scope.val.birth_date);
                console.log('me.val()', me.val());
                if(scope.val.birth_date) {
                    //console.log('444', 444);
                    me.data("date", scope.val.birth_date);
                } else {
                    //console.log('555', 555);
                    me.data("start-view", 2);
                }
                //console.log('me.data("date")', me.data("date"));
                //setInterval(function(){ console.log('me.data("date") 2', me.data("date"));}, 1000);

                //me.datepicker({
                //}).on('changeDate', function(ev){
                //    console.log('ev', ev);
                //    scope.$apply(function() {
                //        scope.val[scope.value.name] = me.val();
                //    });
                //});

            }
        }
    }).

    // -- http://stackoverflow.com/questions/15072152/input-model-changes-from-integer-to-string-when-changed

    directive('integer', function(){
        return {
            require: 'ngModel',
            link: function(scope, ele, attr, ctrl){
                ctrl.$parsers.unshift(function(viewValue){
                    return parseInt(viewValue, 10);
                });
            }
        };
    }).
    directive('backButton', function(){
        return {
            restrict: 'A',

            link: function(scope, element, attrs) {
                element.bind('click', goBack);

                function goBack() {
                    history.back();
                    scope.$apply();
                }
            }
        }
    }).
    directive('charter', function(){
        return {
            restrict: 'E',
            replace: true,
            templateUrl: appHelper.genTemplatePath('charter'),
            controller: 'charter',
            link: function(scope, ele, attr, ctrl){
                scope.$apply(function() {
                    var dataSource = [
                        { year: 1950, europe: 546, americas: 332, africa: 227 },
                        { year: 1960, europe: 705, americas: 417, africa: 283 },
                        { year: 1970, europe: 856, americas: 513, africa: 361 },
                        { year: 1980, europe: 1294, americas: 614, africa: 471 },
                        { year: 1990, europe: 321, americas: 721, africa: 623 },
                        { year: 2000, europe: 730, americas: 1836, africa: 1297 },
                        { year: 2010, europe: 728, americas: 935, africa: 982 },
                        { year: 2020, europe: 721, americas: 1027, africa: 1189 },
                        { year: 2030, europe: 704, americas: 1110, africa: 1416 },
                        { year: 2040, europe: 680, americas: 1178, africa: 1665 },
                        { year: 2050, europe: 650, americas: 1231, africa: 1937 }
                    ];

                    $("#bar-3").dxChart({
                        dataSource: dataSource,
                        commonSeriesSettings: {
                            argumentField: "year"
                        },
                        series: [
                            { valueField: "europe", name: "Europe", color: "#40bbea" },
                            { valueField: "americas", name: "Americas", color: "#cc3f44" },
                            { valueField: "africa", name: "Africa", color: "#8dc63f" }
                        ],
                        argumentAxis:{
                            grid:{
                                visible: true
                            }
                        },
                        tooltip:{
                            enabled: true
                        },
                        title: "Historic, Current and Future Population Trends",
                        legend: {
                            verticalAlignment: "bottom",
                            horizontalAlignment: "center"
                        },
                        commonPaneSettings: {
                            border:{
                                visible: true,
                                right: false
                            }
                        }
                    });
                });
            }
        };
    }).
    //directive('tab', function(){
    //    return {
    //        restrict: 'E',
    //        link: function(scope, ele, attr, ctrl){
    //            scope.$apply(function() {
    //                scope.active = scope.view.active;
    //            });
    //        }
    //    };
    //}).
    directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind('change', function(){

                    console.log("filename" ,element[0].files[0]);

                    scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]).
    directive('uploadfile', function () {
        return {
            restrict: 'A',
            link: function(scope, element) {

                element.bind('click', function(e) {
                    angular.element(e.target).siblings('#upload').trigger('click');
                });
            }
        };
    }).
    directive('checkImage', function($http,$q) {
        return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                attrs.$observe('src', function(ngSrc) {
                    isImage(ngSrc).then(function(test) {

                        if(!test) {
                            element.hide();
                        }
                    });

                    function isImage(src) {
                        var deferred = $q.defer();
                        var image = new Image();
                        image.onerror = function() {
                            deferred.resolve(false);
                        };
                        image.onload = function() {
                            deferred.resolve(true);
                        };
                        image.src = src;
                        return deferred.promise;
                    }

                });
            }
        };
    }).
    directive('semiTags', function(){
        return {
            require: 'ngModel',
            restrict: 'EA',
            link: function(scope, elm, attrs, ctrl) {
                var dp = $(elm);
                var bh = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: 'api',
                        replace: function (url, query) {
                            console.log('5554',query);



                            url = dp.attr('data-url') + '?q=' + encodeURIComponent(query);

                           // url = 'http://localhost/mastersocial/public/api/search/tags' + '?q=' + encodeURIComponent(dp.val());

                            return url;
                        }
                    }
                });

                bh.initialize();

                dp.tagsinput({
                    itemValue: 'id',
                    itemText: 'name',
                    typeaheadjs: {
                        name: 'bh',
                        displayKey: 'name',
                        source: bh.ttAdapter()
                    }
                });
            }
        }
    }).

    directive('pokTaginput', function(){
        return {
            restrict: 'A',
            //replace: true,
            //template: 'select2',
            link: function(scope, elm, attrs, ctrl) {
                var me = $(elm);
                me.tagsinput({
                    itemValue: 'id',
                    itemText: 'name',

                });

                me.tagsinput('add', { "id": 1 , "name": "Amsterdam"  });
                me.tagsinput('add', { "id": 2 , "name": "Washington" });

                //var bh = new Bloodhound({
                //    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                //    queryTokenizer: Bloodhound.tokenizers.whitespace,
                //    remote: {
                //        url: 'api',
                //        replace: function (url, query) {
                //            if (me.attr('data-url')) {
                //                //url = me.attr('data-url')+encodeURIComponent($('#'+me.attr('data-param')).val());
                //                url = me.attr('data-url') + '?q=' + encodeURIComponent(me.val());
                //            }
                //            return url;
                //        }
                //    }
                //});
                //
                //bh.initialize();
                //
                //me.typeahead({
                //    hint: true,
                //    minLength: 1,
                //    highlight: true
                //}, {
                //    name: 'string-randomizer',
                //    displayKey: 'value',
                //    source: bh.ttAdapter()
                //}).on('typeahead:selected', function() {
                //    scope.$apply(function() {
                //        scope.val[scope.value.name] = me.val();
                //    });
                //});
            }
        }
    }).



    // fix jQuery Plugins early load - delay

    directive('genFormElement', function() {
        return function(scope, element, attrs) {
            if (scope.$last){
                if($.isFunction($.fn.validate)) {
                    //console.log('lasst', scope.$last);
                    setTimeout(function(){
                        window.genReady();
                    }, 1000);
                }
            }
        };
    });