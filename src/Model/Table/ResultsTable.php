<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ResultsTable extends Table
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
    $this->belongsTo('Vendors');
    $this->belongsTo('Matters');
  }
}

?>