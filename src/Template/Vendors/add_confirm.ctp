<div class="row">
  <h1 class="col m12 title">入力内容確認</h1>
</div>

<?= $this->Form->create($vendor); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>会社名</td>
        <td><?= h($s); ?></td>
      </tr>
    </tbody>
  </table>

  <div class="page pageShow">
    <?= $this->Html->link('戻る', ['action'=>'add']); ?>
    <?= $this->Form->postLink('登録する', ['action'=>'addConfirm'], ['class'=>'btn pageShow_btn-edit']); ?>
  </div>
<?= $this->Form->end(); ?>