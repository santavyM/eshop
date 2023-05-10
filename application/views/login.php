<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container">
		<div class="row">
			<div class="col-6 offset-md-3 text-center">
			<h1 class='mb-3'>Login</h1>
			<?=validation_errors()?>
			<?=form_open("home/login")?>
  <div class="form-group">
    <input type="email" class="form-control" placeholder="Email" required name="email" value="<?=set_value('email')?>">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" placeholder="password" required name="password" value="<?=set_value('password')?>">
  </div>
  <div class="d-grid gap-2">
  <button type="submit" class="btn btn-primary">Enter</button>
  </div>
	<?=form_close()?>
                <div class="row">
                    <div class="col-12">
                    <a class="btn btn-info mt-4" href="<?=base_url('index.php/home/register')?>">register</a>
                    </div>
                </div>
			</div>
		</div>
	</div>
</body>
</html>
