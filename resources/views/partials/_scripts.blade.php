
<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
if (!window.jQuery) {
    document.write('<script src="/theme/js/libs/jquery-2.1.1.min.js"><\/script>');
}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
if (!window.jQuery.ui) {
    document.write('<script src="/theme/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
}
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="/theme/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="/theme/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="/theme/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="/theme/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="/theme/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="/theme/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="/theme/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="/theme/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="/theme/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="/theme/js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="/theme/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="/theme/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="/theme/js/plugin/fastclick/fastclick.min.js"></script>

        <!--[if IE 8]>

        <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="/theme/js/app.min.js"></script>

        <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
        <!-- Voice command : plugin -->
        {{-- // <script src="/theme/js/speech/voicecommand.min.js"></script> --}}

        <!-- SmartChat UI : plugin -->
        <script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
        <script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>
        
        <!-- PAGE RELATED PLUGIN(S) -->
        
        <!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
        <script src="/theme/js/plugin/flot/jquery.flot.cust.min.js"></script>
        <script src="/theme/js/plugin/flot/jquery.flot.resize.min.js"></script>
        <script src="/theme/js/plugin/flot/jquery.flot.time.min.js"></script>
        <script src="/theme/js/plugin/flot/jquery.flot.tooltip.min.js"></script>
        
        <!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
         {{-- <script src="/theme/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        // <script src="/theme/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script> --}}
        
        <!-- Full Calendar -->
        <script src="/theme/js/plugin/moment/moment.min.js"></script>
        <script src="/theme/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>

        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>

        <script>
        $(document).ready(function() {

                // DO NOT REMOVE : GLOBAL FUNCTIONS!
                pageSetUp();

                /*
                 * PAGE RELATED SCRIPTS
                 */

                 $(".js-status-update a").click(function() {
                    var selText = $(this).text();
                    var $this = $(this);
                    $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
                    $this.parents('.dropdown-menu').find('li').removeClass('active');
                    $this.parent().addClass('active');
                });

                /*
                * TODO: add a way to add more todo's to list
                */

                // initialize sortable
                $(function() {
                    $("#sortable1, #sortable2").sortable({
                        handle : '.handle',
                        connectWith : ".todo",
                        update : countTasks
                    }).disableSelection();
                });

                // check and uncheck
                $('.todo .checkbox > input[type="checkbox"]').click(function() {
                    var $this = $(this).parent().parent().parent();

                    if ($(this).prop('checked')) {
                        $this.addClass("complete");

                        // remove this if you want to undo a check list once checked
                        //$(this).attr("disabled", true);
                        $(this).parent().hide();

                        // once clicked - add class, copy to memory then remove and add to sortable3
                        $this.slideUp(500, function() {
                            $this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
                            $this.remove();
                            countTasks();
                        });
                    } else {
                        // insert undo code here...
                    }

                })
                // count tasks
                function countTasks() {

                    $('.todo-group-title').each(function() {
                        var $this = $(this);
                        $this.find(".num-of-tasks").text($this.next().find("li").size());
                    });

                }

                /*
                * RUN PAGE GRAPHS

                // TAB THREE GRAPH //
                /* TAB 3: Revenew  */

                $(function() {

                    var trgt = [[1354586000000, 153], [1364587000000, 658], [1374588000000, 198], [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080], [1414592000000, 353], [1424593000000, 749], [1434594000000, 523], [1444595000000, 258], [1454596000000, 688], [1464597000000, 364]], prft = [[1354586000000, 53], [1364587000000, 65], [1374588000000, 98], [1384589000000, 83], [1394590000000, 980], [1404591000000, 808], [1414592000000, 720], [1424593000000, 674], [1434594000000, 23], [1444595000000, 79], [1454596000000, 88], [1464597000000, 36]], sgnups = [[1354586000000, 647], [1364587000000, 435], [1374588000000, 784], [1384589000000, 346], [1394590000000, 487], [1404591000000, 463], [1414592000000, 479], [1424593000000, 236], [1434594000000, 843], [1444595000000, 657], [1454596000000, 241], [1464597000000, 341]], toggles = $("#rev-toggles"), target = $("#flotcontainer");

                    var data = [{
                        label : "Target Profit",
                        data : trgt,
                        bars : {
                            show : true,
                            align : "center",
                            barWidth : 30 * 30 * 60 * 1000 * 80
                        }
                    }, {
                        label : "Actual Profit",
                        data : prft,
                        color : '#3276B1',
                        lines : {
                            show : true,
                            lineWidth : 3
                        },
                        points : {
                            show : true
                        }
                    }, {
                        label : "Actual Signups",
                        data : sgnups,
                        color : '#71843F',
                        lines : {
                            show : true,
                            lineWidth : 1
                        },
                        points : {
                            show : true
                        }
                    }]

                    var options = {
                        grid : {
                            hoverable : true
                        },
                        tooltip : true,
                        tooltipOpts : {
                            //content: '%x - %y',
                            //dateFormat: '%b %y',
                            defaultTheme : false
                        },
                        xaxis : {
                            mode : "time"
                        },
                        yaxes : {
                            tickFormatter : function(val, axis) {
                                return "$" + val;
                            },
                            max : 1200
                        }

                    };

                    plot2 = null;

                    function plotNow() {
                        var d = [];
                        toggles.find(':checkbox').each(function() {
                            if ($(this).is(':checked')) {
                                d.push(data[$(this).attr("name").substr(4, 1)]);
                            }
                        });
                        if (d.length > 0) {
                            if (plot2) {
                                plot2.setData(d);
                                plot2.draw();
                            } else {
                                plot2 = $.plot(target, d, options);
                            }
                        }

                    };

                    toggles.find(':checkbox').on('change', function() {
                        plotNow();
                    });
                    plotNow()

                });

                /*
                 * VECTOR MAP
                 */

                 data_array = {
                    "US" : 4977,
                    "AU" : 4873,
                    "IN" : 3671,
                    "BR" : 2476,
                    "TR" : 1476,
                    "CN" : 146,
                    "CA" : 134,
                    "BD" : 100
                };

                $('#vector-map').vectorMap({
                    map : 'world_mill_en',
                    backgroundColor : '#fff',
                    regionStyle : {
                        initial : {
                            fill : '#c4c4c4'
                        },
                        hover : {
                            "fill-opacity" : 1
                        }
                    },
                    series : {
                        regions : [{
                            values : data_array,
                            scale : ['#85a8b6', '#4d7686'],
                            normalizeFunction : 'polynomial'
                        }]
                    },
                    onRegionLabelShow : function(e, el, code) {
                        if ( typeof data_array[code] == 'undefined') {
                            e.preventDefault();
                        } else {
                            var countrylbl = data_array[code];
                            el.html(el.html() + ': ' + countrylbl + ' visits');
                        }
                    }
                });

                /*
                 * FULL CALENDAR JS
                 */

                 if ($("#calendar").length) {
                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    var calendar = $('#calendar').fullCalendar({

                        editable : true,
                        draggable : true,
                        selectable : false,
                        selectHelper : true,
                        unselectAuto : false,
                        disableResizing : false,
                        height: "auto",

                        header : {
                            left : 'title', //,today
                            center : 'prev, next, today',
                            right : 'month, agendaWeek, agenDay' //month, agendaDay,
                        },

                        select : function(start, end, allDay) {
                            var title = prompt('Event Title:');
                            if (title) {
                                calendar.fullCalendar('renderEvent', {
                                    title : title,
                                    start : start,
                                    end : end,
                                    allDay : allDay
                                }, true // make the event "stick"
                                );
                            }
                            calendar.fullCalendar('unselect');
                        },

                        events : [{
                            title : 'All Day Event',
                            start : new Date(y, m, 1),
                            description : 'long description',
                            className : ["event", "bg-color-greenLight"],
                            icon : 'fa-check'
                        }, {
                            title : 'Long Event',
                            start : new Date(y, m, d - 5),
                            end : new Date(y, m, d - 2),
                            className : ["event", "bg-color-red"],
                            icon : 'fa-lock'
                        }, {
                            id : 999,
                            title : 'Repeating Event',
                            start : new Date(y, m, d - 3, 16, 0),
                            allDay : false,
                            className : ["event", "bg-color-blue"],
                            icon : 'fa-clock-o'
                        }, {
                            id : 999,
                            title : 'Repeating Event',
                            start : new Date(y, m, d + 4, 16, 0),
                            allDay : false,
                            className : ["event", "bg-color-blue"],
                            icon : 'fa-clock-o'
                        }, {
                            title : 'Meeting',
                            start : new Date(y, m, d, 10, 30),
                            allDay : false,
                            className : ["event", "bg-color-darken"]
                        }, {
                            title : 'Lunch',
                            start : new Date(y, m, d, 12, 0),
                            end : new Date(y, m, d, 14, 0),
                            allDay : false,
                            className : ["event", "bg-color-darken"]
                        }, {
                            title : 'Birthday Party',
                            start : new Date(y, m, d + 1, 19, 0),
                            end : new Date(y, m, d + 1, 22, 30),
                            allDay : false,
                            className : ["event", "bg-color-darken"]
                        }, {
                            title : 'Smartadmin Open Day',
                            start : new Date(y, m, 28),
                            end : new Date(y, m, 29),
                            className : ["event", "bg-color-darken"]
                        }],


                        eventRender : function(event, element, icon) {
                            if (!event.description == "") {
                                element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description + "</span>");
                            }
                            if (!event.icon == "") {
                                element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon + " '></i>");
                            }
                        }
                    });

};

/* hide default buttons */
$('.fc-toolbar .fc-right, .fc-toolbar .fc-center').hide();

                // calendar prev
                $('#calendar-buttons #btn-prev').click(function() {
                    $('.fc-prev-button').click();
                    return false;
                });

                // calendar next
                $('#calendar-buttons #btn-next').click(function() {
                    $('.fc-next-button').click();
                    return false;
                });

                // calendar today
                $('#calendar-buttons #btn-today').click(function() {
                    $('.fc-button-today').click();
                    return false;
                });

                // calendar month
                $('#mt').click(function() {
                    $('#calendar').fullCalendar('changeView', 'month');
                });

                // calendar agenda week
                $('#ag').click(function() {
                    $('#calendar').fullCalendar('changeView', 'agendaWeek');
                });

                // calendar agenda day
                $('#td').click(function() {
                    $('#calendar').fullCalendar('changeView', 'agendaDay');
                });

                /*
                * LIST FILTER (CHAT)
                */

                // custom css expression for a case-insensitive contains()
                jQuery.expr[':'].Contains = function(a, i, m) {
                    return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
                };

                function listFilter(list) {// header is any element, list is an unordered list
                    // create and add the filter form to the header

                    $.filter_input.change(function() {
                        var filter = $(this).val();
                        if (filter) {
                            // this finds all links in a list that contain the input,
                            // and hide the ones not containing the input while showing the ones that do
                            $.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
                            $.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
                        } else {
                            $.chat_users.find("li").slideDown();
                        }
                        return false;
                    }).keyup(function() {
                        // fire the above change event after every letter
                        $(this).change();

                    });

                }

                // on dom ready
                listFilter($.chat_users);

                // open chat list
                $.chat_list_btn.click(function() {
                    $(this).parent('#chat-container').toggleClass('open');
                })

                $.chat_body.animate({
                    scrollTop : $.chat_body[0].scrollHeight
                }, 500);

            });

</script>

{{-- Original Admin Scripts --}}
    <script src="{{ asset ('/AdminTemplate/js/jquery.dataTables.min.js') }}"></script>
    @stack('scripts')

    <!-- Select Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-countto/jquery.countTo.js') }}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/node-waves/waves.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset ('/AdminTemplate/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/flot-charts/jquery.flot.time.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/waitme/waitMe.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/bootstrap-filestyle.min.js') }}"></script>
    

    <!-- JQuery Steps Plugin Js -->
    


    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
    


    <!-- Custom Js -->
    <script src="{{ asset ('/AdminTemplate/js/admin.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/bootbox.min.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/pages/cards/basic.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/pages/index.js') }}"></script>
    <script src="{{ asset ('/AdminTemplate/js/pages/forms/basic-form-elements.js') }}"></script>
    <!-- Dropzone Plugin Js -->
    <script src="{{ asset ('/AdminTemplate/plugins/dropzone/dropzone.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset ('/AdminTemplate/js/demo.js') }}"></script>
    <script>
        $('.delete').submit(function(e) {
            e.preventDefault();
            var currentForm = this;
            bootbox.confirm("Are you sure you want to delete this?", function(result) {
                if (result) {
                    currentForm.submit();
                }
            });
        });
    
    </script>
{{-- End Admin Scripts --}}