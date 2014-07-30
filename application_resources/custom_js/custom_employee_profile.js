var base_url = js_base_url;
var site_url = js_site_url;

   //edit employee Form
$('#edit_employee_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        employee_fname: {
            required: true
        },
        employee_lname: {
            required: true
        },
        employee_id: {
            required: true
        },
        employee_email: {
            required: true
        },
        employee_code: {
            required: true
        },
        employee_bday: {
            required: true
        },
        employee_contact: {
            required: true
        },
        employee_contract: {
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
        $.post(site_url + '/employee/employee_profile_controller/edit_employee_profile', $('#edit_employee_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_employee_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >details </a>has been updated.</div>');
                edit_pemployee_form.reset();
                location.reload();
            } else {
                $("#edit_employee_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">details </a>has failed.</div>');
            }
        });


    }
});

Morris.Donut({
   element: 'donut-example',
   data: [
  {label: "Design", value: 40},
  {label: "Programming", value: 30},
  {label: "Developing", value: 30}
   ],
   colors:['#60bfb6','#91cdec','#eceff1']
 });

function loadSampleChartDemo2(){

var seriesData_5 = [ [], [],[]];

	var random = new Rickshaw.Fixtures.RandomData(50);

	for (var i = 0; i < 50; i++) {
		random.addData(seriesData_5);
	}

	rick = new Rickshaw.Graph( {
		element: document.querySelector('#profile_skill_chart'),
		height: 200,
		renderer: 'area',
		series: [
			{
				data: seriesData_5[0],
				color: '#736086',
				name:'Downloads'
			},{
				data: seriesData_5[1],
				color: '#f8a4a3',
				name:'Uploads'
			},
			{
				data: seriesData_5[2],
				color: '#eceff1',
				name:'All'
			}
		]
	} );
	
	var hoverDetail = new Rickshaw.Graph.HoverDetail( {
		graph: rick
	});
	
	random.addData(seriesData_5);
	rick.update();
	
	var ticksTreatment = 'glow';
	
	var xAxis = new Rickshaw.Graph.Axis.Time( {
	graph: rick,
	ticksTreatment: ticksTreatment,
	timeFixture: new Rickshaw.Fixtures.Time.Local()
	});

	xAxis.render();

	var yAxis = new Rickshaw.Graph.Axis.Y( {
		graph: rick,
		tickFormat: Rickshaw.Fixtures.Number.formatKMBT,
		ticksTreatment: ticksTreatment
	});
	
	var legend = new Rickshaw.Graph.Legend( {
	graph: rick,
	element: document.getElementById('legend_2')
	});	
	
	yAxis.render();
	
	var shelving = new Rickshaw.Graph.Behavior.Series.Toggle( {
		graph: rick,
		legend: legend
	} );

	var order = new Rickshaw.Graph.Behavior.Series.Order( {
		graph: rick,
		legend: legend
	} );

	var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight( {
		graph: rick,
		legend: legend
	} );

	//Sparkline Charts
	$("#mini-chart-orders_2").sparkline([1,4,6,2,0,5,6,4,6], {
		type: 'bar',
		height: '30px',
		barWidth: 6,
		barSpacing: 2,
		barColor: '#f35958',
		negBarColor: '#f35958'
	});
	//Sparkline Charts
	$("#mini-chart-other_2").sparkline([1,4,6,2,0,5,6,4], {
		type: 'bar',
		height: '30px',
		barWidth: 6,
		barSpacing: 2,
		barColor: '#0aa699',
		negBarColor: '#0aa699'
	});	
        
        
   
        
        
 
}