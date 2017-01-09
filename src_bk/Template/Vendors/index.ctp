<div class="row">
  <h1 class="col m12 title">ベンダー一覧</h1>
</div>

<?= $this->Form->create($vendor = null); ?>
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
          <td><?= h($vendor->id); ?></td>
          <td><?= $this->Html->link($vendor->name,['action'=>'view', $vendor->id]); ?></td>
          <td class="center">
            <?= $this->Form->checkbox('delete_flag', $options=array('id'=>'check'.$vendor->id, 'value'=>'1', 'class'=>'tableIndex_deleteCheckbox')); ?>
            <label for="check<?= $vendor->id ?>"></label>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->Form->end(); ?>
