<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AdminsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    // $this->hasMany('Vendors',[
    //   'className'=>'Vendors',
    //   'foreignKey'=>'created_by',
    // ]);
    // $this->hasMany('Vendors',[
    //   'className'=>'Vendors',
    //   'foreignKey'=>'modified_by',
    // ]);
  }
}

?>