		<script src="tampilan/jquery.min.js"></script>
		<link rel="stylesheet" href="tampilan/bootstrap.min.css" />
		<script src="tampilan/jquery.dataTables.min.js"></script>
		<script src="tampilan/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="tampilan/dataTables.bootstrap.min.css" />
		<script src="tampilan/bootstrap.min.js"></script>
		<div class="table-responsive">
				<br /><div align="left">
					<a href="../index.php"><button style="font-size:12px;font-weight:bold"type="button" class="btn btn-info btn-lg">Back</button></a>
				</div>
				<div align="right">
		
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Product</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="font-size: 12px;color: #3e3e3e;"width="35%">Picture</th>
							<th style="font-size: 12px;color: #3e3e3e;"width="35%">Restaurant or cafe</th>
							<th style="font-size: 12px;color: #3e3e3e;"width="15%">Edit</th>
							<th style="font-size: 12px;color: #3e3e3e;"width="15%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
            <form action="image-upload.php" method="POST" enctype="multipart/form-data">
                <label>Product Name:</label>
          <input type="text" name="" id=""  class="form-control" required>
          <br><br>
          <input type="file" class="form-control"  name="file" id="file" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="upload">Submit</button>
          
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          
          </form>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  
<script type="text/javascript" language="javascript" >
/*$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add Data Restaurant");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 0, 3],
				"orderable":false,
			},
		],

	});*/

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var namalapangan = $('#namalapangan').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(namalapangan != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{id:id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#namalapangan').val(data.namalapangan);
				$('.modal-title').text("Update Restaurant information");
				$('#id').val(id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id:id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>