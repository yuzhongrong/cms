<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;


/**
 * Class MovModel
 * @package App\Model
 */
class MovBannerModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_banner';
    }

    public function getListItems( $page, $perpage) {
        return $this->getORM()
            ->select('*')
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

    public function  deleteData($md5id){
       return $this->getORM()->where('mv_md5_id', $md5id)->delete();
    }

}
