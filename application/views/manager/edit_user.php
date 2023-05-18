<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
			<div class="col-6">
			<h1>edit user</h1>
			<?php echo validation_errors(); ?>
			<?=form_open(base_url('index.php/manager/edit_user/') . $user->id)//"home/add_item"?>
  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?=set_value('email', $user->email)?>">
  </div>
  <div class="form-group">
    <label for="level">level</label>
    <input type="text" class="form-control" id="level" name="level" value="<?=set_value('level', $user->level)?>">
  </div>
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" value="<?=set_value('first_name', $user->first_name)?>">
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" value="<?=set_value('last_name', $user->last_name)?>">
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="d-md-block btn btn-primary font-weight-bold my-2 py-3">Save new</button>
	<?=form_close()?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@l.16.0/dist/umd/popper.min.js"></script>
</body>
</html>
