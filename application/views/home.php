<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>products</h1>
        </div>
    </div>
    <div class="row">
        
        <?php foreach($items as $item): ?>
            <div class="col-4">
            <img class="card-img-top" src="<?=('uploads/'.$item->image)?>" alt="<?=$item->title?>">
            <div class="card-body">
                <h5 class="card-title"><?=$item->title?> </h5>
                <p class="card-text">$<?=$item->price?></p>
                <a href="#" class="btn btn-primary"> pridej do kosiku</a>
            </div>
            </div>
        <?php endforeach;?>
    </div>
    <div class="row">
        <?=$pagination?>
    </div>
</div>