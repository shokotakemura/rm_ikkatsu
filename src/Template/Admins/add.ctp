<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($matter = null); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>管理ユーザ名</td>
        <td><?= $this->Form->input('name', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>パスワード</td>
        <td><?= $this->Form->input('password', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?= $this->Form->input('mail', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>権限</td>
        <td>
          <?=$this->Form->select('authority',
            [['value'=>'1','text'=>'一般ユーザー'],
              ['value'=>'9','text'=>'最高管理者']],
            ['class'=>'browser-default tableEdit_select']
          ) ?>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="page pageShow">
    <?= $this->Form->button('確認する', ['class'=>'btn pageShow_btn-edit']); ?>
  </div>
<?= $this->Form->end(); ?>