<?php
namespace App\Controller\Component;
 
use Cake\Controller\Component;
 
class CommonComponent extends Component {

    public function mattersDivisionWord($val){
        switch($val){
            case 1:
                return '見積依頼';
            case 2:
                return '提案依頼';
        }
        return 'error';
    }

    public function mattersStatusWord($val){
        switch($val){
            case 1:
                return '商談中';
            case 2:
                return 'アラート';
            case 9:
                return '商談成立';
        }
        return 'error';
    }

    public function resultsDivisionWord($val){
        switch($val){
            case 0:
                return '商談中';
            case 1:
                return '採用';
            case 2:
                return '不採用';
        }
        return 'error';
    }

    public function adminsAuthorityWord($val){
        switch($val){
            case 1:
                return '一般ユーザー';
            case 9:
                return 'システム管理者';
        }
        return 'error';
    }

    public function deleteFlagWord($val){
        switch($val){
            case 0:
                return 'アクティブ';
            case 1:
                return '削除';
        }
        return 'error';
    }
}
?>
