<?php foreach ($this->itemList as $item): ?>
    <div class="qbc-item">

        <?php $this->echoImage($item) ?>

        <h3><?php echo $item->name; ?></h3> 

        <?php $this->echoField($item, 'description') ?>
        <p></p>
        <?php $this->echoField($item, 'contact') ?>
        <p></p>
        <?php
        $address = $this->fieldArrayToValues($item, array('postal_code', 'city', 'address'));
        if (strlen($address) > 0) {
            echo 'adres:<br />', $address, '<br />';
        }

        $contact2 = $this->fieldArrayToValues($item, array('phone', 'email', 'website'), '<br />');
        if (strlen($contact2) > 0) {
            echo '<p>', $contact2, '</p>';
        }
        ?>
    </div>
<?php
endforeach;
$this->echoDisclosure();
