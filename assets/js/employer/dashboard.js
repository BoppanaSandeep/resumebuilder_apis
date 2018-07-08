$(document).ready(function() {
	fetchAppliedJobsOfEmployerPosts(1, 5)
	// Javascript method's body can be found in assets/js/demos.js
	// demo.initDashboardPageCharts();

	$(".card-header").click(function() {
		$(this).siblings().toggle();
	});
});

function fetchAppliedJobsOfEmployerPosts(page_number, page_limit){
	$('.loader, .page-loader').show()
    // if ($.trim($("#job_title").val()) != '' || $.trim($("#job_position").val()) != '' || $.trim($("#fromdate").val()) != '' || $.trim($("#todate").val()) != '' || $.trim($("#location").val()) != '') {
    //     var params = { page_number: page_number, page_limit: page_limit, job_title: $.trim($("#job_title").val()), job_position: $.trim($("#job_position").val()), fromdate: $.trim($("#fromdate").val()), todate: $.trim($("#todate").val()), location: $.trim($("#location").val()) }
    // } else {
        var params = { page_number: page_number, page_limit: page_limit }
	// }
	
	$.get(base_url + 'employer/JobPosts/FetchAppliedJobsOfEmployerPosts', params, function (data, status) {
        var data = $.parseJSON(data)
        console.log(data, data.info.length)
        var template = ''
        if (data.message == 'OK' && data.info.length > 0) {
            $.each(data.info, function (key, res) {
				template += "<tr>"
				template += "<td>"+res.name_first+" "+res.name_last+"</td>"
				template += "<td>"+res.job_title+"</td>"
				template += "<td>"+res.job_description+"</td>"
				template += "<td><a href='#' onclick='viewMoreDetails(\""+res.appliedBy+"\")'>View More</a></td>"
				template += "</tr>"
			})
			$('.employeeApproached').children().remove()
			$('.employeeApproached').append(template)
			$('.loader').fadeOut()
            $('.page-loader').delay(350).fadeOut('slow')
		}
	})
}

function viewMoreDetails(appliedBy){
	console.log(appliedBy);
	$('#myModal').modal('toggle')
}
