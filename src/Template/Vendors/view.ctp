<!--メインコンテンツ_タイトル-->
<div class="row">
  <h1 class="col m12 title">ベンダー情報</h1>
</div>
<!--メインコンテンツ_検索結果-->
<form action="#">
  <table class="bordered table tableShow">
    <tbody>
      <tr>
        <td>ベンダーID</td>
        <td><?= h($vendor->id) ?></td>
      </tr>
      <tr>
        <td>会社名</td>
        <td><?= h($vendor->name) ?></td>
      </tr>
      <tr>
        <td>登録日時</td>
        <td><?= h($vendor->created) ?></td>
      </tr>
      <tr>
        <td>登録ユーザー</td>
        <td><?= h($vendor->created_by->name) ?></td>
      </tr>
      <tr>
        <td>最終更新日時</td>
        <td><?= h($vendor->modified) ?></td>
      </tr>
      <tr>
        <td>更新ユーザー</td>
        <td><?= h($vendor->modified_by->name) ?></td>
      </tr>
    </tbody>
  </table>
</form>
<div class="page pageShow">
  <?= $this->Html->link('編集する', ['action'=>'edit'], ['class'=>'btn pageShow_btn-edit']); ?>
</div>

<div class="row">
  <h1 class="col m12 title">成果物</h1>
</div>
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
    <tr>
      <td rowspan="3">1</td>
      <td colspan="3"><a href="../matter/1.html">あああああああああああああああああああああ</a></td>
      <td rowspan="3" class="center"><i class="material-icons">file_download</i></td>
      <td rowspan="3" class="center"><a href="../result/edit.html"><i class="material-icons">create</i></a></td>
      <td rowspan="3" class="center"><input type="checkbox" id="test4" class="showList_deleteCheckbox" /><label for="test4"></label></td>
    </tr>
  </tbody>
</table>
