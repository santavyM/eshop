<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="<?=base_url('/assets/css/style.css')?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=base_url()?>">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
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
        
      </ul>
      <form class="d-flex">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning" type="submit">Search</button>
    </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if(isset($user['logged']) && $user['logged']):?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$user['first_name']?>
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="<?=base_url('index.php/home/cart')?>">Shopping Cart</a>
          <?php if(($user['level']) !== null):?>
            <hr class="dropdown-divider">
        <a class="dropdown-item" href="<?=base_url('index.php/Manager/add_item')?>">Add Product</a>
        <a class="dropdown-item" href="<?=base_url('index.php/Manager/add_category')?>">Add Category</a>
        <a class="dropdown-item" href="<?=base_url('index.php/Manager/users')?>">Users</a>
      <?php endif;?>
      <a class="dropdown-item" href="<?=base_url('index.php/Manager/items')?>">Products</a>
      <hr class="dropdown-divider">
      <a class="dropdown-item" href="<?=base_url('index.php/home/logout')?>">Logout</a>
        </div>
      </li>
      </ul>
    <?php else:?>
      <a class="nav-link" href="<?=base_url('index.php/home/login')?>">Login</a>
    <?php endif;?> 
    </div>
  </div>
  <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="<?=base_url('index.php/home/cart')?>" class="btn">
                                <i class="fas fa-shopping-cart text-primary fa-lg"></i>
                            </a>
  </div>
</nav class="">
<div class="mb-5">