<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

/**
 * Class SubjectListModel
 * @package App\Model
 */
class SubjectListModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_suject';
    }


    /**
     * 获取专题列表
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getListItems($page, $perpage , $qure) {

        $type=array("douban2017"=>"豆瓣2017电影排行榜",
            "inner2017"=>"2017内地票房排行榜",
            "douban2016"=>"豆瓣2016榜单",
            "douban50top2018"=>"2018上半年豆瓣电影口碑榜前50名",
            "douban2017hot"=>"2017豆瓣热门电影合集",
            "top201803"=>"2018年03月佳片推荐",
            "douban502016"=>"2016上半年豆瓣电影Top50",
            "top201804"=>"4月佳片推荐2018年"
        );

        $find = $type[$qure];

        return $this->getORM()
            ->select('*')
            ->where("movClass='{$qure}'")
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }
}
