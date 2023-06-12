<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-6">
			<h1>Add item</h1>
			<?=isset($error) ? $error : ""?>
			<?php echo validation_errors(); ?>
			<?=form_open_multipart(current_url())//"home/add_item"?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title')?>">
  </div>
  <div class="form-group">
    <label for="price" >price</label>
    <input type="number" class="form-control" min="0" step="0.01" id="price" name="price" value="<?=set_value('price')?>">
  </div>
  <div class="form-group">
	<label for="image">image</label>
	<input class="form-control-file" type="file" id="image" name="image" value="<?=set_value('image')?>">
  </div>
  <div class="form-group">
    <label for="description">description</label>
	<textarea class="form-control" id="description" name="description"><?=set_value('description')?></textarea>
  </div>
  <button type="submit" class="d-md-block btn btn-primary font-weight-bold my-2 py-3">Add new</button>
	<?=form_close()?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
