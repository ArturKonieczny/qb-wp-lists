<div class="product-description">
  <div class="store-item-img-container">
    <img class="store-item-img" src="<?php echo $this->datas[0]->image ?>" title="<?php echo $this->datas[0]->label ?>"/>
  </div>
  <p><?php echo $this->datas[0]->description ?></p>
  <h4>Przykładowy skład mieszanki gazonowej <?php echo $this->datas[0]->label ?> z 2015 roku.</h4>
  <ul class="store-item-composition">
    <?php $composition = explode("\n", $this->datas[0]->composition) ?>
    <?php  foreach ($composition as $composition__item): ?>
      <li><?php echo $composition__item ?></li>
    <?php endforeach; ?>
  </ul>
  <h4>Dostępne opakowania</h4>
  <table class="product-item__boxes">
    <tr>
      <th>Rozmiar</th>
      <th>Waga (gramy)</th>
      <th>Cena brutto (zł)</th>
    </tr>
  <?php foreach ($this->datasExtras as $box):?>
    <tr>
      <td><?php echo $box->package_label ?></td>
      <td><?php echo $box->package_weight ?></td>
      <td><?php echo $box->price ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</div>
