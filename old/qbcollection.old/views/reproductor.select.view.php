<form class="zkwp-tools-form" method="get">
    <select name="zkwp-tools-key" class="zkwp-tools-key">
        <optgroup>
            <option style="padding:0" value="-1">Wybierz...</option>
            <?php
            $group_id = -1;
            $translations = '';
            foreach ($this->itemList as $item) {
                /* grouping */
                if ($item->group_id != $group_id) {
                    $group_id = $item->group_id;
                    echo '</optgroup>';
                    echo '<optgroup label="', $item->group_name, '">';
                }
                /* actual item option */
                $selected = '';
                if ($this->selectedKey == $item->breed_id) {
                    $selected = ' selected="selected"';
                    $translations = $this->fieldArrayToValues($item, array('breed_pl', 'breed_en', 'breed_de'));
                }
                ?>
                <option value="<?php echo $item->breed_id ?>" <?php echo $selected ?> >
                    <?php echo $item->breed_name ?>
                </option>
            <?php } ?>
        </optgroup>
    </select>
    <button type="submit" class="zkwp-tools-select-search">Szukaj</button>
</form>
<?php
if (strlen($translations) > 0) {
    echo '<p><em>', $translations, '</em></p>';
}