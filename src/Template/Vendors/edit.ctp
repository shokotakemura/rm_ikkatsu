<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($vendor); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>会社名</td>
        <td><?= $this->Form->input('name', ['class'=>'tableEdit_input']) ?></td>
      </tr>
    </tbody>
  </table>

  <div class="page pageShow">
    <?= $this->Form->button('確認する', ['class'=>'btn pageShow_btn-edit']); ?>
  </div>
<?= $this->Form->end(); ?>