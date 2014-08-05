



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


			$(function(){
				
				// INSTANTIATE MIXITUP
				
				$('#Parks').mixitup({
					layoutMode: 'list', // Start in list mode (display: block) by default
					listClass: 'list', // Container class for when in list mode
					gridClass: 'grid', // Container class for when in grid mode
					effects: ['fade','blur'], // List of effects 
					listEffects: ['fade','rotateX'] // List of effects ONLY for list mode
				});
				
				// HANDLE LAYOUT CHANGES
				
				// Bind layout buttons to toList and toGrid methods:
				
				$('#ToList').on('click',function(){
					$('.button').removeClass('active');
					$(this).addClass('active');
					$('#Parks').mixitup('toList');
				});

				$('#ToGrid').on('click',function(){
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
				
				var $filters = $('#Filters').find('li'),
					dimensions = {
						region: 'all', // Create string for first dimension
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
					console.info('dimension 1: '+dimensions.region);
					console.info('dimension 2: '+dimensions.recreation);
					
					/*
					*	We then send these strings to MixItUp using the filter method. We can send as
					*	many dimensions to MixitUp as we need using an array as the second argument
					*	of the "filter" method. Each dimension must be a space seperated string.
					*
					*	In this case, MixItUp will show elements using OR logic within each dimension and
					*	AND logic between dimensions. At least one dimension must pass for the element to show.
					*/
					
					$('#Parks').mixitup('filter',[dimensions.region, dimensions.recreation])			
				});

			});