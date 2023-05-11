<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="<?php base_url('/assets/css/style.css');?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?=base_url()?>">Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url()?>">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu">
            <?php foreach($categories as $category): ?>
          <a class="dropdown-item" href="<?=base_url('index.php/category/'.$category->id)?>"><?=$category->title?></a>
          <?php endforeach;?>
        </div>
      </li>
    
    <form class="d-flex" action="" method="get">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <?php if(isset($user['logged']) && $user['logged']):?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$user['first_name']?>
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="<?=base_url('index.php/home/cart')?>">Shopping Cart</a>
          <?php if(($user['level']) !== null):?>
            <hr class="dropdown-divider">
        <a class="dropdown-item" href="<?=base_url('index.php/Manager/add_item')?>">Products</a>
        <a class="dropdown-item" href="<?=base_url('index.php/Manager/add_category')?>">category</a>
        <a class="dropdown-item" href="<?=base_url('index.php/Manager/users')?>">users</a>
      <?php endif;?>
      <a class="dropdown-item" href="<?=base_url('index.php/Manager/items')?>"><?php $user['level'];?>Something else here</a>
      <hr class="dropdown-divider">
      <a class="dropdown-item" href="<?=base_url('index.php/home/logout')?>">Logout</a>
        </div>
      </li>
      </ul>
    <?php else:?>
      <a class="nav-link" href="<?=base_url('index.php/home/login')?>">Login</a>
    <?php endif;?>  
  </div>
</nav>
