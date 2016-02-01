
window.genReady = function() {

    jQuery(document).ready(function($) {

        // Input Mask
        //$("#myForm input[inputmask]").inputmask();

        // -- Auto Complete

        //$('input.auto-complete').each(function () {
        //    var me = $(this);
        //    var bh = new Bloodhound({
        //        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        //        queryTokenizer: Bloodhound.tokenizers.whitespace,
        //        remote: {
        //            url : 'api',
        //            replace: function (url, query) {
        //                if (me.attr('data-url')) {
        //                    //url = me.attr('data-url')+encodeURIComponent($('#'+me.attr('data-param')).val());
        //                    url = me.attr('data-url')+'?q='+encodeURIComponent(me.val());
        //                }
        //
        //                //console.log('asdf', url);
        //                return url;
        //            }
        //        }
        //    });
        //
        //    bh.initialize();
        //
        //    $(this).typeahead({
        //        hint: true,
        //        minLength: 1,
        //        highlight: true
        //    }, {
        //        name: 'string-randomizer',
        //        displayKey: 'value',
        //        source: bh.ttAdapter()
        //    });
        //});

        //$("input.auto-complete").typeahead({
        //    remote: {
        //        url : 'api',
        //        prepare: function (query, settings) {
        //            if ($(this).attr('data-url')) {
        //                settings.url = $(this).attr('data-url')+encodeURIComponent($('#'+$(this).attr('data-param')).val());
        //            }
        //            return settings;
        //        }
        //    },
        //    cache: false,
        //    limit: 10
        //
        //});

        // -- Select 2

        //$("input.select2").select2({
        //    minimumInputLength: 1,
        //    placeholder: 'Search',
        //    ajax: {
        //        url: function () {
        //            return $(this).attr('data-url');
        //        },
        //        dataType: 'json',
        //        quirsillis: 100,
        //        data: function(term, page) {
        //            console.log('dd', myVars[$(this).attr('data-param')]);
        //            return {
        //                limit: -1,
        //                q: term,
        //                param: myVars[$(this).attr('data-param')]
        //            };
        //        },
        //        results: function(data, page ) {
        //            return { results: data }
        //        }
        //    },
        //    initSelection: function (element, callback) {
        //        console.log('element', $(element).val());
        //        $.ajax('api/search/5555555', {
        //            dataType: "json"
        //        }).done(function(data) {
        //            console.log('dddon');
        //            callback(data.addresses[0]);
        //        });
        //    },
        //
        //    formatResult: function(student) {
        //        return "<div class='select2-user-result'>" + student.name + "</div>";
        //    },
        //    formatSelection: function(student) {
        //        return  student.name;
        //    }
        //
        //}).on("select2-selecting", function(e) {
        //
        //    //console.log('dds', e.object.id, $(this).attr('name'));
        //    myVars[$(this).attr('name')] = e.object.id;
        //});

        $("form.validate2").find('input[type="number"]').on("mousewheel", function(event){ this.blur() });

        //$("select.genSelect").select2({
        //    placeholder: '-- Please Select --',
        //    allowClear: true,
        //    minimumResultsForSearch: 5
        //}).on('select2-open', function()
        //{
        //    // Adding Custom Scrollbar
        //    $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
        //});

        // --Form Validation

        if($.isFunction($.fn.validate)) {
            $("form.validate2").each(function (i, el) {
                var $this = $(el),
                    opts = {
                        rules: {},
                        messages: {},
                        errorElement: 'span',
                        errorClass: 'validate-has-error',
                        highlight: function (element) {
                            $(element).closest('.form-group').addClass('validate-has-error');
                        },
                        unhighlight: function (element) {
                            $(element).closest('.form-group').removeClass('validate-has-error');
                        },
                        errorPlacement: function (error, element) {
                            if (element.closest('.has-switch').length) {
                                error.insertAfter(element.closest('.has-switch'));
                            }
                            else if (element.parent('.checkbox, .radio').length || element.parent('.input-group').length) {
                                error.insertAfter(element.parent());
                            }
                            else {
                                error.insertAfter(element);
                            }
                        },
                        submitHandler: function(form) {
                            $('#hackSubmit').click(); // hack submit
                        }
                    },
                    $fields = $this.find('[data-validate]');

                //console.log('fv', $fields.length);

                $fields.each(function (j, el2) {
                    var $field = $(el2),
                        name = $field.attr('name'),
                        validate = attrDefault($field, 'validate', '').toString(),
                        _validate = validate.split(',');

                    for (var k in _validate) {
                        var rule = _validate[k],
                            params,
                            message;

                        if (typeof opts['rules'][name] == 'undefined') {
                            opts['rules'][name] = {};
                            opts['messages'][name] = {};
                        }

                        if ($.inArray(rule, ['required', 'url', 'email', 'number', 'date', 'creditcard']) != -1) {
                            opts['rules'][name][rule] = true;
                            message = $field.data('message-' + rule);

                            if (message) {
                                opts['messages'][name][rule] = message;
                            }
                        }
                        // Parameter Value (#1 parameter)
                        else if (params = rule.match(/(\w+)\[(.*?)\]/i)) {
                            if ($.inArray(params[1], ['min', 'max', 'minlength', 'maxlength','equalTo']) != -1) {
                                //console.log('params', params[1] , params[2]) ;
                                opts['rules'][name][params[1]] = params[2];


                                message = $field.data('message-' + params[1]);

                                if (message) {
                                    opts['messages'][name][params[1]] = message;
                                }
                            }

                        }

                        //console.log('rule', $field.attr('name'));
                    }

                });

                //console.log('rule', opts);
                $this.validate(opts);
            });

        }
    });
}