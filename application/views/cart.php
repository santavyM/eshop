<hr>
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
            <?php if(!isset($items) || count($items) == 0):?>
                <div class="alert alert-warning">your card is empty</div>
            <?php else:?>
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php foreach ($items as $id => $item): ?>
                    <tbody class="align-baseline">
                        <tr>
                            <td class=""><img src="<?=base_url('uploads/'.$item->image)?>" alt="" style="width: 50px;"><?=$item->title?></td>
                            <td class="align-middle">$<?=$item->price?></td>
                            <td class="align-middle"><a class="btn btn-danger delete" href="<?=base_url('index.php/home/cart?del='.($id+1))?>">del</a></td>
                        </tr>
                    </tbody>
                    <?php endforeach;?> 
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$<?=$total?></h5>
                        </div>
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="<?=base_url('index.php/home/checkout')?>">Checkout</a>
                    </div>
                </div>
            </div>
            <?php endif;?> 
        </div>
    </div>