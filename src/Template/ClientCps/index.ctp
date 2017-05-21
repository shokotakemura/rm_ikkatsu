<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($edit);?>
  <table class="bordered highlight table tableIndex">
    <thead>
      <tr>
        <th>#</th>
        <th>クライアント名</th>
        <th class="center"><span class="btn tableIndex_mergeBtn">マージ</span></th>  
        <th class="center">
          <?= $this->Form->button('一括削除', ['class'=>'btn tableIndex_deleteBtn']); ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($client_cps as $client_cp) : ?>
        <tr>
          <td><?= $this->Html->link($client_cp->id,['action'=>'view', $client_cp->id]); ?></td>
          <?= $this->Form->hidden('ClientCps.'.$client_cp->id.'.id', ['value'=>$client_cp->id]); ?>
          <td><?= $this->Html->link($client_cp->name,['action'=>'view', $client_cp->id]); ?></td>
          <td class="center"><input type="checkbox" id="test6" class="tableIndex_mergeCheckbox" /><label for="test6"></label></td>
          <td class="center">
            <?= $this->Form->checkbox('Vendors.'.$client_cp->id.'.delete_flag', $options=array('id'=>'delete_flag.'.$client_cp->id, 'value'=>'1', 'class'=>'tableIndex_deleteCheckbox')); ?>
            <label for="delete_flag.<?= $client_cp->id ?>"></label>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->Form->end(); ?>