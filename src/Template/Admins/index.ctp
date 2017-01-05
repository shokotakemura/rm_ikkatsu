<div class="row">
  <h1 class="col m12 title">管理ユーザー一覧</h1>
</div>

<?= $this->Form->create($admin = null); ?>
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
          <td><?= $this->Html->link($admin->name,['action'=>'view', $admin->id]); ?></td>
          <td><?= h($admin->mail); ?></td>
          <td><?= h($admin->password); ?></td>
          <td><?= h($admin->authority); ?></td>
          <td class="center">
            <?= $this->Form->checkbox('delete_flag', $options=array('id'=>'check'.$admin->id, 'value'=>'1', 'class'=>'tableIndex_deleteCheckbox')); ?>
            <label for="check<?= $admin->id ?>"></label>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->Form->end(); ?>
