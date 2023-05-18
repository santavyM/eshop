<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
			<div class="col-6">
			<h1>edit item</h1>
			<?php if(isset($success)):?>
				<div class="alert alert-success"><?=$success?></div>
			<?php endif;?>
			<?=isset($error) ? $error : ""?>
			<?php echo validation_errors(); ?>
			<?=form_open_multipart(base_url('index.php/manager/edit_item/') . $item->id)//"home/add_item"?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title', $item->title)?>">
  </div>
  <div class="form-group">
    <label for="price" >price</label>
    <input type="number" class="form-control" min="0" step="0.01" id="price" name="price" value="<?=set_value('price', $item->price)?>">
  </div>
  <div class="form-group">
	<label for="image">image</label>
	<input class="form-control" type="file" id="image" value="<?=set_value('image', $item->image)?>">
  </div>
  <div class="row">
	<div class="col-12">
		<img src="<?=base_url('uploads/'.$item->image)?>" alt="">
	</div>
  </div>
  <div class="form-group">
    <label for="description">description</label>
	<textarea class="form-control" id="description" name="description"><?=set_value('description', $item->description)?></textarea>
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
