<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>products</h1>
        </div>
    </div>
    <div class="row">
        <?php if(count($items) == 0):?>
            <div class="col-6">
                <div class="alert alert-danger">Product not found</div>
            </div>
        <?php endif;?>
        <?php foreach($items as $item): ?>
            <div class="col-4">
            <img class="card-img-top" src="<?=base_url('uploads/'.$item->image)?>" alt="<?=$item->title?>">
            <div class="card-body">
                <h5 class="card-title"><?=$item->id.(') ').$item->title?> </h5>
                <p class="card-text">$<?=$item->price?></p>
                <a href="<?=base_url('index.php/add/'.$item->id)?>" class="btn btn-primary"> pridej do kosiku</a>
            </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="row">
        <?=$pagination?>
    </div>
</div>