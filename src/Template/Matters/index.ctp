<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($edit);?>
  <table class="bordered highlight table tableIndex">
    <thead>
      <tr>
        <th>#</th>
        <th>クライアント</th>
        <th>案件区分</th>
        <th>案件概要</th>
        <th>ステータス</th>
        <th>最終メール<br/>受信日</th>
        <th>成果物<br/>登録</th>
        <th class="center">
          <?= $this->Form->button('一括削除', ['class'=>'btn tableIndex_deleteBtn']); ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($matters as $matter) : ?>
        <tr>
          <td><?= $this->Html->link($matter->id,['action'=>'view', $matter->id]); ?></td>
          <?= $this->Form->hidden('matters.'.$matter->id.'.id', ['value'=>$matter->id]); ?>
          <td><?= h($matter->client_rep->client_cp->name); ?></td>
          <td><?= h($matter->division_word); ?></td>
          <td><?= $this->Html->link($matter->summary,['action'=>'view', $matter->id]); ?></td>
          <td><?= h($matter->status_word); ?></td>
          <td><?= date_format($matter->last_mail_recieved, 'Y年m月d日 H:i:s'); ?></td>
          <td class="center"><a href="../result/new.html"><i class="material-icons">create</i></a></td>
          <td class="center">
            <?= $this->Form->checkbox('matters.'.$matter->id.'.delete_flag', $options=array('id'=>'delete_flag.'.$matter->id, 'value'=>'1', 'class'=>'tableIndex_deleteCheckbox')); ?>
            <label for="delete_flag.<?= $matter->id ?>"></label>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->Form->end(); ?>