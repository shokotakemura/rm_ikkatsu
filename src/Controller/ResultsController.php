<?php

namespace App\Controller;

class VendorsController extends AppController
{

  public function index()
  {
    $title = "ベンダー一覧";
    $vendors = $this->Vendors->findByDeleteFlag(0);
    $edit = $this->Vendors->findByDeleteFlag(0);
    $this->set(compact('vendors','title', 'edit'));
    
    if($this->request->is('put')){
      foreach ($this->request->data as $d){
        foreach ($d as $dd){
          $vendor = $this->Vendors->get($dd['id']);
          $delete = $this->Vendors->patchEntity($vendor, $dd);
          $this->Vendors->save($delete);
        }
      }      

      return $this->redirect(['action'=>'index']);
    }
  }

  public function view($id = null)
  {
    $title = "ベンダー情報";

    $vendor = $this->Vendors->get($id, [
      'contain' => ['CreatedBy','ModifiedBy'],
    ]);

    $this->loadModel('Results');
    $results = $this->Results->find('all')->where(['vendor_id'=>$vendor->id, 'delete_flag'=>0]);


    foreach($results as $result){
      $this->loadModel('Matters');
      $matter = $this->Matters->get($result->matter_id,[
        'contain' => ['ClientReps'],
      ]);

      $this->loadModel('ClientReps');
      $clientRep = $this->ClientReps->get($matter->client_rep->id,[
        'contain' => ['ClientCps'],
      ]);


      $result->client_id = $clientRep->client_cp->id;
      $result->client_name = $clientRep->client_cp->name;
    }

    $this->set(compact('vendor', 'results', 'title', 'matters'));

    
  }

  public function add(){
    $title = "ベンダー登録";
    $this->set(compact('vendor','title'));
    if($this->request->is('post')){
      $this->request->session()->write('Vendor', $this->request->data);
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function edit($id = null){
    $title = "ベンダー編集";
    $vendor = $this->Vendors->get($id);
    $this->set(compact('vendor','title'));
    if($this->request->is('put')){
      $vendor = $this->Vendors->patchEntity($vendor, $this->request->data);
      $this->request->session()->write('Vendor', $vendor);     
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function addConfirm(){
    //ブラウザに表示
    $title = "入力内容確認";
    $vendor_array = $this->request->session()->read('Vendor');
    $vendor = (object)$vendor_array;
    $this->set(compact('vendor','title'));

    if($this->request->is('post')){
      $vendor_add = $this->Vendors->newEntity();
      $vendor_add = $this->Vendors->patchEntity($vendor_add, $vendor_array); 
      $this->Vendors->save($vendor_add);
      return $this->redirect(['action'=>'index']);
    }else if($this->request->is('put')){
      //$addVendor = $this->Vendors->newEntity();
      $addVendor = $this->Vendors->patchEntity($vendor, $this->request->data);
      //debug($addVendor);
      $this->Vendors->save($addVendor);
      return $this->redirect(['action'=>'index']);
    }
  }
}

?>