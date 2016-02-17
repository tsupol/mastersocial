
angular.module("gen.factory", []).
    factory("apiService", ["$http",
        function ($http) {
            var fac = {};

            // Rest API

            fac.loadData = function(url) {
                //console.log('url-loadData', url);
                return $http.get("api/"+url);
            };

            fac.loadData2 = function(url) {

                //console.log('url2', url);
                return $http.get(url);
            };

            fac.createData = function(obj,url){
                console.log('obj', obj);
                return $http({
                    method: 'POST',
                    url: url,
                    data: obj
                });
            };

            fac.editData = function(obj,url){
                console.log('edit', obj, url);
                return $http.post(url,_.extend({}, obj));
            };

            fac.deleteData = function(url){
                console.log('fn deleteData',url);
                return $http({url: url,method: 'DELETE'});
            };

            fac.restoreData = function(url){
                return $http({url: url,method: 'DELETE'});
            };




            //fac.searchData = function(url,obj){
            //    console.log("search url : ",url, "OBJ : " ,obj) ;
            //    return $http.get(url+"/search/"+obj);
            //};

            // Helpers
            //fac.prettify = function(str) {
            //    return str.replace(/(-|^)([^-]?)/g, function(_, prep, letter) {
            //        return (prep && ' ') + letter.toUpperCase();
            //    });
            //};

            fac.prettify = function humanize(str) {
                var frags = str.split('_');
                for (var i=0; i<frags.length; i++) {
                    frags[i] = frags[i].charAt(0).toUpperCase() + frags[i].slice(1);
                }
                return frags.join(' ');
            }

            return fac;
        }]
);