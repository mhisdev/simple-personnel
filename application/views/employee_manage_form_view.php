<h2>Add Employee</h2>
<div class="employee-form well">
	<form  action="<?php echo $action_url ?>" method="post" accept-charset="utf-8">
		<p>
			<label for="first_name">First Name (Required):</label>
			<input class="form-control" id="first_name" name="first_name" maxlength="32" placeholder="First Name" value="<?php echo $form['first_name'] ?>">
		</p>
		<p>
			<label for="last_name">Last Name (Required):</label>
			<input class="form-control" id="last_name" name="last_name" maxlength="32" placeholder="Last Name" value="<?php echo $form['last_name'] ?>">
		</p>
		<p>
			<label for="telephone">Telephone:</label>
			<input class="form-control" id="telephone" name="telephone" maxlength="16" placeholder="Telephone" value="<?php echo $form['telephone'] ?>">
		</p>
		<p>
			<label for="house_name_number">House Name/Number:</label>
			<input class="form-control" id="house_name_number" name="house_name_number" maxlength="32" placeholder="House Name/Number" 
			value="<?php echo $form['house_name_number'] ?>">
		</p>
		<p>
			<label for="street">Street:</label>
			<input class="form-control" id="street" name="street" maxlength="32" placeholder="Street" value="<?php echo $form['street'] ?>">
		</p>
		<p>
			<label for="town">Town:</label>
			<input class="form-control" id="town" name="town" maxlength="32" placeholder="Town" value="<?php echo $form['town'] ?>">
		</p>
		<p>
			<label for="city">City:</label>
			<input class="form-control" id="city" name="city" maxlength="32" placeholder="City" value="<?php echo $form['city'] ?>">
		</p>
		<p>
			<label for="post_code">Post Code:</label>
			<input class="form-control" id="post_code" name="post_code" maxlength="16" placeholder="Post Code" value="<?php echo $form['post_code'] ?>">
		</p>
		<p>
			<label>
      			<input type="checkbox" name="active_status"<?php if($form['active_status']) { echo ' checked="checked"';} ?>> Active Status
    		</label>
		</p>
		<p>
			<input type="submit" name="submit" class="btn btn-primary" value="<?php echo $submit_value ?>">
		</p>
	</form>
</div>
<div>
	<?php if(isset($message)) echo $message; ?>
</div>