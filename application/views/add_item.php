<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-6">
			<h1>Add item</h1>
      <?=isset($error) ? $error : ""?>
      <?=validation_errors()?>
      <form action="<?=base_url('add_item')?>" method="post">
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
	<input class="form-control" type="file" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="description">description</label>
	<textarea class="form-control" id="description" name="description"><?=set_value('description')?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Add new</button>
	<?=form_close()?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@l.16.0/dist/umd/popper.min.js"></script>
</body>
</html>
