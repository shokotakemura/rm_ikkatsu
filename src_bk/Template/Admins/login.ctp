<?= $this->Flash->render('auth'); ?>
<div class="middle center row">
    <?= $this->Form->create(''); ?>
    <div class="col m4">
        <?= $this->Form->input('mail', ['class'=>'form-control', 'placeholder'=>'メールアドレス']); ?>
        <?= $this->Form->input('password', ['class'=>'form-control', 'placeholder'=>'パスワード']);?>
        <?= $this->Form->button('ログイン', ['class'=>'btn']); ?>
    </div>
    <?= $this->Form->end(); ?>
</div>