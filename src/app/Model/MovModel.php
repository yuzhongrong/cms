<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

/**
 * Class MovModel
 * @package App\Model
 */
class MovModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_update';
    }

    public function getListItems( $page, $perpage) {
        return $this->getORM()
            ->select('*')
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

}
