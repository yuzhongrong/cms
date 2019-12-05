<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;


/**
 * Class SeriModel
 * @package App\Model
 */
class SeriModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_seris';
    }

    public function getListItems( $page, $perpage) {
        return $this->getORM()
            ->select('*')
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

}
