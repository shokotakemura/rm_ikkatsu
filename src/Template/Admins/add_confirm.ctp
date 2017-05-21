<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($admin); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>管理ユーザ名</td>
        <td><?= h($admin->name); ?></td>
      </tr>
      <tr>
        <td>パスワード</td>
        <td><?= h($admin->password); ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?= h($admin->mail); ?></td>
      </tr>
      <tr>
        <td>権限</td>
        <td>
          <?php if($admin->authority == 1): ?>
            一般ユーザー
          <?php elseif($admin->authority == 9): ?>
            最高管理者
          <?php endif; ?>
        </td>
      </tr>
    </tbody>
  </table>
  <?= $this->Form->hidden('name'); ?>

  <div class="page pageShow">
    <?= $this->Html->link('戻る', ['action'=>'add']); ?>
    <?= $this->Form->button('登録する', ['type' => 'submit', 'class'=>'btn pageShow_btn-edit']);
       ?>
  </div>
<?= $this->Form->end(); ?>