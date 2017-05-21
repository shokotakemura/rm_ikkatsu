<!--メインコンテンツ_タイトル-->
<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>
<!--メインコンテンツ_検索結果-->
<form action="#">
  <table class="bordered table tableShow">
    <tbody>
      <tr>
        <td>ベンダーID</td>
        <td><?= h($vendor->id); ?></td>
      </tr>
      <tr>
        <td>会社名</td>
        <td><?= h($vendor->name); ?></td>
      </tr>
      <tr>
        <td>登録日時</td>
        <td><?= date_format($vendor->created, 'Y年m月d日 H:i:s'); ?></td>
      </tr>
      <tr>
        <td>登録ユーザー</td>
        <td><?= h($vendor->created_by->name); ?></td>
      </tr>
      <tr>
        <td>最終更新日時</td>
        <td><?= date_format($vendor->modified, 'Y年m月d日 H:i:s'); ?></td>
      </tr>
      <tr>
        <td>更新ユーザー</td>
        <td><?= h($vendor->modified_by->name); ?></td>
      </tr>
    </tbody>
  </table>
</form>
<div class="page pageShow">
  <?= $this->Html->link('編集する', ['action'=>'edit', $vendor->id], ['class'=>'btn pageShow_btn-edit']); ?>
</div>

<div class="row">
  <h1 class="col m12 title">成果物</h1>
</div>

<?= $this->Form->create($vendor = null); ?>
<table class="showList_table">
  <thead>
    <tr>
      <th rowspan="3">#</th>
      <th colspan="3">案件</th>
      <th rowspan="3">ファイル<br/>を開く</th>
      <th rowspan="3">編集<br/>する</th>
      <th rowspan="3"><span class="btn showList_deleteBtn">一括<br/>削除</span></th>
    </tr>        
    <tr>
      <th>クライアント</th>
      <th>金額（税抜）</th>
      <th>採用区分</th>
    </tr>
    <tr>
      <th colspan="3">備考</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($results as $result) : ?>
      <tr>
        <td rowspan="3"><?= $this->Html->link($result->id,['action'=>'view', $result->id]); ?></td>
        <td colspan="3"><?= $this->Html->link($result->matter_summary,['action'=>'../matters/view', $result->matter_id]); ?></td>
        <td rowspan="3" class="center"><i class="material-icons">file_download</i></td>
        <td rowspan="3" class="center"><?= $this->Html->link('<i class="material-icons">create</i>', ['action'=>'../results/edit', $result->id], ['escape'=>false]); ?></td>
        <td rowspan="3" class="center"><input type="checkbox" id="test4" class="showList_deleteCheckbox" /><label for="test4"></label></td>
      </tr>
      <tr>
        <td><?= $this->Html->link($result->client_name,['action'=>'clientCps/view', $result->client_id]); ?></td>
        <td><?= number_format($result->price); ?>円</td>
        <td>採用区分</td>
      </tr>
      <tr>
        <td colspan="3"><?= h($result->note); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->Form->end(); ?>