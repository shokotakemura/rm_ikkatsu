<?php

namespace App\Controller;

class ClientCpsController extends AppController
{

  public function index()
  {
    $title = "クライアント一覧";
    $edit = $this->ClientCps->findByDeleteFlag(0);
    $client_cps = $this->ClientCps->findByDeleteFlag(0);

    $this->set(compact('client_cps', 'title', 'edit'));

    if($this->request->is('put')){
      foreach ($this->request->data as $d){
        foreach ($d as $dd){
          $matter = $this->ClientCps->get($dd['id']);
          $delete = $this->ClientCps->patchEntity($matter, $dd);
          $this->ClientCps->save($delete);
        }
      }
      return $this->redirect(['action'=>'index']);
    }
  }

  public function view($id = null)
  {
    $title = "ベンダー情報";

    $matter = $this->ClientCps->get($id, [
      'contain' => ['CreatedBy','ModifiedBy'],
    ]);

    $this->loadModel('Results');
    $results = $this->Results->find('all')->where(['matter_id'=>$matter->id, 'delete_flag'=>0]);


    foreach($results as $result){
      $this->loadModel('ClientCps');
      $matter = $this->ClientCps->get($result->matter_id,[
        'contain' => ['ClientReps'],
      ]);

      $this->loadModel('ClientReps');
      $clientRep = $this->ClientReps->get($matter->client_rep->id,[
        'contain' => ['ClientCps'],
      ]);


      $result->client_id = $clientRep->client_cp->id;
      $result->client_name = $clientRep->client_cp->name;
      debug($result);
      
      debug($clientRep);
    }

/*    */

/*   $results = $this->Results->get(1, [
      'contain' => ['ClientCps'],
    ]);*/

/*    $results = $this->ClientCps->get($id, [
      'contain' => ['Results'],
    ]);
    $results = $results['results'];*/


    $this->set(compact('matter', 'results', 'title', 'client_cps'));

    
  }

  public function add(){
    $title = "ベンダー登録";
    $matter = $this->ClientCps->newEntity();
    $this->set(compact('matter','title'));
    if($this->request->is('post')){
      $matter = $this->ClientCps->patchEntity($matter, $this->request->data);
      $this->request->session()->write('Matter', $matter);
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function edit($id = null){
    $title = "ベンダー編集";
    $matter = $this->ClientCps->get($id);
    $this->set(compact('matter','title'));
    if($this->request->is('put')){
      debug($this->request->data);
      $matter = $this->ClientCps->patchEntity($matter, $this->request->data);
      $this->request->session()->write('Matter', $matter);
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function addConfirm(){
    $title = "入力内容確認";
    
    $matter = $this->request->session()->read('Matter');

    $this->set(compact('matter','title'));
    if($this->request->is('post')){
      $addMatter = $this->ClientCps->newEntity();
      $addMatter = $this->ClientCps->patchEntity($addMatter, $this->request->data);
    
      $this->ClientCps->save($addMatter);
      return $this->redirect(['action'=>'index']);
    }else if($this->request->is('put')){
      //$addMatter = $this->ClientCps->newEntity();
      $addMatter = $this->ClientCps->patchEntity($matter, $this->request->data);
      //debug($addMatter);
      $this->ClientCps->save($addMatter);
      return $this->redirect(['action'=>'index']);
    }
  }
}

?>