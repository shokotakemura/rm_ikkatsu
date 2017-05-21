<?php

namespace App\Controller;

class MattersController extends AppController
{

  public function index()
  {
    $this->loadComponent('Common');
    $components = ['Common'];
    $title = "案件一覧";
    $edit = $this->Matters->findByDeleteFlag(0);
    $matters = $this->Matters->findByDeleteFlag(0);
    $matters->find('all',[
      'contain' => ['Results' =>['Vendors'], 'ClientReps' => ['ClientCps']],
    ]);

    foreach ($matters as $matter) {      
      $matter->division_word = $this->Common->mattersDivisionWord($matter->division);
      $matter->status_word = $this->Common->mattersStatusWord($matter->status);
    }

    $this->set(compact('matters', 'title', 'edit'));

    if($this->request->is('put')){
      foreach ($this->request->data as $d){
        foreach ($d as $dd){
          $matter = $this->Matters->get($dd['id']);
          $delete = $this->Matters->patchEntity($matter, $dd);
          $this->Matters->save($delete);
        }
      }
      return $this->redirect(['action'=>'index']);
    }
  }

  public function view($id = null)
  {
    $title = "案件詳細";

    $matter = $this->Matters->get($id);

    $this->loadModel('ClientReps');
    $client_rep = $this->ClientReps->get($matter->client_rep_id);

    $this->loadModel('ClientCps');
    $client_cp = $this->ClientCps->get($client_rep->client_cp_id);

    $this->loadModel('Results');
    $results = $this->Results->find('all')->where(['matter_id'=>$matter->id, 'delete_flag'=>0]);

    foreach($results as $result){
      $this->loadModel('Vendors');
      $vendor = $this->Vendors->get($result->vendor_id);
      $result->vendor_name = $vendor->name;
    }

    $this->set(compact('matter', 'client_rep', 'client_cp', 'results', 'title', 'matters'));
  }

  public function add(){
    $this->loadModel('ClientCps');
    $this->loadModel('ClientReps');

    $title = "案件登録";
    $this->set(compact('matter', 'title'));

    if($this->request->is('post')){
      $matter = [
        'division' => $this->request->data['division'],
        'summary' => $this->request->data['summary'],
        'text' => $this->request->data['text'],
      ];
      $client_cp = [
        'name' => $this->request->data['client_cp_name'],
      ];
      $client_rep = [
        'name_kanji' => $this->request->data['client_rep_name_kanji'],
        'name_kana' => $this->request->data['client_rep_name_kana'],
        'mail' => $this->request->data['client_rep_mail'],
        'zip_code' => $this->request->data['client_rep_zip_code'],
        'address' => $this->request->data['client_rep_address'],
        'address2' => $this->request->data['client_rep_address2'],
        'phone' => $this->request->data['client_rep_phone'],
      ];

      $this->request->session()->write('Matter', $matter);
      $this->request->session()->write('ClientCp', $client_cp);
      $this->request->session()->write('ClientRep', $client_rep);
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function edit($id = null){
    $this->loadModel('ClientCps');
    $this->loadModel('ClientReps');

    $title = "案件編集";
    $matter = $this->Matters->get($id);
    $this->set(compact('matter','title'));
    if($this->request->is('put')){
      $matter = $this->Matters->patchEntity($matter, $this->request->data);
      $this->request->session()->write('Matter', $matter);
      return $this->redirect(['action'=>'addConfirm']);
    }
  }

  public function addConfirm(){
    $this->loadModel('ClientCps');
    $this->loadModel('ClientReps');

    $title = "入力内容確認";
    $matter_array = $this->request->session()->read('Matter');
    $client_cp_array = $this->request->session()->read('ClientCp');
    $client_rep_array = $this->request->session()->read('ClientRep');

    $matter = (object)$matter_array;
    $client_cp = (object)$client_cp_array;
    $client_rep = (object)$client_rep_array;
    $this->set(compact('matter','client_cp', 'client_rep', 'title'));

    if($this->request->is('post')){
      $client_cp_name = $this->ClientCps->find()->where(['name'=>$client_cp->name])->first();
      $client_cp_id;
      if ($client_cp_name == null){
        $client_cp_add = $this->ClientCps->newEntity();
        $client_cp_add = $this->ClientCps->patchEntity($client_cp_add, $client_cp_array);
        $this->ClientCps->save($client_cp_add);
        $client_cp_id = $this->ClientCps->find()->order(['id' => 'DESC'])->first()->id;
      }else{
        $client_cp_id = $this->ClientCps->find()->order(['id' => 'DESC'])->first()->id;
      }

      $client_rep_array['client_cp_id'] = $client_cp_id;
      $client_rep_add = $this->ClientReps->newEntity();
      $client_rep_add = $this->ClientReps->patchEntity($client_rep_add, $client_rep_array);       
      $this->ClientReps->save($client_rep_add);

      $client_rep_id = $this->ClientReps->find()->order(['id' => 'DESC'])->first()->id;
      $matter_array['client_rep_id'] = $client_rep_id;
      $matter_add = $this->Matters->newEntity();
      $matter_add = $this->Matters->patchEntity($matter_add, $matter_array);
      $this->Matters->save($matter_add);

      return $this->redirect(['action'=>'index']);
    }else if($this->request->is('put')){
      $addMatter = $this->Matters->newEntity();
      $addMatter = $this->Matters->patchEntity($matter, $this->request->data);
      debug($addMatter);
      $this->Matters->save($addMatter);
      return $this->redirect(['action'=>'index']);
    }
  }
}

?>