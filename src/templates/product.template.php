<div>
<?php
foreach ($this->datas as $id => $item) {
    ?>
    <div class="st-product-box">
      <div class="st-product-img-container">
        <a href="<?php echo $item->link ?>?product_id=<?php echo $item->id ?>" title="<?php echo $item->label ?>">
          <img class="st-product-img" src="<?php echo $item->image ?>" title="<?php echo $item->label ?>" alt="" />
        </a>
      </div>
      <div class="st-product-txt-container">
        <h4 class="st-product-header"><?php echo $item->label ?></h4>
        <p><?php echo $item->description_short ?></p>
        <a href="<?php echo $item->link ?>?product_id=<?php echo $item->id ?>" class="st-product-button button button-green" title="<?php echo $item->label ?>">Zamów</a>
      </div>
    </div>
<?php

}
?>
</div>
<div style="clear:both"></div>
