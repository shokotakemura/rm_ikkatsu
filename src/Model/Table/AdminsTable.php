<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AdminsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsTo('CreatedBy',[
      'className'=>'Admins',
      'foreignKey'=>'created_by',
      'propertyName'=>'created_by',
    ]);
    $this->belongsTo('ModifiedBy',[
      'className'=>'Admins',
      'foreignKey'=>'modified_by',
      'propertyName'=>'modified_by',
    ]);
    
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