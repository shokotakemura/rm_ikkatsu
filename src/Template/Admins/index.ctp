<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($edit); ?>
  <table class="bordered highlight table tableIndex">
    <thead>
      <tr>
        <th>#</th>
        <th>管理ユーザー名</th>
        <th>メールアドレス</th>
        <th>パスワード</th>
        <th>権限</th>
        <th class="center">
          <?= $this->Form->button('一括削除', ['class'=>'btn tableIndex_deleteBtn']); ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($admins as $admin) : ?>
        <tr>
          <td><?= h($admin->id); ?></td>
          <?= $this->Form->hidden('Admins.'.$admin->id.'.id', ['value'=>$admin->id]); ?>
          <td><?= $this->Html->link($admin->name,['action'=>'view', $admin->id]); ?></td>
          <td><?= h($admin->mail); ?></td>
          <td><?= h($admin->password); ?></td>
          <td><?= h($admin->authority_word); ?></td>
          <td class="center">
            <?= $this->Form->checkbox('Admins.'.$admin->id.'.delete_flag', $options=array('id'=>'delete_flag.'.$admin->id, 'value'=>'1', 'class'=>'tableIndex_deleteCheckbox')); ?>
            <label for="delete_flag.<?= $admin->id ?>"></label>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->Form->end(); ?>
