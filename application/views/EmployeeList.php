<!-- Modal Box-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Employee</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					
					<div class="form-group">
						<span class="control-label col-sm-2">Name:</span>
						<div class="col-sm-8">
							<input type="text" name="name" id="name" class="form-control sa-bordnone sa-width250" value = "">
						</div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-2">Designation:</span>
						<div class="col-sm-8">
							<!--<input type="text" name="field" id="field" class="form-control sa-bordnone sa-width250" value="" >-->
							<select name="field" id="field" class="form-control sa-bordnone sa-width250">
								<option value="senior" selected>Senior</option>
								<option value="junior">Junior</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-2">Salary:</span>
						<div class="col-sm-8">
							<input type="text" name="salary" id="salary" class="form-control sa-bordnone sa-width250" value="" >
						</div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-2">Years Of Exp:</span>
						<div class="col-sm-8">
							<input type="text" name="YrsExp" id="YrsExp" class="form-control sa-bordnone sa-width250" value="" >
						</div>
					</div>
					<div class="form-group">
					<input type="hidden" name="Id" id="Id" class="form-control sa-bordnone sa-width250" value="" >
						<button type="button" onclick="EditData();" class="btn btn-default" style="margin-left: 135px;background-color: #7db797;" data-dismiss="modal">Submit</button>
						<button type="button" class="btn btn-default" style="background-color: #bd6960;"data-dismiss="modal" aria-label="Close">Cancel</button>
					</div>
				</form>
				
			</div>
      </div>
      
    </div>
</div>

<div class="modal fade" id="InsEmpl" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Employee</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					
					<div class="form-group">
						<span class="control-label col-sm-2">Name:</span>
						<div class="col-sm-8">
							<input type="text" name="newname" id="newname" class="form-control sa-bordnone sa-width250" value = "">
						</div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-2">Designation:</span>
						<div class="col-sm-8">
							<select name="newfield" id="newfield" class="form-control sa-bordnone sa-width250">
								<option value="senior" selected>Senior</option>
								<option value="junior">Junior</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-2">Salary:</span>
						<div class="col-sm-8">
							<input type="text" name="newsalary" id="newsalary" class="form-control sa-bordnone sa-width250" value="" >
						</div>
					</div>
					<div class="form-group">
						<span class="control-label col-sm-2">Years Of Exp:</span>
						<div class="col-sm-8">
							<input type="text" name="newYrsExp" id="newYrsExp" class="form-control sa-bordnone sa-width250" value="" >
						</div>
					</div>
					<div class="form-group">
						<button type="button" onclick="NewData();" class="btn btn-default" style="margin-left: 135px;background-color: #7db797;" data-dismiss="modal">Submit</button>
						<button type="button" class="btn btn-default" style="background-color: #bd6960;"data-dismiss="modal" aria-label="Close">Cancel</button>
					</div>
				</form>
				
			</div>
      </div>
      
    </div>
</div>
 
<div class="container-fluid">
	<div style="float:right;padding-bottom:20px;padding-right:95px;">
		<button type="button" onclick="NewEmpl();" class="btn btn-default" style="margin-left: 135px;background-color: #c7af67;" data-dismiss="modal">New Employee</button>
	</div>
	<div id="error" class="alert alert-warning">
				<strong>Data Not Saved	</strong>
	</div>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-fixed" id="toggleColumn-datatable">
					<thead>
						<tr>
							<th>S.NO</th>
							<th>Employee Name</th>
							<th>Employee Designation</th>
							<th>Salary</th>
							<th>Years of Expierence</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($list))
						{
							$count = 1;
							foreach($list as $data)
							{ ?>
								<tr>
									<td><?php echo $count;?></td>
									<td><?php echo $data['name'];?></td>
									<td><?php echo $data['field'];?></td>
									<td><?php echo $data['salary'];?></td>
									<td><?php echo $data['years'].' Years';?></td>
									<td><button class="btn btn-sm input-sm btn-custom1" style="background-color: #7db797;"onclick="editmodal('<?php echo $data['id'];?>');">EDIT</button></td>
									<td><button class="btn btn-sm input-sm btn-custom1" style="background-color: #c76e6a;"onclick="deleteemployee('<?php echo $data['id'];?>');">DELETE</button></td>
								</tr>
								
						<?php 
							$count++;
							}
							
						}
						?>
							
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</body></html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
     $("#error").hide(); 
});
function editmodal(order_id)
{
	$.ajax({type: "POST",
		url: "http://localhost/employee_dashboard/User/getEmplDetail",
		data: {id:order_id},
		success: function(result){
			var data = JSON.parse(result);
			//console.log(data[0].name);
			$("#name").val(data[0].name);
			$("#salary").val(data[0].salary);
			$("#field").val(data[0].field);
			$("#YrsExp").val(data[0].years);
			$("#Id").val(order_id);
			$("#myModal").modal('show');
			
			}
	});
}

function EditData()
{
	var sal = $("#salary").val();
	var field = $("#field").val();
	var yrs = $("#YrsExp").val();
	var Id = $("#Id").val();
	var inputs = {
				"id":Id,
                "salary": sal,
                "field": field,
                "years": yrs,
            }
	$.ajax({type: "POST",
		url: "http://localhost/employee_dashboard/User/EditEmplDetail",
		data: JSON.stringify(inputs),
		success: function(result){
			console.log(result);
			if(result == 1)
			{
				window.location.href="http://localhost/employee_dashboard/User";
				
			}else{
				$("#error").show();
			}
			
			}
	});
}

function deleteemployee(order_id)
{
	$.ajax({type: "POST",
		url: "http://localhost/employee_dashboard/User/deleteEmp",
		data: {id:order_id},
		success: function(result){
			if(result == 1)
			{
				window.location.href="http://localhost/employee_dashboard/User";
				
			}else{
				$("#error").show();
			}
			
			}
	});
}

function NewEmpl()
{
	$("#InsEmpl").modal('show');
}

function NewData()
{
	var name = $("#newname").val();
	var sal = $("#newsalary").val();
	var field = $("#newfield").val();
	var yrs = $("#newYrsExp").val();
	
	var inputs = {
				"name":name,
                "salary": sal,
                "field": field,
                "years": yrs,
            }
	$.ajax({type: "POST",
		url: "http://localhost/employee_dashboard/User/NewEmployee",
		data: JSON.stringify(inputs),
		success: function(result){
			if(result == 1)
			{
				window.location.href="http://localhost/employee_dashboard/User";
				
			}else{
				$("#error").show();
			}
			
			}
	});
}
</script>