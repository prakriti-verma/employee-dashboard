<div class="container-fluid" style="padding-top:50px;">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-2 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Senior Engineer:</label>
				<input class="form-control" id="senior" name="senior" placeholder="Senior Engineer" type="text" />
			</div>
		</div>
							  
							  
		<div class="col-md-2 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Junior Engineer:</label>
				<input class="form-control" id="junior" name="junior" placeholder="Junior Engineer" type="text" />
			</div>
		</div>
		<div class="col-md-2 col-sm-6 col-xs-12">
			<div class="form-group">
				<label>Budget:</label>
				<input class="form-control" id="budget" name="budget"  placeholder="Budget:" type="text" />
			</div>
		</div>
							  
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="form-group">
				<!--<input type="button" value="Export" onClick="ExportToExcel()" class="btn btn-sm input-sm btn-custom1">-->
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-default" style="margin-top: 25px;background-color: #7db797;">
			</div>
		</div>				  
	</div>
</div>
</body></html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
     $("#results").hide(); 
     $("#error").hide(); 
});
$(function() {
    $("#submit").click(function() {
		$("#error").hide();
        var senior = $("input#senior").val();
        var junior = $("input#junior").val();
        var budget = $("input#budget").val();
		
        var dataString = 
		{'senior':senior,'junior':junior,'budget':budget};
        $.ajax({
            type: "POST",
			url: "http://localhost/employee_dashboard/Display/employeeCal",
            data: dataString,
            success: function(data1) {
				console.log(data1);
				
				if(data1 == 'false')
				{
					$("#results").html("");
					$("#error").show();
				}else{
					$("#results").show();
					$("#results  tbody").html("");
					data2 = JSON.parse(data1);
					var trHTML = '';
					var total = 0;
					var count = 0;
					$.each(data2, function(idx, obj){	
					count++;
					trHTML += '<tr><td>' + count + '</td><td>' + obj.name + '</td><td>' + obj.field + '</td><td>' + obj.salary + '</td><td>' + obj.years + '</td></tr>';
					total = total+ parseInt(obj.salary);
					});				
					trHTML += '<tr><td>' + '' + '</td><td>' + '' + '</td><td>' + 'ACTUAL COST' + '</td><td><b>' + total + '</b></td><td>' + '' + '</td></tr>';
					$('#results').append(trHTML);
			}
            },
			error: function (x)
			{
				alert("error");
			}
			 
        });
        return false;
    });
})

</script>