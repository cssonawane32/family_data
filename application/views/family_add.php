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
		<div class="row py-3 mb-1">
			<div class="col-lg-6">
				<h1>Family Details</h1>
			</div>
			<div class="col-lg-6 text-right">
				<a href="<?= base_url(); ?>" class="btn btn-success">List</a>
			</div>
		</div>
		<div class="row py-3">
			<form method="POST" enctype="multipart/formdata" class="w-100" novalidate>
				<div class="col-12 mb-2">
					<h4>Family Head</h4>
				</div>
				<div class="offset-lg-2 col-lg-8">
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Name</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="text" name="name" id="name" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Surname</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="text" name="surname" id="surname" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Birth Date</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="date" name="dob" id="dob" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Mobile No.</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="text" name="mobile" id="mobile" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>		        	
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Address</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="text" name="address" id="address" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">City</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<select name="city" id="city" class="form-control" required>
			        			<option value="">Select City</option>
			        			<option value="Malegaon">Malegaon</option>
			        			<option value="Ahemdabad">Ahemdabad</option>
			        			<option value="Surat">Surat</option>
			        			<option value="Pune">Pune</option>
			        			<option value="Nashik">Nashik</option>
			        		</select>
			        		<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">State</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<select name="state" id="state" class="form-control" required>
			        			<option value="">Select Sate</option>
			        			<option value="Maharashtra">Maharashtra</option>
			        			<option value="Gujrat">Gujrat</option>
			        			<option value="Madhya Pradesh">Madhya Pradesh</option>
			        		</select>
			        		<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Pincode</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="text" name="pincode" id="pincode" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Married</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<label class="mr-3"><input type="radio" name="married" value="1" required /> Married</label>
		        			<label><input type="radio" name="married" value="0" required /> Unmarried</label><br/>
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>	
		        	<div class="form-group row" id="wedding_field" style="display: none;">
		        	</div>		        		
		        	<div class="form-group row" id="hobbies_field">
		        		<label class="col-lg-4 col-sm-12">Hobbies</label>
		        		<div class="col-lg-6 col-sm-9">
		        			<input type="text" name="hobbies[]" class="form-control" required />
		        		</div>
		        		<div class="col-lg-2 col-sm-3">
		        			<a id="add_hobby" class="btn btn-success text-white">+ Add</a>
		        		</div>
		        	</div>		        		
		        	<div class="form-group row">
		        		<label class="col-lg-4 col-sm-12">Photo</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="file" name="photo" id="photo" class="form-control" accept=".jpg, .png, .jpeg, .gif" required />
		        			<span class="text-danger"></span>
		        		</div>
		        	</div>	
				</div>
				<div class="col-12 d-flex justify-content-between mb-3">
					<h4>Family Members</h4>
					<a id="add_member" class="btn btn-success text-white">+ Add</a>
				</div>
				<div class="col-12 mt-10">
					<div class="table-responsive">
						<table id="familyMembers" class="table">
							<thead>
								<tr>
									<td>Name</td>
									<td>Birthdate</td>
									<td>Marital Status</td>
									<td>Wedding Date</td>
									<td>Education</td>
									<td>Photo</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>								
							</tbody>
						</table>
					</div>
				</div>
	        	<div class="col-12 text-right">
        			<button type="submit" class="btn btn-success">Submit</button>
	        	</div>	
		    </form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var i = 1, k = 0;

		//Save Data
		$("form").submit(function(e){
			let formData = new FormData(this);

			if(validateForm($(this))) {
				$.ajax({
					url: '<?= base_url('family/save'); ?>',
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					beforeSend: function() {
						$("[type=submit]").attr('disabled', true);
					},
					success: function(response){
						if(response > 0) {
							swal("", "Data saved!", "success");
							setTimeout(function(){
								window.location.href = "<?= base_url(); ?>";
							}, 1000);
						} else {
							swal("", "Data save failed", "error");
						}
						$("[type=submit]").attr('disabled', false);
					}
				});
			}

			e.preventDefault();
		});

		//Wedding date field show/hide
		$("[name='married']").click(function(){
			let val = +$(this).val();
			if(val)
				$("#wedding_field").html(`<label class="col-lg-4 col-sm-12">Wedding Date</label>
		        		<div class="col-lg-8 col-sm-12">
		        			<input type="date" name="marriage_date" id="marriage_date" class="form-control" required />
		        			<span class="text-danger"></span>
		        		</div>`).show();
			else
				$("#wedding_field").html(``).hide();
		});

		//Image validation
		$(document).on("change", 'input[type="file"]', function() {
		    var ext = this.value.match(/\.(.+)$/)[1];
		    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		    	$(this).val("");
			    $(this).siblings("span").text("File must be image(gif,png,jpg,jpeg)");
			} else {
				$(this).siblings("span").text("");
			}
		});

		//Add hobby
		$("#add_hobby").click(function(e){
			let addHobby = `<div class="offset-lg-4 col-lg-6 col-sm-9 mt-2" id="hobby${i}">
		        			<input type="text" name="hobbies[]" class="form-control" required />
		        		</div>
		        		<div class="col-lg-2 col-sm-3 mt-2">
		        			<a class="btn btn-danger text-white del-hobby" data-hobbyId="hobby${i}">&#10005;</a>
		        		</div>`;

		    $("#hobbies_field").append(addHobby);

		    i++;

		    e.preventDefault();
		});

		//Remove hobby
		$(document).on("click", ".del-hobby", function(e){
			let hid = $(this).attr("data-hobbyId");

			$(this).closest("div").remove();

			$("#"+hid).remove();

			e.preventDefault();
		});

		//Add Member
		$("#add_member").click(function(e){
			let addMember = `<tr><td>
				<input type="text" name="mname[]" class="form-control" placeholder="Name" required />
				<span class="text-danger"></span>
			</td><td>
				<input type="date" name="mdob[]" class="form-control" placeholder="Birth Date" required />
				<span class="text-danger"></span>
			</td><td>
				<select name="mmarriage_stat[]" class="form-control" required>
        			<option value="">Marriage Status</option>
        			<option value="1">Married</option>
        			<option value="0">Unmarried</option>
        		</select>
				<span class="text-danger"></span>
			</td><td class="mw_date">				
			</td><td>
				<input type="text" name="meducation[]" class="form-control" required />
				<span class="text-danger"></span>
			</td><td>
				<input type="hidden" name="mid[]" value="${k}" />
				<input type="file" name="mphoto${k}" class="form-control" accept=".jpg, .png, .jpeg, .gif" required />
				<span class="text-danger"></span>
			</td><td>
				<a class="btn btn-danger text-white del-member">&#10005;</a>
			</td></tr>`;

		    $("#familyMembers tbody").append(addMember);

		   	k++;
		    e.preventDefault();
		});

		$(document).on("change", "select[name='mmarriage_stat[]']", function(){
			if($(this).val()=='1')
				$(this).closest("tr").find(".mw_date").html(`<input type="date" name="mwed_date[]" class="form-control" required/>
				<span class="text-danger"></span>`);
			else
				$(this).closest("tr").find(".mw_date").html(``);
		});

		$(document).on("click", ".del-member", function(e){
			$(this).closest("tr").remove();

			e.preventDefault();
		});

		function validateForm(form) {
			var validate = [];
			form.find("[required]").each(function(i){
				if($(this).val()=='') {
					let label = $(this).closest(".form-group").find("> label").text();
					$(this).siblings("span").text(label+" field is mandatory.");
					validate.push(false);
				} else {
					if($(this).attr("id")=='dob') {
						if(!getAge($(this).val())) {
							$(this).siblings("span").text("Age must be above 21.");
							validate.push(false);
						} else {
							$(this).siblings("span").text("");
							validate.push(true);
						}
					} else if($(this).attr("id")=='mobile') {
						if(!$(this).val().match(/^\d{10}$/)) {
							$(this).siblings("span").text("Please enter valid mobile no.");
							validate.push(false);
						} else {
							$(this).siblings("span").text("");
							validate.push(true);
						}
					} else if($(this).attr("id")=='pincode') {
						if(!$(this).val().match(/^\d{6}$/)) {
							$(this).siblings("span").text("Please enter valid pincode.");
							validate.push(false);
						} else {
							$(this).siblings("span").text("");
							validate.push(true);
						}
					} else if($(this).attr("name")=='married') {
						if($("input[name='married']:checked").val() == undefined) {
							$(this).closest("div").find("span").text("Please check marriage status.");
							validate.push(false);
						} else {
							$(this).closest("div").find("span").text("");
							validate.push(true);
						}
					} else {
						$(this).siblings("span").text("");
						validate.push(true);
					}
				}
			});

			if($.inArray(false, validate) == -1)
				return true;
			else
				return false;
		}

		function getAge(date) {
			var today = new Date();
		    var dob = new Date(date);
		    var age = today.getFullYear() - dob.getFullYear();
		    var m = today.getMonth() - dob.getMonth();
		    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
		        age--;
		    }

		    if(age > 21) return true;

			return false;
		}
	});
</script>
</body>
</html>