function editCampany(id){

	var url = "edit/"+id;
	
	$.ajax({
		url: url,
		data: {id:id},
		dataType:"JSON",
		type: "GET",
		success(response){
			$("#UpdateCustomer").modal("show");
			$("#companyid").val(response.id);
			$("#cname").val(response.company_name);
			$("#cemail").val(response.email);
			$("#cwebsite").val(response.website);
			$('#clogo').attr('src', 'storage/'+ response.logo);
		}
	})
}

function editEmployee(id){

	var url = "edit-employee/"+id;
	
	$.ajax({
		url: url,
		data: {id:id},
		dataType:"JSON",
		type: "GET",
		success(response){
			console.log(response);
			$("#UpdateEmployee").modal("show");
			$("#employeeid").val(response.id);
			$("#user_id").val(response.user.id);
			$("#f_name").val(response.user.f_name);
			$("#l_name").val(response.user.l_name);
			$("#cemail").val(response.user.email);
			$("#cphone").val(response.user.phone);
			$("#ccompany").val(response.company.company_id);
		}
	})
}

$("#companyDataUpdate").on("submit", function(arg){
	arg.preventDefault();
	
	var data = new FormData($(this)[0]);

	$.ajax({
		url: $(this).attr("action"),
		type: $(this).attr("method"),
		dataType: "JSON",
		data: data,
		enctype: "multipart/form-data",
		cache:false,
		contentType: false,
		processData: false,
		success: function(response){
			$("#UpdateCustomer").modal("hide");
			location.reload();
			console.log(response);
		}
	});

});

$("#employeeDataUpdate").on("submit", function(arg){
	arg.preventDefault();
	
	var form =$(this);
	var data = form.serialize();

	$.ajax({
		url: $(this).attr("action"),
		type: $(this).attr("method"),
		dataType: "JSON",
		data: data,
		success: function(response){
			$("#UpdateEmployee").modal("hide");
			location.reload();
			console.log(response);
		}
	});

});
