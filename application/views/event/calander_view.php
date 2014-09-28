<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            eventClick: function(event) {

                //

                $(this).popover({
                    html: true,
                    placement: 'bottom',
                    title: function() {
                        return event.title.toString();
                    },
                    content: function() {

                        var data = "<p>Start: " + event.start.toString() + "</p>";
                        data += "<p>End: " + event.end.toString() + "</p>";
//                            var data = "<p>Start: " + event.start.toString() + "</p>";
//                            data += "<p>End: " + event.end.toString() + "</p>";
                        return data;
                    }
                });
                $(this).popover('toggle');


                //alert('hh');

                //--------------------------------------- 
                //var title = prompt('Event Title:');
                var eventData;
                if (title) {
                    eventData = {
                        title: title,
                        start: start,
                        end: end
                    };
                    $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                }
                //---------------------------------------
            },
        });

    });
</script>


<div>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            width: 900px;
            margin: 40px auto;
        }

    </style>
</div> 

<div class="row-fluid">

    <div class="grid-body no-border">
        <div class="tiles row tiles-container white  no-padding">
            <div id='calendar'></div>
        </div>
    </div>
    <!--calender end -->

</div>

<script type="text/javascript">
                                                $('#event_parent_menu').addClass('active open');
</script>