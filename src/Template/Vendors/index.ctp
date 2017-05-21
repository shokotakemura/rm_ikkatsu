<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($edit);?>
  <table class="bordered highlight table tableIndex">
    <thead>
      <tr>
        <th>#</th>
        <th>ベンダー名</th>
        <th class="center">
          <?= $this->Form->button('一括削除', ['class'=>'btn tableIndex_deleteBtn']); ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($vendors as $vendor) : ?>
        <tr>
          <td><?= $this->Html->link($vendor->id,['action'=>'view', $vendor->id]); ?></td>
          <?= $this->Form->hidden('Vendors.'.$vendor->id.'.id', ['value'=>$vendor->id]); ?>
          <td><?= $this->Html->link($vendor->name,['action'=>'view', $vendor->id]); ?></td>
          <td class="center">
            <?= $this->Form->checkbox('Vendors.'.$vendor->id.'.delete_flag', $options=array('id'=>'delete_flag.'.$vendor->id, 'value'=>'1', 'class'=>'tableIndex_deleteCheckbox')); ?>
            <label for="delete_flag.<?= $vendor->id ?>"></label>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->Form->end(); ?>