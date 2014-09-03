var base_url = js_base_url;
var site_url = js_site_url;


$(document).ready(function() {
    //wages_category table
    var wages_category_table = $('#wages_category_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar wages_category_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "collection",
                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
                    "aButtons": ["csv", "xls", "pdf", "copy"]
                }
            ]
        },
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [0]}
        ],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

//add wages Form

    $('#add_wages_category_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            category_name: {
                required: true
                
            },
            basic_salary: {
                required: true,
                number: true
            },
            ot_rate: {
                required: true,
                number: true

            },
            allowance: {
                required: true,
                number: true
            },
            bonus: {
                required: true,
                number: true
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
            $.post(site_url + '/wages_category/wages_category_controller/add_new_wages_category', $('#add_wages_category_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_wages_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >wages category </a>has been added.</div>');
                    add_wages_category_form.reset();
                    location.reload();
                } else {
                    $("#add_wages_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">wages category </a>has failed.</div>');
                }
            });


        }
    });



//edit wages category Form
$('#edit_wages_category_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
         category_name: {
                required: true
                
            },
            basic_salary: {
                required: true,
                number: true
            },
            ot_rate: {
                required: true,
                number: true

            },
            allowance: {
                required: true,
                number: true
            },
            bonus: {
                required: true,
                number: true
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
        $.post(site_url + '/wages_category/wages_category_controller/edit_wages_category', $('#edit_wages_category_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_wages_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >wages category</a> has been updated.</div>');
                edit_wages_category_form.reset();
                location.reload();
            } else {
                $("#edit_wages_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">wages category </a> has failed.</div>');
            }
        });


    }
});


				var $filters = $('#Filters').find('li'),
					dimensions = {
						company: 'all', // Create string for first dimension
						recreation: 'all' // Create string for second dimension
					};
					
				// Bind checkbox click handlers:
				
				$filters.on('click',function(){
					var $t = $(this),
						dimension = $t.attr('data-dimension'),
						filter = $t.attr('data-filter'),
						filterString = dimensions[dimension];
						
					if(filter == 'all'){
						// If "all"
						if(!$t.hasClass('active')){
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
						filterString = filterString.replace('all','');
						if(!$t.hasClass('active')){
							// Check checkbox
							$t.addClass('active');
							// Append filter to string
							filterString = filterString == '' ? filter : filterString+' '+filter;
						} else {
							// Uncheck
							$t.removeClass('active');
							// Remove filter and preceeding space from string with RegEx
							var re = new RegExp('(\\s|^)'+filter);
							filterString = filterString.replace(re,'');
						};
					};
					
					// Set demension with filterString
					dimensions[dimension] = filterString;
					
					// We now have two strings containing the filter arguments for each dimension:	
					console.info('dimension 1: '+dimensions.company);
					console.info('dimension 2: '+dimensions.recreation);
					
					$('#Parks').mixitup('filter',[dimensions.company, dimensions.recreation])			
				});

			});
 
$("#datepicker").datepicker( {
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});

//get skills for skill category when assigning skills for employees
$(document).on('change', '#wages_company_filter', function() {
    alert("fs");
    var skill_cat_code = $('#skill_cat_code').val();
    $.post(site_url + '/skill_matrix/skill_matrix_controller/get_skill_for_skill_category_filter', {skill_cat_code: skill_cat_code}, function(msg) {
        if (msg != '') {
            $("#skill_code").html('');
            $("#skill_code").html(msg);
        }
    });

});