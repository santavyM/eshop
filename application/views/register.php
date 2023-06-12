<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container mt-5">
		<div class="row">
			<div class="col-6 offset-md-3 text-center">
			<h1 class='mb-3'>register</h1>
            <?if(isset($success) && $success): ?>
                
            <?else:?>
			<?=validation_errors()?>
			<?=form_open("home/register")?>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" required 
    name="email" value="<?=set_value('email')?>" placeholder="email">
  </div>
  <div class="form-group">
    <label for="text">First Name</label>
    <input type="text" class="form-control" required 
    name="first_name" value="<?=set_value('first_name')?>" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="text">Last name</label>
    <input type="text" class="form-control" required 
    name="last_name" value="<?=set_value('last_name')?>" placeholder="Last Name">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" required 
    name="password" value="<?=set_value('password')?>" placeholder="Password">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" required 
    name="passconf" value="<?=set_value('passconf')?>" placeholder="Password Confirm">
  </div>
  <button type="submit" class="btn btn-success">Register</button>
	<?=form_close()?>
                <div class="row">
                    <div class="col-12">
                    <a class="mt-4" style="color:black" href="<?=base_url('index.php/home/login')?>">Back to login</a>
                    </div>
                </div>
                <?endif;?>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@l.16.0/dist/umd/popper.min.js"></script>
</body>
</html>
