<aside class="sidebar">
  <div class="collection with-header">

    <div class="collection-header">案件</div>
    <?= $this->Html->link('案件一覧', ['controller'=>'matters', 'action'=>'index'], ['class'=>'collection-item sidebar_link']) ?>
    <?= $this->Html->link('案件登録', ['controller'=>'matters', 'action'=>'add'], ['class'=>'collection-item sidebar_link']) ?>

    <div class="collection-header">クライアント</div>
    <?= $this->Html->link('クライアント一覧', ['controller'=>'clientCps', 'action'=>'index'], ['class'=>'collection-item sidebar_link']) ?>

    <div class="collection-header">ベンダー</div>
    <?= $this->Html->link('ベンダー一覧', ['controller'=>'vendors', 'action'=>'index'], ['class'=>'collection-item sidebar_link']) ?>
    <?= $this->Html->link('ベンダー登録', ['controller'=>'vendors', 'action'=>'add'], ['class'=>'collection-item sidebar_link']) ?>

    <div class="collection-header">管理ユーザー</div>
    <?= $this->Html->link('管理ユーザー一覧', ['controller'=>'admins', 'action'=>'index'], ['class'=>'collection-item sidebar_link']) ?>
    <?= $this->Html->link('管理ユーザー登録', ['controller'=>'admins', 'action'=>'add'], ['class'=>'collection-item sidebar_link']) ?>

  </div>
</aside>