<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($vendor); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>会社名</td>
        <td><?= h($vendor->name); ?></td>
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