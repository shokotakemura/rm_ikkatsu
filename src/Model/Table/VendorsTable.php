<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class VendorsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    $this->belongsTo('CreatedBy',[
      'className'=>'Admins',
      'foreignKey'=>'id',
      'propertyName'=>'created_by',
    ]);
    $this->belongsTo('ModifiedBy',[
      'className'=>'Admins',
      'foreignKey'=>'id',
      'propertyName'=>'modified_by',
    ]);
    $this->hasMany('Results');
  }
}

?>