<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($matter = null); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>会社名</td>
        <td><?= $this->Form->input('client_cp_name', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>案件区分</td>
        <td>
          <?=$this->Form->select('division',
            [['value'=>'1','text'=>'見積依頼'],
              ['value'=>'2','text'=>'提案依頼']],
            ['class'=>'browser-default tableEdit_select']
          ) ?>
        </td>
      </tr>
      <tr>
        <td>案件概要</td>
        <td><?= $this->Form->input('summary', ['class'=>'tableEdit_input']) ?></td>
      </tr>           
      <tr>
        <td>案件詳細</td>
        <td><?= $this->Form->input('text', ['class'=>'tableEdit_textarea']) ?></textarea></td>
      </tr>
      <tr>
        <td>担当者氏名（漢字）</td>
        <td><?= $this->Form->input('client_rep_name_kanji', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>担当者氏名（かな）</td>
        <td><?= $this->Form->input('client_rep_name_kana', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><?= $this->Form->input('client_rep_mail', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>郵便番号</td>
        <td><?= $this->Form->input('client_rep_zip_code', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>住所</td>
        <td><?= $this->Form->input('client_rep_address', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>建物名</td>
        <td><?= $this->Form->input('client_rep_address2', ['class'=>'tableEdit_input']) ?></td>
      </tr>
      <tr>
        <td>電話番号</td>
        <td><?= $this->Form->input('client_rep_phone', ['class'=>'tableEdit_input']) ?></td>
      </tr>
    </tbody>
  </table>

  <div class="page pageShow">
    <?= $this->Form->button('確認する', ['class'=>'btn pageShow_btn-edit']); ?>
  </div>
<?= $this->Form->end(); ?>