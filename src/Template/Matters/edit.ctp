<div class="row">
  <h1 class="col m12 title"><?= h($title); ?></h1>
</div>

<?= $this->Form->create($matter); ?>
  <table class="table tableEdit">
    <tbody>
      <tr>
        <td>クライアント会社名</td>
        <td>RM<br/><a href="../client_cp/1.html">クライアント情報から編集してください</a></td>
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
        <td><?= $this->Form->text('summary', ['value'=>$matter->summary, 'class'=>'tableEdit_input']) ?></td>
      </tr> 
      <tr>
        <td>ステータス</td>
        <td>
          <?php $list=array('1'=>'商談中', '2'=>'アラート', '9'=>'商談成立') ?>
          <?=$this->Form->select('division', $list,
            ['default'=>"9", 'class'=>'browser-default tableEdit_select']
          ) ?>
        </td>
      </tr>                 
      <tr>
        <td>案件詳細</td>
        <td><textarea class="tableEdit_textarea">あいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこ<br/>あいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこ<br/>あいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこ<br/>あいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこあいうえおかきくけこ</textarea></td>
      </tr>
      <tr>
        <td>担当者氏名（漢字）</td>
        <td><input value="案 件太郎" type="text" class="tableEdit_input"></td>
      </tr>
      <tr>
        <td>担当者氏名（かな）</td>
        <td><input value="あんけんたろう" type="text" class="tableEdit_input"></td>
      </tr>
      <tr>
        <td>メールアドレス</td>
        <td><input value="anken@rm.com" type="text" class="tableEdit_input"></td>
      </tr>
      <tr>
        <td>郵便番号</td>
        <td><input value="123−4567" type="text" class="tableEdit_input"></td>
      </tr>
      <tr>
        <td>住所</td>
        <td><input value="東京都世田谷区" type="text" class="tableEdit_input"></td>
      </tr>
      <tr>
        <td>建物名</td>
        <td><input value="アンケンビル" type="text" class="tableEdit_input"></td>
      </tr>
      <tr>
        <td>電話番号</td>
        <td><input value="090-9999-9999" type="text" class="tableEdit_input"></td>
      </tr>
    </tbody>
  </table>

  <div class="page pageShow">
    <?= $this->Form->button('確認する', ['class'=>'btn pageShow_btn-edit']); ?>
  </div>
<?= $this->Form->end(); ?>