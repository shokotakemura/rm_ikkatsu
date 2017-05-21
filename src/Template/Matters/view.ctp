<!--メインコンテンツ_タイトル-->
<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>
<!--メインコンテンツ_検索結果-->
<form action="#">
  <table class="bordered table tableShow">
    <tbody>
      <tr>
        <td>案件ID</td>
        <td><?= h($matter->id); ?></td>
      </tr>
      <tr>
        <td>クライアント会社名</td>
        <td>
          <?= $this->Html->link(
            $client_cp->name,
            ['action'=>'../clientCps/view', $client_cp->name],
            ['target' => '_blank']
          ); ?>
        </td>
      </tr>
      <tr>
        <td>案件区分</td>
        <td>
          <?php if($matter->division == 1): ?>
            見積依頼
          <?php elseif($matter->division == 2): ?>
            提案依頼
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>案件概要</td>
        <td><?= h($matter->summary); ?></td>
      </tr>
      <tr>
        <td>ステータス</td>
        <td>
          <?php if($matter->status == 1): ?>
            商談中
          <?php elseif($matter->status == 2): ?>
            アラート
          <?php elseif($matter->status == 9): ?>
            商談成立
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>案件詳細</td>
        <td><?= h($matter->text); ?></td>
      </tr>
      <tr>
        <td>担当者氏名（漢字）</td>
        <td><?= h($client_rep->name_kanji); ?></td>
      </tr>
      <tr>
        <td>担当者氏名（かな）</td>
        <td><?= h($client_rep->name_kana); ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?= h($client_rep->mail); ?></td>
      </tr>
      <tr>
        <td>郵便番号</td>
        <td><?= h($client_rep->zip_code); ?></td>
      </tr>
      <tr>
        <td>住所</td>
        <td><?= h($client_rep->address); ?></td>
      </tr>
      <tr>
        <td>建物名</td>
        <td><?= h($client_rep->address2); ?></td>
      </tr>
      <tr>
        <td>電話番号</td>
        <td><?= h($client_rep->phone); ?></td>
      </tr>          
      <tr>
        <td>登録日時</td>
        <td><?= date_format($matter->created, 'Y年m月d日 H:i:s'); ?></td>
      </tr>
      <tr>
        <td>最終メール受信日時</td>
        <td><?= date_format($matter->last_mail_recieved, 'Y年m月d日 H:i:s'); ?></td>
      </tr>
    </tbody>
  </table>
</form>
<div class="page pageShow">
  <?= $this->Html->link('編集する', ['action'=>'edit', $matter->id], ['class'=>'btn pageShow_btn-edit']); ?>
</div>

<div class="row">
  <h1 class="col m12 title">成果物</h1>
</div>

<?= $this->Form->create($vendor = null); ?>
<table class="showList_table">
  <thead>
    <tr>
      <th rowspan="2">#</th>
      <th>ベンダー</th>
      <th>金額（税抜）</th>
      <th>採用区分</th>
      <th rowspan="2">ファイル<br/>を開く</th>
      <th rowspan="2">編集<br/>する</th>
      <th rowspan="2"><span class="btn showList_deleteBtn">一括<br/>削除</span></th>
    </tr>
    <tr>
      <th colspan="3">備考</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $result) : ?>
      <tr>
        <td rowspan="2"><?= $this->Html->link($result->id,['action'=>'view', $result->id]); ?></td>
        <td><?= $this->Html->link($result->vendor_name,['action'=>'../vendors/view', $result->vendor_id]); ?></td>
        <td><?= number_format($result->price); ?>円</td>
        <td>
          <?php if($result->division == 0): ?>
            商談中
          <?php elseif($result->division == 1): ?>
            採用
          <?php elseif($result->division == 2): ?>
            不採用
          <?php endif; ?>
        </td>
        <td rowspan="2" class="center"><i class="material-icons">file_download</i></td>
        <td rowspan="2" class="center"><?= $this->Html->link('<i class="material-icons">create</i>', ['action'=>'../results/edit', $result->id], ['escape'=>false]); ?></a></td>
        <td rowspan="2" class="center"><input type="checkbox" id="test4" class="showList_deleteCheckbox" /><label for="test4"></label></td>
      </tr>
      <tr>
        <td colspan="3"><?= h($result->note); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->Form->end(); ?>
<div class="page pageShow">
  <?= $this->Html->link('登録する', ['action'=>'../results/add'], ['class'=>'btn pageShow_btn-edit']); ?>
</div>