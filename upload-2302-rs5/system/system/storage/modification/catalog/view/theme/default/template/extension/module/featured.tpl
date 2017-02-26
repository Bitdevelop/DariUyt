
<div class="section-list">
  <div class="row">
      <div class="col-xs-12 col-sm-6"><h2>Специальные предложения</h2></div>
      <div class="col-xs-12 col-sm-6"><a href="#" class="title-label">Новинки</a></div>
  </div>
  <div class="row">
    <?php foreach ($products as $product) { ?>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
      <?php if ($product['special']) { ?>
       <div class="section-list-item section-list-item-sale">
                            <div class="section-list-item-salelabel"><?php echo $product['percent']; ?></div>
      <?php } ?>
  <?php if (!$product['special']) { ?>
       <div class="section-list-item">
   <?php } ?>

    <a href="<?php echo $product['href']; ?>" class="section-list-item-img"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>"></a>
                            <a href="<?php echo $product['href']; ?>" class="section-list-item-name"><?php echo $product['name']; ?></a>
                            <div class="section-list-item-bottom">
                                <?php if (!$product['special']) { ?> <span class="section-list-item-price"><b><?php echo $product['price']; ?></b></span>   <?php } ?>
                                <?php if ($product['special']) { ?>  <span class="section-list-item-price"><span class="strike"><?php echo $product['price']; ?></span> - <b><?php echo $product['special']; ?></b></span>  <?php } ?>
                                <a class="btn-buy" href="#" onclick="cart.add('<?php echo $product['product_id']; ?>');"></a>
                            </div>
                        </div>
                    </div>
                </div>
                       

 <?php } ?>

ы


