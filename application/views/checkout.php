<div class="container mt-5">
    <div class="text-center">
        <h2>checkout</h2>
    </div>
    <div class="row">
        <h4 class="col-md-8">Billing Address</h4>
        <?=form_open(base_url('index.php/Home/checkout'))?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstname">First name</label>
                    <input type="text" class="firstname form-control" required name="firstname" value="<?=set_value("firstname", $user['first_name'])?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastname">Last name</label>
                    <input type="text" class="lastname form-control" required name="lastname" value="<?=set_value("lastname", $user['last_name'])?>">
                </div>
            </div>
            <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="address form-control" required name="address" value="<?=set_value("address")?>" placeholder="Kunovice 353">
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">choose...</option>
                        <?php foreach($country as $con): ?>
                        <option value="<?=$con['code']?>"><?=$con['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-4 md-3">
                    <label for="state">kraj</label>
                    <input type="text" class="form-control" name="state" value="<?=set_value("state")?>" id="state">
                </div>
                <div class="col-md-4 md-3">
                    <label for="zip">PSČ</label>
                    <input type="text" class="form-control" value="<?=set_value("zip")?>" name="zip" id="zip">
                </div>
            </div>

            <hr class="mb-4">

            <h4>Payment</h4>
            <div class="d-block my-3">
                <div class="custom-control cutom-radio">
                    <input type="radio" id="cash" name="paymentmethod" class="custom-control-input" required>
                    <label class="custom-control-label" for="cash">Hotově při převzetí</label>
                </div>
            </div>

            <hr class="mb-4">
            <div class="d-grid gap-2">
                <button class="d-md-block btn btn-primary font-weight-bold my-3 py-3" type="submit">Potvrdit</button>
            </div>
        <?=form_close()?>
    </div>
</div>