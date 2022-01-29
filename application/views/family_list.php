<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Family Details</title>
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/css/custom.css"/>
	<script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>/assets/js/sweetalert.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="container-fluid">
		<div class="row py-3 mb-3">
			<div class="col-lg-6">
				<h1>Family Data</h1>
			</div>
			<div class="col-lg-6 text-right">
				<a href="<?= base_url('family-add'); ?>" class="btn btn-success">+ Add</a>
			</div>
		</div>
		<div class="row py-3">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="patientsTab" class="table">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Photo</th>
								<th>Name</th>
								<th>Surname</th>
								<th>Birth Date</th>
								<th>Mobile</th>
								<th>Married</th>
								<th>Wedding Date</th>
								<th>Members</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($headList as $head):
								if($head['marriage_date']=='0000-00-00') {
									$marriage_date = '';
								} else {
									$marriage_date = date('d-m-Y', strtotime($head['marriage_date']));
								} ?>
								<tr>
									<td><?= $i; ?></td>
									<td><img src="<?= base_url('uploads/').$head['photo']; ?>" width="100" /></td>
									<td><?= $head['name']; ?></td>
									<td><?= $head['surname']; ?></td>
									<td><?= date('d-m-Y', strtotime($head['dob'])); ?></td>
									<td><?= $head['mobile']; ?></td>
									<td><?= $head['married'] == 1 ? 'Married' : 'Unmarried'; ?></td>
									<td><?= $marriage_date; ?></td>
									<td><a href="#" class="getMembers" data-id="<?= $head['id']; ?>"><?= $head['members']; ?></a></td>
								</tr>
							<?php $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="memberModal" class="modal customModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Members List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
      		<table class="table" id="membersList">
      			<thead>
      				<tr>
      					<th>Sr.</th>
      					<th>Photo</th>
      					<th>Name</th>
      					<th>Birth Date</th>
      					<th>Married</th>
      					<th>Education</th>
      				</tr>
      			</thead>
      			<tbody>      				
      			</tbody>
      		</table>
      	</div>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		//Show Patient Data
		$(".getMembers").click(function(e){
			var headId = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url('family/members'); ?>',
				type: 'POST',
				data: 'head='+headId,
				cache: false,
				success: function(data){
					let dt = JSON.parse(data);
					let ds = ``;
					if(dt.length) {
						$.each(dt, function(i, o){
							ds += `<tr>
									<td>${i + 1}</td>
									<td><img src="<?= base_url('uploads/'); ?>${o.photo}" width="50" /></td>
									<td>${o.name}</td>
									<td>${o.dob}</td>
									<td>${o.married==1 ? 'Married' : 'Unmarried'}</td>
									<td>${o.education}</td>
								</tr>`;
						});
					} else {
						ds += `<tr>
									<td colspan="6" align="center">No data available</td>
								</tr>`;
					}
					$("#membersList tbody").html(ds);
					$("#memberModal").modal();
				}
			});

			e.preventDefault();
		});
	});
</script>
</body>
</html>