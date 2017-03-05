<h3><?php echo $this->title, ' (', $this->db->num_rows, ') ' ?></h3>
<?php echo $this->showMessages() ?>
<a class="qbca-add" href="?page=<?php echo $this->page ?>&action=add">
    <span class="qbci-add"></span>Dodaj nowy rekord    
</a>
<table class="qbca-list js-datatable">
    <thead>
        <tr>
            <?php foreach ($this->listColumns as $key => $value): ?>
                <th><?php echo $value ?></th>
            <?php endforeach; ?>
            <th class="qbc-col-100">Aktywny</th>
            <th class="qbc-col-100">Edytuj</th>
            <th class="qbc-col-100">Usuń</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($itemList as $item) : ?>
            <tr>
                <?php foreach ($this->listColumns as $key => $value): ?>
                    <td><?php echo $item->$key ?></td>
                <?php endforeach; ?>     
                <td class="qbc-col-100"><?php echo $item->active ? 'Tak' : '' ?></td>
                <td class="qbc-col-100">
                    <a class="qbca-edit js-edit" title="Edytuj pozycję" href="?page=<?php echo $this->page ?>&action=edit&id=<?php echo $item->id ?>"></a>
                </td>
                <td class="qbc-col-100">
                    <a class="qbca-delete js-delete" title="Usuń pozycję" href="?page=<?php echo $this->page ?>&action=delete&id=<?php echo $item->id ?>"></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>