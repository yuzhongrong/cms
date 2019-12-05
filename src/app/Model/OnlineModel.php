<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

/**
 * Class OnlineMovModel
 * @package App\Model
 */
class OnlineModel extends NotORM {

    protected function getTableName($id) {
        return 'mov_online_host_library';
    }

    public function getAllSearch($keyWords, $page, $perpage) {

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
     * 根据id获取在线电影
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getMovById($md5id) {
        return $this->getORM()
            ->select('*')
            ->where("mv_md5_id='{$md5id}' ")
            ->fetchAll();
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


    /**
     * 获取影片推荐
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getRecommendByType($page, $perpage , $qure) {

        $type=array(
            "comedy"=>"喜剧片",
            "love"=>"爱情片",
            "science"=>"科幻片",
            "terror"=>"恐怖片",
            "story"=>"剧情片",
            "war"=>"战争片",
            "document"=>"记录片",
            "show"=>"综艺片",
            "hongkong"=>"香港剧",
            "taiwan"=>"台湾剧",
            "native"=>"国产剧",
            "japanise"=>"日本剧",
            "america"=>"欧美剧",
            "koria"=>"韩剧",
            "curtoon"=>"动漫",
            "good"=>"福利片",
            "ocean"=>"海外剧"
            );

        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('rand()')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

    /**
     * 获取分类筛选
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getCategoryFind($page, $perpage , $class,$area, $year, $type) {


        $types=array(
            "comedy"=>"喜剧片",
            "love"=>"爱情片",
            "science"=>"科幻片",
            "terror"=>"恐怖片",
            "story"=>"剧情片",
            "war"=>"战争片",
            "document"=>"记录片",
            "show"=>"综艺片",
            "hongkong"=>"香港剧",
            "taiwan"=>"台湾剧",
            "native"=>"国产剧",
            "japanise"=>"日本剧",
            "america"=>"欧美剧",
            "koria"=>"韩剧",
            "curtoon"=>"动漫",
            "good"=>"福利片",
            "ocean"=>"海外剧"
        );
        $find = $types[$type];

        //!a !b !c
        if ($area!="null"&&$year!="null"&&$type!="null"){


            //如果年代在2010-1990之间，
            $time = (int)$year;
            if ($time>=1990 && $time<=2010){
                $yearParams = "mv_year >= 1990 and mv_year <= 2010 ";
            }elseif ($time>2010){
                $yearParams = "mv_year = '{$year}' ";
            }else{
                $yearParams = "mv_year < 1990 ";
            }
            

            return $this->getORM()
                ->select('*')
                ->where($yearParams)
                ->where("mv_area = '{$area}' ")
                ->where("movClass='{$find}'")
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //!a !b c
        }elseif ($area!="null"&&$year!="null"&&$type=="null"){


            //如果年代在2010-1990之间，
            $time = (int)$year;
            if ($time>=1990 && $time<=2010){
                $yearParams = "mv_year >= 1990 and mv_year <= 2010 ";
            }elseif ($time>2010){
                $yearParams = "mv_year = '{$year}' ";
            }else{
                $yearParams = "mv_year < 1990 ";
            }

            return $this->getORM()
                ->select('*')
                ->where($yearParams)
                ->where("mv_area = '{$area}' ")
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //!a b !c
        }elseif ($area!="null"&&$year=="null"&&$type!="null"){
            $qure ='%'.$type.'%';

            return $this->getORM()
                ->select('*')
                ->where("mv_area = '{$area}' ")
                ->where("movClass='{$find}'")
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //a !b !c
        }elseif ($area=="null"&&$year!="null"&&$type!="null"){

            //如果年代在2010-1990之间，
            $time = (int)$year;
            if ($time>=1990 && $time<=2010){
                $yearParams = "mv_year >= 1990 and mv_year <= 2010 ";
            }elseif ($time>2010){
                $yearParams = "mv_year = '{$year}' ";
            }else{
                $yearParams = "mv_year < 1990 ";
            }

            $qure ='%'.$type.'%';

            return $this->getORM()
                ->select('*')
                ->where($yearParams)
                ->where("movClass='{$find}'")
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //!a b  c
        }elseif ($area!="null"&&$year=="null"&&$type=="null"){

            return $this->getORM()
                ->select('*')
                ->where("mv_area = '{$area}' ")
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //a !b c
        }elseif ($area=="null"&&$year!="null"&&$type=="null"){
            //如果年代在2010-1990之间，
            $time = (int)$year;
            if ($time>=1990 && $time<=2010){
                $yearParams = "mv_year >= 1990 and mv_year <= 2010 ";
            }elseif ($time>2010){
                $yearParams = "mv_year = '{$year}' ";
            }else{
                $yearParams = "mv_year < 1990 ";
            }

            return $this->getORM()
                ->select('*')
                ->where($yearParams)
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //a b !c
        }elseif ($area=="null"&&$year=="null"&&$type!="null"){
            $qure ='%'.$type.'%';

            return $this->getORM()
                ->select('*')
                ->where("movClass='{$find}'")
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        //a b c
        }else{
            return $this->getORM()
                ->select('*')
                ->limit(($page - 1) * $perpage, $perpage)
                ->fetchAll();
        }
        
    }

    /**
     * 获取在线影片
     * @param $page
     * @param $perpage
     * @return mixed
     */
    public function getOnlineItems($page, $perpage , $qure) {
        $type=array(
            "comedy"=>"喜剧片",
            "love"=>"爱情片",
            "science"=>"科幻片",
            "terror"=>"恐怖片",
            "story"=>"剧情片",
            "war"=>"战争片",
            "document"=>"记录片",
            "show"=>"综艺片",
            "hongkong"=>"香港剧",
            "taiwan"=>"台湾剧",
            "native"=>"国产剧",
            "japanise"=>"日本剧",
            "america"=>"欧美剧",
            "koria"=>"韩剧",
            "curtoon"=>"动漫",
            "good"=>"福利片",
            "ocean"=>"海外剧"
        );
        $find = $type[$qure];
        return $this->getORM()
            ->select('*')
            ->where("movClass='{$find}'")
            ->order('mv_update_time DESC')
            ->limit(($page - 1) * $perpage, $perpage)
            ->fetchAll();
    }

}
