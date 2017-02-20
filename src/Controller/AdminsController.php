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
    $title = "管理ユーザー一覧";
    $admins = $this->Admins->find('all');
    $this->set(compact('admins','title'));
  }

  public function view($id = null)
  {
    $title = "管理ユーザー情報";
    // $vendor = $this->Vendors->get($id);
    $vendor = $this->Vendors->get($id, [
      'contain' => ['CreatedBy','ModifiedBy','Results'],
    ]);
    $this->set(compact('vendor','title'));
  }

  public function add(){
    $title = "管理ユーザー登録";
    $vendor = $this->Vendors->newEntity();
    if($this->request->is('post')){
      $vendor = $this->Vendors->patchEntity($vendor, $this->request->data);
      $this->request->session()->write('s', $vendor->name);
      return $this->redirect(['action'=>'addConfirm']);
    }
    $this->set(compact('vendor'));
  }

  public function addConfirm(){
    $title = "入力内容確認";
    $s = $this->request->session()->read('s');
    // if($this->request->is('post')){
    //   $vendor = $this->Vendors->patchEntity($vendor, $this->request->data);
    //   $this->Vendors->save($vendor);
    //   return $this->redirect(['action'=>'index']);
    // }
    $this->set(compact('vendor','s'));
  }

}
