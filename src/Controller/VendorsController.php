<?php

namespace App\Controller;

class VendorsController extends AppController
{
  public function index()
  {
    $title = "ベンダー一覧";
    $vendors = $this->Vendors->find('all');
    $this->set(compact('vendors','title'));
  }

  public function view($id = null)
  {
    $title = "ベンダー情報";
    // $vendor = $this->Vendors->get($id);
    $vendor = $this->Vendors->get($id, [
      'contain' => ['CreatedBy','ModifiedBy','Results'],
    ]);
    $this->set(compact('vendor','title'));
  }

  public function add(){
    $title = "ベンダー登録";
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

?>