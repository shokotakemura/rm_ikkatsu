<?php
namespace App\Controller;

use App\Controller\AppController;

class AdminsController extends AppController
  {
    public function login(){
        $title = "ログイン";
        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($this->Auth->authenticationProvider()->needsPasswordRehash()) {
                    $user = $this->Admins->get($this->Auth->user('mail'));
                    $user->password = $this->request->data('password');
                    $this->Admins->save($user);
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
        }
    }

  public function index()
  {
    $this->loadComponent('Common');
    $components = ['Common'];

    $title = "管理ユーザー一覧";
    $edit = $this->Admins->findByDeleteFlag(0);
    $admins = $this->Admins->findByDeleteFlag(0);

    foreach ($admins as $admin) {      
      $admin->authority_word = $this->Common->adminsAuthorityWord($admin->authority);
    }

    $this->set(compact('admins', 'edit', 'title'));

    if($this->request->is('put')){
      foreach ($this->request->data as $d){
        foreach ($d as $dd){
          $admin = $this->Admins->get($dd['id']);
          $delete = $this->Admins->patchEntity($admin, $dd);
          $this->Admins->save($delete);
        }
      }
      return $this->redirect(['action'=>'index']);
    }
  }

  public function view($id = null)
  {
    $title = "管理ユーザー情報";
    // $admin = $this->Admins->get($id);
    $admin = $this->Admins->get($id, [
      'contain' => ['CreatedBy','ModifiedBy','Results'],
    ]);
    $this->set(compact('admin','title'));
  }

  public function add(){
    $title = "管理ユーザー登録";
    $admin = $this->Admins->newEntity();
    $this->set(compact('admin', 'title'));
    if($this->request->is('post')){
      $this->request->session()->write('Admin', $this->request->data);
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function addConfirm(){
    //ブラウザに表示
    $title = "入力内容確認";
    $admin_array = $this->request->session()->read('Admin');
    $admin = (object)$admin_array;
    $this->set(compact('admin','title'));

    if($this->request->is('post')){
      $admin_add = $this->Admins->newEntity();
      $admin_add = $this->Admins->patchEntity($admin_add, $admin_array); 
      $this->Admins->save($admin_add);
      return $this->redirect(['action'=>'index']);
    }else if($this->request->is('put')){
      //$addAdmin = $this->Admins->newEntity();
      $addAdmin = $this->Admins->patchEntity($admin, $this->request->data);
      //debug($addAdmin);
      $this->Admins->save($addAdmin);
      return $this->redirect(['action'=>'index']);
    }
  }

}
