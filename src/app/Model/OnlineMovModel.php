<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

/**
 * Class OnlineMovModel
 * @package App\Model
 */
class OnlineMovModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_online_mv_library';
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
    public function getOnlineMvListItems($page, $perpage , $qure) {
        $type=array(
            "comedy"=>"喜剧片",
            "love"=>"爱情片",
            "science"=>"科幻片",
            "terror"=>"恐怖片",
            "story"=>"剧情片",
            "war"=>"战争片",
            "document"=>"记录片",
            "show"=>"综艺片");
        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }


    /**
     * 获取在线影片推荐
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getOnlineMovRandom($page, $perpage , $qure) {

        $type=array(
            "comedy"=>"喜剧片",
            "love"=>"爱情片",
            "science"=>"科幻片",
            "terror"=>"恐怖片",
            "story"=>"剧情片",
            "war"=>"战争片",
            "document"=>"记录片",
            "show"=>"综艺片");

        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('rand()')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }
}
