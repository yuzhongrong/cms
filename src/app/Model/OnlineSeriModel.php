<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;


/**
 * Class OnlineMovModel
 * @package App\Model
 */
class OnlineSeriModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_online_library';
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

    public function getListTotal($keyWords) {
        $qure ='%'.$keyWords.'%';
        $total = $this->getORM()
            ->where("downLoadName like '{$qure}' ")
            ->count('id');

        return intval($total);
    }

    /**
     * 获取在线影片
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getOnlineSeriListItems($page, $perpage , $qure) {

        $type=array(
            "hongkong"=>"香港剧",
            "taiwan"=>"台湾剧",
            "native"=>"国产剧",
            "japanise"=>"日本剧",
            "show"=>"综艺片",
            "america"=>"欧美剧",
            "koria"=>"韩剧",
            "curtoon"=>"动漫",
            "good"=>"福利片",
            "ocean"=>"海外剧");

        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

    /**
     * 获取在线剧集推荐
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getOnlineSeriRandom($page, $perpage , $qure) {

        $type=array(
            "hongkong"=>"香港剧",
            "taiwan"=>"台湾剧",
            "native"=>"国产剧",
            "japanise"=>"日本剧",
            "show"=>"综艺片",
            "america"=>"欧美剧",
            "koria"=>"韩剧",
            "curtoon"=>"动漫",
            "good"=>"福利片",
            "ocean"=>"海外剧");

        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('rand()')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }
}
