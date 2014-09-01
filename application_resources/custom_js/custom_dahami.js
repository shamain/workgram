



function save_user_privileges(privilege_code, employee_code) {
    $("#msg" + priviligeCode).html('');

    $checkbox = document.getElementById('privilege' + privilege_code);

    $.post(site_url + '/employee_privilege/employee_privilege_controller/add_employee_privileges', {privilege_code: privilege_code, employee_code: employee_code}, function(msg)
    {
        if (msg == 1) {
            $("#msg" + privilege_code).html('<img src="' + base_url + '/application_resources/images/icons/color/accept.png"  />');

        } else {
            $("#msg" + privilege_code).html('<img src="' + base_url + '/application_resources/images/icons/color/error.png"  />');

        }
    });

}


$('#emp_privi_tab a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
});

//$(function() {		
//			// Call SuperBox - that's it!
//			$('.superbox').SuperBox();		
//		});
//                
//;(function($){$.fn.SuperBox=function(options){var superbox=$('<div class="superbox-show"></div>');var superboximg=$('<img src="" class="superbox-current-img">');var superboxclose=$('<div class="superbox-close"></div>');superbox.append(superboximg).append(superboxclose);return this.each(function(){$('.superbox-list').click(function(){var currentimg=$(this).find('.superbox-img');var imgData=currentimg.data('img');superboximg.attr('src',imgData);if($('.superbox-current-img').css('opacity')==0){$('.superbox-current-img').animate({opacity:1});}
//if($(this).next().hasClass('superbox-show')){superbox.toggle();}else{superbox.insertAfter(this).css('display','block');}
//$('html, body').animate({scrollTop:superbox.position().top- currentimg.width()},'medium');});$('.superbox').on('click','.superbox-close',function(){$('.superbox-current-img').animate({opacity:0},200,function(){$('.superbox-show').slideUp();});});});};})(jQuery);


$(function() {

    // INSTANTIATE MIXITUP

    $('#Parks').mixitup({
        layoutMode: 'list', // Start in list mode (display: block) by default
        listClass: 'list', // Container class for when in list mode
        gridClass: 'grid', // Container class for when in grid mode
        effects: ['fade', 'blur'], // List of effects 
        listEffects: ['fade', 'rotateX'] // List of effects ONLY for list mode
    });

    // HANDLE LAYOUT CHANGES

    // Bind layout buttons to toList and toGrid methods:

    $('#ToList').on('click', function() {
        $('.button').removeClass('active');
        $(this).addClass('active');
        $('#Parks').mixitup('toList');
    });

    $('#ToGrid').on('click', function() {
        $('.button').removeClass('active');
        $(this).addClass('active');
        $('#Parks').mixitup('toGrid');
    });

    // HANDLE MULTI-DIMENSIONAL CHECKBOX FILTERING

    /* 	
     *	The desired behaviour of multi-dimensional filtering can differ greatly 
     *	from project to project. MixItUp's built in filter button handlers are best
     *	suited to simple filter operations, so we will need to build our own handlers
     *	for this demo to achieve the precise behaviour we need.
     */

    var $filters = $('#work_snap_filters').find('li'),
            dimensions = {
        employee: 'all', // Create string for first dimension
        project: 'all', // Create string for first dimension
        tasks: 'all' // Create string for second dimension
    };

    // Bind checkbox click handlers:

    $filters.on('click', function() {

        var $t = $(this),
                dimension = $t.attr('data-dimension'),
                filter = $t.attr('data-filter'),
                filterString = dimensions[dimension];

        if (dimension == 'employee') {
            $.post(site_url + '/worker/worker_controller/get_employee_filter_data', {dimension: dimension, filterString: filterString}, function(msg)
            {
                $("#project_ul").html('');
                $("#project_ul").html(msg);
            });

        } else if (dimension == 'project') {

        } else if (dimension == 'tasks') {

        }

        if (filter == 'all') {
            // If "all"
            if (!$t.hasClass('active')) {
                // if unchecked, check "all" and uncheck all other active filters
                $t.addClass('active').siblings().removeClass('active');
                // Replace entire string with "all"
                filterString = 'all';
            } else {
                // Uncheck
                $t.removeClass('active');
                // Emtpy string
                filterString = '';
            }
        } else {
            // Else, uncheck "all"
            $t.siblings('[data-filter="all"]').removeClass('active');
            // Remove "all" from string
            filterString = filterString.replace('all', '');
            if (!$t.hasClass('active')) {
                // Check checkbox
                $t.addClass('active');
                // Append filter to string
                filterString = filterString == '' ? filter : filterString + ' ' + filter;
            } else {
                // Uncheck
                $t.removeClass('active');
                // Remove filter and preceeding space from string with RegEx
                var re = new RegExp('(\\s|^)' + filter);
                filterString = filterString.replace(re, '');
            }

            $.post(site_url + '/worker/worker_controller/get_screenshot', {employee: dimensions.employee, project: dimensions.project, task: dimensions.tasks}, function(msg)
            {
                $("#filter_result_div").html('');
                $("#filter_result_div").html(msg);
            });

        }

        // Set demension with filterString
        dimensions[dimension] = filterString;

        // We now have two strings containing the filter arguments for each dimension:	
        console.info('dimension 1: ' + dimensions.employee);
        console.info('dimension 2: ' + dimensions.project);
        console.info('dimension 3: ' + dimensions.tasks);


        /*
         *	We then send these strings to MixItUp using the filter method. We can send as
         *	many dimensions to MixitUp as we need using an array as the second argument
         *	of the "filter" method. Each dimension must be a space seperated string.
         *
         *	In this case, MixItUp will show elements using OR logic within each dimension and
         *	AND logic between dimensions. At least one dimension must pass for the element to show.
         */

        $('#Parks').mixitup('filter', [dimensions.employee, dimensions.project, dimensions.tasks])
    });

});
//add inquiry Form
$('#add_inquiry_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        inquiry_name: {
            required: true
        },
        inquiry_description: {
            required: true
        }


    },
    invalidHandler: function(event, validator) {
        //display error alert on form submit    
    },
    errorPlacement: function(label, element) { // render error placement for each input type   
        $('<span class="error"></span>').insertAfter($(element).parent()).append(label)
        var parent = $(element).parent('.input-with-icon');
        parent.removeClass('success-control').addClass('error-control');
    },
    highlight: function(element) { // hightlight error inputs
        var parent = $(element).parent();
        parent.removeClass('success-control').addClass('error-control');

    },
    unhighlight: function(element) { // revert the change done by hightlight

    },
    success: function(label, element) {
        var parent = $(element).parent('.input-with-icon');
        parent.removeClass('error-control').addClass('success-control');
    }, submitHandler: function(form)
    {
        $.post(site_url + '/employee_screenshots/employee_screenshots_controller/add_inquiry', $('#add_inquiry_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#add_inquiry_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >inquiry </a>has been added.</div>');
                add_inquiry_form.reset();
                window.location = site_url + '/employee_screenshots/employee_screenshots_controller/manage_employee_screenshot';
            } else {
                $("#add_inquiry_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">inquiry </a>has failed.</div>');
            }
        });


    }
});
