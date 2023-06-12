<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-6">
			<h1>Add category</h1>
			<?php echo validation_errors(); ?>
			<?=form_open(current_url());?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title')?>">
  </div>
  <button type="submit" class="d-md-block btn btn-primary font-weight-bold my-2 py-3">Add new</button>
	<?=form_close()?>
			</div>
		</div>
	</div>
</body>
</html>
