<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

/**
 * Class SubjectModel
 * @package App\Model
 */
class SubjectModel extends NotORM {

    protected function getTableName($id) {
        return 'suject_name';
    }

    public function getListItems( $page, $perpage) {
        return $this->getORM()
            ->select('*')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

}
