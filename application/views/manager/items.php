<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($items as $item): ?>
    <tr>
      <th scope="row"><?=$item->id?></th>
      <td><?=$item->title?></td>
      <td><?=$item->price?></td>
      <td>
        <a class="btn btn-danger delete" href="<?=base_url('index.php/Manager/delete_item/' . $item->id)?>">del</a>
        <a class="btn btn-primary" href="<?=base_url('index.php/Manager/edit_item/' . $item->id)?>">edit</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
</div>
