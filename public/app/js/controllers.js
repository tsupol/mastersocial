'use strict';

angular.module('xenon.controllers', []).
    controller('LoginCtrl', function ($scope, $rootScope) {
        $rootScope.isLoginPage = true;
        $rootScope.isLightLoginPage = false;
        $rootScope.isLockscreenPage = false;
        $rootScope.isMainPage = false;
    }).
    controller('LoginLightCtrl', function ($scope, $rootScope) {
        $rootScope.isLoginPage = true;
        $rootScope.isLightLoginPage = true;
        $rootScope.isLockscreenPage = false;
        $rootScope.isMainPage = false;
    }).
    controller('LockscreenCtrl', function ($scope, $rootScope) {
        $rootScope.isLoginPage = false;
        $rootScope.isLightLoginPage = false;
        $rootScope.isLockscreenPage = true;
        $rootScope.isMainPage = false;
    }).
    controller('MainCtrl', function ($scope, $rootScope, $location, $layout, $layoutToggles, $pageLoadingBar, Fullscreen) {
        // -- my parameters (pok)
        $rootScope.params = window.params;

        $rootScope.isLoginPage = false;
        $rootScope.isLightLoginPage = false;
        $rootScope.isLockscreenPage = false;
        $rootScope.isMainPage = true;

        $rootScope.layoutOptions = {
            horizontalMenu: {
                isVisible: false,
                isFixed: true,
                minimal: false,
                clickToExpand: false,

                isMenuOpenMobile: false
            },
            sidebar: {
                isVisible: true,
                isCollapsed: false,
                toggleOthers: true,
                isFixed: true,
                isRight: false,

                isMenuOpenMobile: false,

                // Added in v1.3
                userProfile: true
            },
            chat: {
                isOpen: false,
            },
            settingsPane: {
                isOpen: false,
                useAnimation: true
            },
            container: {
                isBoxed: false
            },
            skins: {
                sidebarMenu: '',
                horizontalMenu: '',
                userInfoNavbar: ''
            },
            pageTitles: true,
            userInfoNavVisible: false
        };

        $layout.loadOptionsFromCookies(); // remove this line if you don't want to support cookies that remember layout changes


        $scope.updatePsScrollbars = function () {
            var $scrollbars = jQuery(".ps-scrollbar:visible");

            $scrollbars.each(function (i, el) {
                if (typeof jQuery(el).data('perfectScrollbar') == 'undefined') {
                    jQuery(el).perfectScrollbar();
                }
                else {
                    jQuery(el).perfectScrollbar('update');
                }
            })
        };


        // Define Public Vars
        public_vars.$body = jQuery("body");


        // Init Layout Toggles
        $layoutToggles.initToggles();


        // Other methods
        $scope.setFocusOnSearchField = function () {
            public_vars.$body.find('.search-form input[name="s"]').focus();

            setTimeout(function () {
                public_vars.$body.find('.search-form input[name="s"]').focus()
            }, 100);
        };


        // Watch changes to replace checkboxes
        $scope.$watch(function () {
            cbr_replace();
        });

        // Watch sidebar status to remove the psScrollbar
        $rootScope.$watch('layoutOptions.sidebar.isCollapsed', function (newValue, oldValue) {
            if (newValue != oldValue) {
                if (newValue == true) {
                    public_vars.$sidebarMenu.find('.sidebar-menu-inner').perfectScrollbar('destroy')
                }
                else {
                    public_vars.$sidebarMenu.find('.sidebar-menu-inner').perfectScrollbar({wheelPropagation: public_vars.wheelPropagation});
                }
            }
        });


        // Page Loading Progress (remove/comment this line to disable it)
        $pageLoadingBar.init();

        $scope.showLoadingBar = showLoadingBar;
        $scope.hideLoadingBar = hideLoadingBar;


        // Set Scroll to 0 When page is changed
        $rootScope.$on('$stateChangeStart', function () {
            var obj = {pos: jQuery(window).scrollTop()};

            TweenLite.to(obj, .25, {
                pos: 0, ease: Power4.easeOut, onUpdate: function () {
                    $(window).scrollTop(obj.pos);
                }
            });
        });


        // Full screen feature added in v1.3
        $scope.isFullscreenSupported = Fullscreen.isSupported();
        $scope.isFullscreen = Fullscreen.isEnabled() ? true : false;

        $scope.goFullscreen = function () {
            if (Fullscreen.isEnabled()){
                Fullscreen.cancel();
            } else{
                Fullscreen.all();
            }
            $scope.isFullscreen = Fullscreen.isEnabled() ? true : false;
        }

    }).
    controller('SidebarMenuCtrl', function ($scope, $rootScope, $menuItems, $timeout, $location, $state) {

        // Menu Items
        var $sidebarMenuItems = $menuItems.instantiate();

        $scope.menuItems = $sidebarMenuItems.prepareSidebarMenu().getAll();

        // Set Active Menu Item
        $sidebarMenuItems.setActive($location.path());

        $rootScope.$on('$stateChangeSuccess', function () {
            $sidebarMenuItems.setActive($state.current.name);
        });

        // Trigger menu setup
        public_vars.$sidebarMenu = public_vars.$body.find('.sidebar-menu');
        $timeout(setup_sidebar_menu, 1);

        ps_init(); // perfect scrollbar for sidebar
    }).
    controller('HorizontalMenuCtrl', function ($scope, $rootScope, $menuItems, $timeout, $location, $state) {
        var $horizontalMenuItems = $menuItems.instantiate();

        $scope.menuItems = $horizontalMenuItems.prepareHorizontalMenu().getAll();

        // Set Active Menu Item
        $horizontalMenuItems.setActive($location.path());

        $rootScope.$on('$stateChangeSuccess', function () {
            $horizontalMenuItems.setActive($state.current.name);

            $(".navbar.horizontal-menu .navbar-nav .hover").removeClass('hover'); // Close Submenus when item is selected
        });

        // Trigger menu setup
        $timeout(setup_horizontal_menu, 1);
    }).
    controller('SettingsPaneCtrl', function ($rootScope, $scope) {

        // Define Settings Pane Public Variable
        public_vars.$settingsPane = public_vars.$body.find('.settings-pane');
        public_vars.$settingsPaneIn = public_vars.$settingsPane.find('.settings-pane-inner');
    }).
    controller('ChatCtrl', function ($scope, $element, $interval, $http, $location) {
        //console.log('$location.path', $location.path());
        var $chat = jQuery($element),
            $chat_conv = $chat.find('.chat-conversation');
        $chat.find('.chat-inner').perfectScrollbar(); // perfect scrollbar for chat container

        var promise;
        $scope.init = function () {
            loadInbox();
            promise = $interval(loadInbox, 10000);
        };
        $scope.init();
        function loadInbox() {
            $http.get('api/facebook/inbox').success(function (data) {
                $scope.posts = data;
                //console.log('data',data);
                //var data_append ='<strong>Favorites</strong>' ;
                //for (var i in data){
                //	data_append +=  '<a href="" ng-click="chat_log('+data[i].id+')"><span class="user-status is-online" ></span> <em>'+data[i].name+'</em></a>' ;
                //}
                //jQuery('.chat-inner >.chat-group').html(data_append);
                $scope.chat_list = data;
            });
        };
        //$scope.chat_list = [{
        //    status: 1,
        //    name: 'Tab Lnw',
        //    id: "t_mid.1453826395510:58e72fa4db22012854"
        //}, {
        //    status: 0,
        //    name: "Komsan Krasaesin",
        //    id: "t_mid.1453826055296:6726c8564763d76e99"
        //}];
        $scope.chat_log = function (id) {

            console.log('id', id);
            $location.path('app/facebooks/conversation/' + id);

        };
    }).
    controller('Conversation', function ($scope, $element, $interval, $http, $location, $rootScope, $state, $stateParams) {
        //console.log('lasted_mid',$scope.val.lasted_mid);

        $scope.owner_page = window.params.FB_PAGE_ID;

        $scope.picture = '';
        $scope.ValidatereplyMessage = function () {
            var file = $scope.myFile;
            console.log('file is ');
            console.dir(file);
            if(file!=undefined){
                var uploadUrl = "api/fileupload";
                var fd = new FormData();
                fd.append('file', file);
                $http.post(uploadUrl, fd, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined}
                })
                    .success(function (data) {
                        console.log(data.img_url);

                        $scope.picture = "http://enjoy.pantip.com" + data.img_url ;

                        $scope.replyMessage();
                    })

                    .error(function () {
                    });
            }else{
                $scope.replyMessage();
            }
        };



        $scope.replyMessage = function () {
            var id = $scope.val.tid;
            var replyMessage = $scope.replyinbox;
            var picture = $scope.picture ;


            console.log('replyMessage : ', replyMessage);
            console.log('picture : ', picture);

            $http.post('api/facebook/inboxreply', {id: id, replyMessage: replyMessage,picture:picture }).success(function (data) {
                console.log('reply : ', data);
                if (data.status == "success") {
                    $scope.replyinbox = '';
                    $scope.replyinbox = '';
                }
                $scope.replyinbox = '';
                $scope.picture = '';
            });
        };




        $scope.showModal = false;
        $scope.openSaveReply = function () {
            //var id = $scope.val.tid ;
            //var replyMessage = $scope.replyinbox;
            //console.log('replyMessage : ',replyMessage);
            //$http.post('api/facebook/inboxreply',{id:id ,replyMessage :replyMessage }).success(function(data) {
            //
            //});

            console.log('Open Box');
            $scope.showModal = !$scope.showModal;


            //$(element).modal('show');


        };


        var message;
        $scope.start = function () {
            $scope.stop();
            message = $interval(loadMessage, 5000);
        };

        $scope.stop = function () {
            $interval.cancel(message);
        };
        $scope.start();
        $scope.$on('$destroy', function () {
            $scope.stop();
        });

        //$scope.cities = [
        //	{ "id": 1, "name": "Amsterdam", "continent": "Europe" },
        //	{ "id": 4, "name": "Washington", "continent": "America" },
        //	{ "id": 7, "name": "Sydney", "continent": "Australia" },
        //	{ "id": 10, "name": "Beijing", "continent": "Asia" },
        //	{ "id": 13, "name": "Cairo", "continent": "Africa" }
        //];
        //$scope.queryCities = function () {
        //
        //	var data = $http.get('api/search/tags') ;
        //	console.log('get Tag :',data);
        //
        //	return $http.get('api/table/tags');
        //	//return $http.get('cities.json');
        //};
        $scope.showModal = false;
        $scope.toggleModal = function () {
            $scope.showModal = !$scope.showModal;
        };

        $rootScope.keyPress = function (e, val) {
            $http.post('api/search/patterns', {stext: val}).success(function (data) {
                console.log('data', data);
                $rootScope.pattern = data;
            });
        };

        $rootScope.setreply = function (desc) {
            $scope.replyinbox = desc;
        };

        //init() ;

        $scope.reloadPage = function () {
            $state.transitionTo($state.current, $stateParams, {reload: true, inherit: false, notify: true});
        };

        $scope.uploadFile = function () {


        };

        $scope.setStatus = function (id) {
            console.log('status id : ', id);
            console.log('mid', $scope.val.lasted_mid);
            $http.post('api/facebook/status', {mid: $scope.val.lasted_mid, status: id}).success(function (data) {
                console.log('data', data);
                if (data.status == "success") {
                    alert("Set Status Success!!!");
                    $scope.reloadPage();
                } else {
                    alert("Can not Set Status!!!");
                }

            });
        };

        $scope.setTag = function (settag) {
            console.log('cities', $scope.cities);
            console.log('tid', $scope.val.tid);
            console.log('mid', $scope.val.lasted_mid);
            console.log('tag', settag);
            console.log('data', $scope.data != undefined);
            var section_id = 0;
            if ($scope.val.section_id != undefined) {
                section_id = $scope.val.section_id;
            }
            $http.post('api/facebook/sessiontag', {
                tid: $scope.val.tid,
                tags: settag,
                section_id: section_id
            }).success(function (data) {
                console.log('data', data);
                $scope.reloadPage();


            });
        };


        function loadMessage() {
            var id = $scope.val.tid;
            //console.log('update_time', $scope.val.update_time);
            //var lasttime = Date.parse($scope.val.update_time)/1000 ;
            var lasttime = $scope.val.update_time;
            if ($scope.val.section_id != undefined) {
                return false;     // ---  if stay in Close Chat Log
            }

            console.log('since : ', lasttime);
            $http.post('api/facebook/inboxmessage', {id: id, since: lasttime}).success(function (data) {
                console.log('data', data);
                console.log('data.length', data.length);
                if (data.length != 0) {
                    for (var i in data) {
                        $scope.val.message.push(data[i]);
                    }
                    console.log('update_time', data[0].chat_at);
                    console.log('lasted_mid', data[0].mid);
                    $scope.val.update_time = data[0].chat_at;
                    $scope.val.lasted_mid = data[0].mid;
                }
            });
        };


    }).


    controller('facebook', function ($scope, $window, $element, $interval, $http, $state, $stateParams) {
        $scope.schedule = true;
        $scope.preloader = false;
        var PAGE_ID = window.params.FB_PAGE_ID;
        var FB_APP_ID = '175384656159057';


        $window.fbAsyncInit = function () {
            FB.init({
                appId: FB_APP_ID,
                status: true,
                cookie: true,
                xfbml: true,
                version: 'v2.5'
            });
        };

        (function (d) {
            // load the Facebook javascript SDK

            var js,
                id = 'facebook-jssdk',
                ref = d.getElementsByTagName('script')[0];

            if (d.getElementById(id)) {
                return;
            }

            js = d.createElement('script');
            js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";

            ref.parentNode.insertBefore(js, ref);

        }(document));


        $scope.submitForm = function () {


            $scope.unix_fb_date = '';
            $scope.published = true;


            console.log('$scope.fb', $scope.fb);

            if ($scope.fb === undefined) {
                console.log('insert data');
                return false;
            }

            if ($scope.fb.datepicker !== undefined) {
                console.log('$scope.fb.datepicker', $scope.fb.datepicker);
                var fb_scheduled_time = $scope.fb.datepicker + ' ' + $scope.fb.timepicker;
                $scope.unix_fb_date = Date.parse(fb_scheduled_time + "+0700") / 1000;
                $scope.published = false;
            }

            //save_post_id('919082208176684_938308306254074','test123');
            //share();
            //
            console.log('$scope.fb.picture', $scope.val.imgs);

            //        var upload_url = $("#upload_url").val() ; var upload_img = "" ;
            if ($scope.val.imgs !== undefined) {
                $scope.fb.picture = "http://enjoy.pantip.com" + $scope.val.imgs;
            }
            //
            console.log('fb_scheduled_time ', fb_scheduled_time);
            console.log('unix_fb_date ', $scope.unix_fb_date);
            console.log('$scope.fb.picture', $scope.fb.picture);

            // save_post_id('919082208176684_940878629330375','test123');
            // save_post_id('919082208176684_938308306254074','test123');
            $scope.preloader = true;
            share();


        };


        function share() {
            console.log('in share');
            FB.login(function (response) {
                if (response.authResponse != null && response.authResponse != undefined) {
                    FB.getLoginStatus(function (response) {
                        if (response.status === 'connected') {
                            console.log(response);
                            var uid = response.authResponse.userID;
                            var accessToken = response.authResponse.accessToken;
                            FB.api(
                                '/me/accounts',
                                'GET',
                                function (response) {
                                    var rs_data = response.data;
                                    var status_not_perm = false;
                                    for (var i = 0; i < rs_data.length; i++) {
                                        if (rs_data[i].id == PAGE_ID) {
                                            for (var s = 0; s < rs_data[i].perms.length; s++) {
                                                if (rs_data[i].perms[s] == "CREATE_CONTENT") {
                                                    status_not_perm = true;
                                                    $scope.PAGE_ACCESSTOKEN = rs_data[i].access_token;


                                                    if ($scope.fb.hasphotos) {
                                                        var to = PAGE_ID + '/photos?access_token=' + $scope.PAGE_ACCESSTOKEN;
                                                        photos(to);
                                                    } else {
                                                        var tourl = PAGE_ID + '/feed?access_token=' + $scope.PAGE_ACCESSTOKEN;
                                                        post(tourl);
                                                    }


                                                }
                                            }
                                        }
                                    }
                                    if (!status_not_perm) {
                                        $('.fb_data').html('¤Ø³äÁèÁÕ permission ÊÓËÃÑºâ¾Ê·Õèá¿¹à¾¨¹Õé¤èÐ');
                                        $('#list_popup').modal('toggle');
                                        $('#loading').hide();
                                        $('#sharebox').modal('hide');
                                    }
                                }
                            );
                        }
                    });
                }
            }, {scope: 'manage_pages,publish_pages'});
        }

        function photos(to) {
            console.log('$scope.fb.picture', $scope.fb.picture);
            $scope.fb.picture = "http://manuthailand.com/wp-content/uploads/2015/12/manchester-united-football-club.jpg" ;
            FB.api(
                to,
                'POST',
                {
                    "url": $scope.fb.picture,
                    "caption": $scope.fb.message,
                    "published": $scope.published,
                    "scheduled_publish_time": $scope.unix_fb_date
                },
                function (response) {
                    console.log('photos response :', response);
                    var POST_ID = response.id ;
                    if($scope.unix_fb_date!=""){
                         POST_ID = PAGE_ID + '_' + response.id ;
                    }
                    if (response && !response.error) {
                        save_post_id( POST_ID , $scope.PAGE_ACCESSTOKEN);
                    }else{
                        dialog.close();
                    }
                }
            );
        }
        function post(to) {
            console.log('$scope.fb.link', $scope.fb.link);
            if ($scope.fb.link === undefined) {
                $scope.fb.picture = null;
            }
            $scope.fb.picture = "http://manuthailand.com/wp-content/uploads/2015/12/manchester-united-football-club.jpg" ;
            FB.api(to, 'post',
                {
                    "name": $scope.fb.name,
                    "link": $scope.fb.link,
                    "picture": $scope.fb.picture,
                    "message": $scope.fb.message,
                    "scheduled_publish_time": $scope.unix_fb_date,
                    "published": $scope.published
                },
                function (response) {
                    console.log('share response :', response);
                    if (response && !response.error) {
                        save_post_id(response.id, $scope.PAGE_ACCESSTOKEN);

                    } else {
                        dialog.close();
                    }
                });
        }

        function save_post_id(post_id, page_accessToken) {
            console.log('post_id : ', post_id);
            var obj = {
                post_id: post_id,
                page_accessToken: page_accessToken
            };
            angular.extend($scope.fb, obj);
            $http({
                url: 'api/facebooks',
                method: 'POST',
                data: $scope.fb
            }).success(function (data) {
                console.log(data);
                currentModal.close();
                if (data.status == "success") {
                    alert("Post Success!!!");
                    $scope.reloadPage();
                }
            }).error(function () {
                alert("Post Fail!!!");
            });
            $scope.reloadPage = function () {
                $state.transitionTo($state.current, $stateParams, {reload: true, inherit: false, notify: true});
            };
        }

    }).

    controller('UIModalsCtrl', function ($scope, $rootScope, $modal, $sce) {
        // Open Simple Modal
        $scope.openModal = function (modal_id, modal_size, modal_backdrop) {
            $rootScope.currentModal = $modal.open({
                templateUrl: modal_id,
                size: modal_size,
                backdrop: typeof modal_backdrop == 'undefined' ? true : modal_backdrop
            });
        };

        // Loading AJAX Content
        $scope.openAjaxModal = function (modal_id, url_location) {
            $rootScope.currentModal = $modal.open({
                templateUrl: modal_id,
                resolve: {
                    ajaxContent: function ($http) {
                        return $http.get(url_location).then(function (response) {
                            $rootScope.modalContent = $sce.trustAsHtml(response.data);
                        }, function () {
                            $rootScope.modalContent = $sce.trustAsHtml('<div class="label label-danger">Cannot load ajax content! Please check the given url.</div>');
                        });
                    }
                }
            });

            $rootScope.modalContent = $sce.trustAsHtml('Modal content is loading...');
        }
    }).
    controller('PaginationDemoCtrl', function ($scope) {
        $scope.totalItems = 64;
        $scope.currentPage = 4;

        $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
        };

        $scope.pageChanged = function () {
            console.log('Page changed to: ' + $scope.currentPage);
        };

        $scope.maxSize = 5;
        $scope.bigTotalItems = 175;
        $scope.bigCurrentPage = 1;
    }).
    controller('LayoutVariantsCtrl', function ($scope, $layout) {
        $scope.opts = {
            sidebarType: null,
            fixedSidebar: null,
            sidebarToggleOthers: null,
            sidebarVisible: null,
            sidebarPosition: null,

            horizontalVisible: null,
            fixedHorizontalMenu: null,
            horizontalOpenOnClick: null,
            minimalHorizontalMenu: null,

            sidebarProfile: null
        };

        $scope.sidebarTypes = [
            {
                value: ['sidebar.isCollapsed', false],
                text: 'Expanded',
                selected: $layout.is('sidebar.isCollapsed', false)
            },
            {
                value: ['sidebar.isCollapsed', true],
                text: 'Collapsed',
                selected: $layout.is('sidebar.isCollapsed', true)
            }
        ];

        $scope.fixedSidebar = [
            {value: ['sidebar.isFixed', true], text: 'Fixed', selected: $layout.is('sidebar.isFixed', true)},
            {value: ['sidebar.isFixed', false], text: 'Static', selected: $layout.is('sidebar.isFixed', false)}
        ];
        $scope.sidebarToggleOthers = [
            {value: ['sidebar.toggleOthers', true], text: 'Yes', selected: $layout.is('sidebar.toggleOthers', true)},
            {value: ['sidebar.toggleOthers', false], text: 'No', selected: $layout.is('sidebar.toggleOthers', false)}
        ];
        $scope.sidebarVisible = [
            {value: ['sidebar.isVisible', true], text: 'Visible', selected: $layout.is('sidebar.isVisible', true)},
            {value: ['sidebar.isVisible', false], text: 'Hidden', selected: $layout.is('sidebar.isVisible', false)}
        ];
        $scope.sidebarPosition = [
            {value: ['sidebar.isRight', false], text: 'Left', selected: $layout.is('sidebar.isRight', false)},
            {value: ['sidebar.isRight', true], text: 'Right', selected: $layout.is('sidebar.isRight', true)}
        ];
        $scope.horizontalVisible = [
            {
                value: ['horizontalMenu.isVisible', true],
                text: 'Visible',
                selected: $layout.is('horizontalMenu.isVisible', true)
            },
            {
                value: ['horizontalMenu.isVisible', false],
                text: 'Hidden',
                selected: $layout.is('horizontalMenu.isVisible', false)
            }
        ];

        $scope.fixedHorizontalMenu = [
            {
                value: ['horizontalMenu.isFixed', true],
                text: 'Fixed',
                selected: $layout.is('horizontalMenu.isFixed', true)
            },
            {
                value: ['horizontalMenu.isFixed', false],
                text: 'Static',
                selected: $layout.is('horizontalMenu.isFixed', false)
            }
        ];

        $scope.horizontalOpenOnClick = [
            {
                value: ['horizontalMenu.clickToExpand', false],
                text: 'No',
                selected: $layout.is('horizontalMenu.clickToExpand', false)
            },
            {
                value: ['horizontalMenu.clickToExpand', true],
                text: 'Yes',
                selected: $layout.is('horizontalMenu.clickToExpand', true)
            }
        ];

        $scope.minimalHorizontalMenu = [
            {
                value: ['horizontalMenu.minimal', false],
                text: 'No',
                selected: $layout.is('horizontalMenu.minimal', false)
            },
            {
                value: ['horizontalMenu.minimal', true],
                text: 'Yes',
                selected: $layout.is('horizontalMenu.minimal', true)
            }
        ];

        $scope.chatVisibility = [
            {value: ['chat.isOpen', false], text: 'No', selected: $layout.is('chat.isOpen', false)},
            {value: ['chat.isOpen', true], text: 'Yes', selected: $layout.is('chat.isOpen', true)}
        ];

        $scope.boxedContainer = [
            {value: ['container.isBoxed', false], text: 'No', selected: $layout.is('container.isBoxed', false)},
            {value: ['container.isBoxed', true], text: 'Yes', selected: $layout.is('container.isBoxed', true)}
        ];

        $scope.sidebarProfile = [
            {value: ['sidebar.userProfile', false], text: 'No', selected: $layout.is('sidebar.userProfile', false)},
            {value: ['sidebar.userProfile', true], text: 'Yes', selected: $layout.is('sidebar.userProfile', true)}
        ];

        $scope.resetOptions = function () {
            $layout.resetCookies();
            window.location.reload();
        };

        var setValue = function (val) {
            if (val != null) {
                val = eval(val);
                $layout.setOptions(val[0], val[1]);
            }
        };

        $scope.$watch('opts.sidebarType', setValue);
        $scope.$watch('opts.fixedSidebar', setValue);
        $scope.$watch('opts.sidebarToggleOthers', setValue);
        $scope.$watch('opts.sidebarVisible', setValue);
        $scope.$watch('opts.sidebarPosition', setValue);

        $scope.$watch('opts.horizontalVisible', setValue);
        $scope.$watch('opts.fixedHorizontalMenu', setValue);
        $scope.$watch('opts.horizontalOpenOnClick', setValue);
        $scope.$watch('opts.minimalHorizontalMenu', setValue);

        $scope.$watch('opts.chatVisibility', setValue);

        $scope.$watch('opts.boxedContainer', setValue);

        $scope.$watch('opts.sidebarProfile', setValue);
    }).
    controller('ThemeSkinsCtrl', function ($scope, $layout) {
        var $body = jQuery("body");

        $scope.opts = {
            sidebarSkin: $layout.get('skins.sidebarMenu'),
            horizontalMenuSkin: $layout.get('skins.horizontalMenu'),
            userInfoNavbarSkin: $layout.get('skins.userInfoNavbar')
        };

        $scope.skins = [
            {value: '', name: 'Default', palette: ['#2c2e2f', '#EEEEEE', '#FFFFFF', '#68b828', '#27292a', '#323435']},
            {value: 'aero', name: 'Aero', palette: ['#558C89', '#ECECEA', '#FFFFFF', '#5F9A97', '#558C89', '#255E5b']},
            {value: 'navy', name: 'Navy', palette: ['#2c3e50', '#a7bfd6', '#FFFFFF', '#34495e', '#2c3e50', '#ff4e50']},
            {
                value: 'facebook',
                name: 'Facebook',
                palette: ['#3b5998', '#8b9dc3', '#FFFFFF', '#4160a0', '#3b5998', '#8b9dc3']
            },
            {
                value: 'turquoise',
                name: 'Truquoise',
                palette: ['#16a085', '#96ead9', '#FFFFFF', '#1daf92', '#16a085', '#0f7e68']
            },
            {value: 'lime', name: 'Lime', palette: ['#8cc657', '#ffffff', '#FFFFFF', '#95cd62', '#8cc657', '#70a93c']},
            {
                value: 'green',
                name: 'Green',
                palette: ['#27ae60', '#a2f9c7', '#FFFFFF', '#2fbd6b', '#27ae60', '#1c954f']
            },
            {
                value: 'purple',
                name: 'Purple',
                palette: ['#795b95', '#c2afd4', '#FFFFFF', '#795b95', '#27ae60', '#5f3d7e']
            },
            {
                value: 'white',
                name: 'White',
                palette: ['#FFFFFF', '#666666', '#95cd62', '#EEEEEE', '#95cd62', '#555555']
            },
            {
                value: 'concrete',
                name: 'Concrete',
                palette: ['#a8aba2', '#666666', '#a40f37', '#b8bbb3', '#a40f37', '#323232']
            },
            {
                value: 'watermelon',
                name: 'Watermelon',
                palette: ['#b63131', '#f7b2b2', '#FFFFFF', '#c03737', '#b63131', '#32932e']
            },
            {
                value: 'lemonade',
                name: 'Lemonade',
                palette: ['#f5c150', '#ffeec9', '#FFFFFF', '#ffcf67', '#f5c150', '#d9a940']
            }
        ];

        $scope.$watch('opts.sidebarSkin', function (val) {
            if (val != null) {
                $layout.setOptions('skins.sidebarMenu', val);
                $body.attr('class', $body.attr('class').replace(/\sskin-[a-z]+/)).addClass('skin-' + val);
            }
        });

        $scope.$watch('opts.horizontalMenuSkin', function (val) {
            if (val != null) {
                $layout.setOptions('skins.horizontalMenu', val);
                $body.attr('class', $body.attr('class').replace(/\shorizontal-menu-skin-[a-z]+/)).addClass('horizontal-menu-skin-' + val);
            }
        });

        $scope.$watch('opts.userInfoNavbarSkin', function (val) {
            if (val != null) {
                $layout.setOptions('skins.userInfoNavbar', val);

                $body.attr('class', $body.attr('class').replace(/\suser-info-navbar-skin-[a-z]+/)).addClass('user-info-navbar-skin-' + val);
            }
        });
    }).
    // Added in v1.3
    controller('FooterChatCtrl', function ($scope, $element) {
        $scope.isConversationVisible = false;

        $scope.toggleChatConversation = function () {
            $scope.isConversationVisible = !$scope.isConversationVisible;

            if ($scope.isConversationVisible) {
                setTimeout(function () {
                    var $el = $element.find('.ps-scrollbar');

                    if ($el.hasClass('ps-scroll-down')) {
                        $el.scrollTop($el.prop('scrollHeight'));
                    }

                    $el.perfectScrollbar({
                        wheelPropagation: false
                    });

                    $element.find('.form-control').focus();

                }, 300);
            }
        }
    });