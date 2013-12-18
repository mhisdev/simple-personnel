<h2>Employees</h2>
<div class="row">
	<div class="col-md-8">
<?php

// Function to output '-' when no data is present
function _output_string($str = ''){

	if(strlen($str)){

		echo $str;

	}
	else{

		echo('-');
	}
}

// Check there are employees in the database
if(empty($employees)){
	// No employees
	echo "<p>No employees to dispay</p>";
}
else{
?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>View</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
<?php

	$count = 0;			// For row number in table
	$employee_data;		// Holds th details of the employee being viewed

	foreach($employees as $employee){

		// Check to see if employee needs to be dispayed
		if($display_id == $employee['id']){

			$employee_data = $employee;
		}

		// Output table
?>
	<tr <?php //if($display_id == $employee['id']) {echo 'class="active"';} ?>>
		<td><?php echo ++$count ?></td>
		<td><?php echo $employee['first_name']; ?></td>
		<td><?php echo $employee['last_name']; ?></td>
		<td><a href="<?php echo base_url();?>employee_manage/employee_list/<?php echo $page_num . '/' . $employee['id']; ?>">View</a></td>
		<td><a href="<?php echo base_url();?>employee_manage/edit/<?php echo $page_num . '/' . $employee['id']; ?>">Edit</a></td>
	</tr>
<?php	
	}
}

?>
	</tbody>
</table>

<div class="pagination">
	<?php echo $pagination ?>
</div>

	</div>
	<div class="col-md-4">
		<?php 
			// Output details if required
			if(!empty($employee_data)){
				/*echo $employee_data['first_name'] . ' ' . $employee_data['last_name'];*/
				// Display employee details
				?>
				<table class="table">
					<tr>
						<th>#</th>
						<th><?php echo $employee_data['first_name'] . ' ' . $employee_data['last_name']; ?></th>
					</tr>
					<tr>
						<td>Tel:</td>
						<td><?php _output_string($employee_data['telephone']); ?></td>
					</tr>
					<tr>
						<td>House Name/Number:</td>
						<td><?php _output_string($employee_data['house_name_number']); ?></td>
					</tr>
					<tr>
						<td>Street:</td>
						<td><?php _output_string($employee_data['street']); ?></td>
					</tr>
					<tr>
						<td>Town:</td>
						<td><?php _output_string($employee_data['town']); ?></td>
					</tr>
					<tr>
						<td>City:</td>
						<td><?php _output_string($employee_data['city']); ?></td>
					</tr>
					<tr>
						<td>Post Code:</td>
						<td><?php _output_string($employee_data['post_code']) ?></td>
					</tr>
					<tr>
						<td>Status:</td>
						<td><?php
								if($employee_data['active_status']){

									echo 'Active';
								}
								else{

									echo 'Not Active';
								}
							
							?></td>
					</tr>
				</table>
				<?php
			}
		?>
	</div>
</div>