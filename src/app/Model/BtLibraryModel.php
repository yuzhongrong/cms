<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;


/**
 * Class SeriModel
 * @package App\Model
 */
class BtLibraryModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_host_library';
    }

    public function getSearch($keyWords, $page, $perpage) {

        $qure ='%'.$keyWords.'%';

        return $this->getORM()
            ->select('*')
            ->where("downLoadName like '{$qure}' ")
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

    public function getRecItems( $page, $perpage) {
        return $this->getORM()
            ->select('*')
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

    public function getListTotal($keyWords) {
        $qure ='%'.$keyWords.'%';
        $total = $this->getORM()
            ->where("downLoadName like '{$qure}' ")
            ->count('id');

        return intval($total);
    }

    public function getById($md5id) {

        return $this->getORM()
            ->select('*')
            ->where("mv_md5_id='{$md5id}' ")
            ->fetchAll();
    }

    /**
     * 获取在线剧集推荐
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getBtByCategory($page, $perpage , $qure) {

        $type=array("latest"=>"最新电影",
            "highdpi"=>"经典高清",
            "cznmv"=>"国配电影",
            "hungkong"=>"经典港片",
            "native"=>"国剧",
            "koria"=>"日韩剧",
            "america"=>"美剧",
            "complex"=>"综艺",
            "curtoon"=>"动漫",
            "document"=>"纪录片",
            "k720p"=>"720P/1080P",
            "k4mv"=>"4K高清区");

        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }
}
