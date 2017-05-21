<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create(null); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>会社名</td>
        <td><?= h($client_cp->name); ?></td>
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
    </tbody>
  </table>
  <?= $this->Form->hidden('name'); ?>

  <div class="page pageShow">
    <?= $this->Html->link('戻る', ['action'=>'add']); ?>
    <?= $this->Form->button('登録する', ['type' => 'submit', 'class'=>'btn pageShow_btn-edit']);
       ?>
  </div>
<?= $this->Form->end(); ?>