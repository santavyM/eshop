<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
      <div class="col-12">
            <h1>users</h1>
      </div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">email</th>
      <th scope="col">name</th>
      <th scope="col">level</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($items as $item): ?>
    <tr>
      <th scope="row"><?=$item->id?></th>
      <td><?=$item->email?></td>
      <td><?=$item->first_name?> <?=$item->last_name?></td>
      <td><?=$item->level?></td>
      <td>
        <a class="btn btn-danger delete" href="<?=base_url('index.php/Manager/delete_user/' . $item->id)?>">del</a>
        <a class="btn btn-primary" href="<?=base_url('index.php/Manager/edit_user/' . $item->id)?>">edit</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
</div>
