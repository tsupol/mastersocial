'use strict';

angular.module('xenon.services', []).
	service('$menuItems', function()
	{
		this.menuItems = [];

		var $menuItemsRef = this;

		var menuItemObj = {
			parent: null,

			title: '',
			link: '', // starting with "./" will refer to parent link concatenation
			state: '', // will be generated from link automatically where "/" (forward slashes) are replaced with "."
			icon: '',

			isActive: false,
			label: null,

			menuItems: [],

			setLabel: function(label, color, hideWhenCollapsed)
			{
				if(typeof hideWhenCollapsed == 'undefined')
					hideWhenCollapsed = true;

				this.label = {
					text: label,
					classname: color,
					collapsedHide: hideWhenCollapsed
				};

				return this;
			},

			addItem: function(title, link, icon, isHidden)
			{
				var parent = this,
					item = angular.extend(angular.copy(menuItemObj), {
						parent: parent,

						title: title,
						link: link,
						icon: icon,
					});

				if(item.link)
				{
					if(item.link.match(/^\./))
						item.link = parent.link + item.link.substring(1, link.length);

					else if(item.link.match(/^-/))
						item.link = parent.link + '/' + item.link.substring(2, link.length);

					else if(item.link.match(/^\/$/))
						item.link = parent.link;

					else if(item.link.match(/^\//))
						item.link = 'app' + item.link;

					item.state = $menuItemsRef.toStatePath(item.link);
					if(isHidden == undefined) {
						item.isHidden = false;
					} else {
						item.isHidden = isHidden;
					}

				}

				this.menuItems.push(item);

				return item;
			}
		};

		this.addItem = function(title, link, icon)
		{
			var item = angular.extend(angular.copy(menuItemObj), {
				title: title,
				link: link,
				state: this.toStatePath(link),
				icon: icon
			});

			this.menuItems.push(item);

			return item;
		};

		this.getAll = function()
		{
			return this.menuItems;
		};

		this.prepareSidebarMenu = function()
		{
			var m = window.menu;
			var len = m.length;
			//fore(var i=0; i<len; i++) {
			//	if(Array.isArray(m[i])) {
			//		var menu = this.addItem('ลูกค้า', '/app/customers', 'linecons-user');
			//	}
			//}

			for(var k in m) {
				var s = m[k].settings;
				var menu = this.addItem(s.label, s.url, s.icon);
				for(var i in m[k].items) {
					var item = m[k]['items'][i];
					if(item.length > 2) {
						menu.addItem(item[3], item[2]);
					} else {
						menu.addItem(item[1], item[0], undefined, true);
						//menu.addItem(item[1], '-/'+item[1], undefined, true);
					}
				}
			}



			//var pmUser = this.addItem('ผู้ใช้ระบบ', '/app/users', 'linecons-user');
			//pmUser.addItem('เพิ่มผู้ใช้ระบบ', '-/create');

			return this;
		};

		this.prepareHorizontalMenu = function()
		{
			var layouts      = this.addItem('Layout',			'/app/layout-and-skins',	'linecons-desktop');
			return this;
		}

		this.instantiate = function()
		{
			return angular.copy( this );
		}

		this.toStatePath = function(path)
		{
			return path.replace(/\//g, '.').replace(/^\./, '');
		};

		this.setActive = function(path)
		{
			this.iterateCheck(this.menuItems, this.toStatePath(path));
		};

		this.setActiveParent = function(item)
		{
			item.isActive = true;
			item.isOpen = true;

			if(item.parent)
				this.setActiveParent(item.parent);
		};

		this.mySetActive = function(k, i)
		{
			//console.log('dd', k, i);
		};

		this.iterateCheck = function(menuItems, currentState)
		{

			//var state = currentState.replace(/^app/, '').replace(/\./g, '/').replace(/\d+$/, ':id');
			////console.log('-*-', currentState, state);
            //
			//var m = window.menu;
			//for(var k in m) {
			//	for(var i in m[k].items) {
			//		var item = m[k]['items'][i];
			//		if(item[0] == state) {
			//			$menuItemsRef.mySetActive(k, i);
			//		}
			//		//console.log('mod', item);
			//	}
			//}

			var currentState = currentState.replace(/\d+$/, ':id');

			angular.forEach(menuItems, function(item)
			{
				//console.log('item', item.state);
				if(item.state == currentState && item.menuItems.length == 0) // pok fix parent same url as child
				{
					item.isActive = true;
					if(item.parent != null)
						$menuItemsRef.setActiveParent(item.parent);
				}
				else
				{
					item.isActive = false;
					item.isOpen = false;

					if(item.menuItems.length)
					{
						$menuItemsRef.iterateCheck(item.menuItems, currentState);
					}
				}
			});
		}
	});