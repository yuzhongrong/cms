<?php

namespace App\Api;

use PhalApi\Api;
use App\Domain\MovDomain as DomainCURD;

/**
 * 极光影院影片接口归档
 * @author dogstar 20170612
 */
class Mov extends Api
{


    public function getRules()
    {
        return array(

            'getSeriList' => array(
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getMovList' => array(
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'searchA' => array(
                'key' => array('name' => 'key', 'type' => 'string', 'require' => true, 'default' => '', 'desc' => '电影搜索关键词，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'searchB' => array(
                'key' => array('name' => 'key', 'type' => 'string', 'require' => true, 'default' => '', 'desc' => '电影搜索关键词，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ,
            ),
            'searchC' => array(
                'key' => array('name' => 'key', 'type' => 'string', 'require' => true, 'default' => '', 'desc' => '电影搜索关键词，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getOnlineMv' => array(
                'type' => array('name' => 'type', 'type' => 'string', 'require' => true, 'default' => 'science', 'desc' => '电影类型key，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getOnlineList' => array(
                'type' => array('name' => 'type', 'type' => 'string', 'require' => true, 'default' => 'science', 'desc' => '剧集类型key，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getRandomMv' => array(
                'type' => array('name' => 'type', 'type' => 'string', 'require' => true, 'default' => 'science', 'desc' => '剧集类型key，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 18, 'desc' => '分页数量')
            ),
            'getRecommend' => array(
                'type' => array('name' => 'type', 'type' => 'string', 'require' => true, 'default' => 'science', 'desc' => '剧集类型key，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getRecList' => array(
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getBtCategory' => array(
                'type' => array('name' => 'type', 'type' => 'string', 'require' => true, 'default' => 'latest', 'desc' => '电影类型key，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getSubjectTitle' => array(
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getSubject' => array(
                'type' => array('name' => 'type', 'type' => 'string', 'require' => true, 'default' => 'douban2017', 'desc' => '专题类型key，参数必须'),
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            ),
            'getBtMvById' => array(
                'md5id' => array('name' => 'md5id', 'type' => 'string', 'require' => true, 'default' => '', 'desc' => '查询电影的id，参数必须')
            ),
            'getOnlineMvById' => array(
                'md5id' => array('name' => 'md5id', 'type' => 'string', 'require' => true, 'default' => '', 'desc' => '查询电影的id，参数必须')
            ),
            'getBanner' => array(
                'page' => array('name' => 'page', 'type' => 'int', 'min' => 1, 'default' => 1, 'desc' => '第几页'),
                'limit' => array('name' => 'limit', 'type' => 'int', 'min' => 1, 'max' => 20, 'default' => 10, 'desc' => '分页数量')
            )
        );
    }


    /**
     * 获取备用图片域名，应对图片被墙
     * @desc 获取首页电视剧最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function serverConfig()
    {
        $imgUrl=array(
            "origin"=>array(
                "img.tupian-zuida.com",
                "img.tupian-zuida.com"
            ),
            "replace"=>array(
                "img.tupian-zuida.com",
                "img.tupian-zuida.com"
            )
        );

        $movUrl=array(
            "origin"=>array(
                "img.tupian-zuida.com",
                "img.tupian-zuida.com"
            ),
            "replace"=>array(
                "img.tupian-zuida.com",
                "img.tupian-zuida.com"
            )
        );


        $rs = array();
        $rs['img_host'] = $imgUrl;
        $rs['mov_host'] = $movUrl;
        return $rs;
    }

    /**
     * 获取最新电视剧，按时间排序，最新的排最前
     * @desc 获取首页电视剧最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function categoryFind()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getCategoryFind($this->page, $this->limit,$this->class,$this->area,$this->year,$this->type);
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->limit;
        return $list['items'];
    }

    /**
     * 获取最新电视剧，按时间排序，最新的排最前
     * @desc 获取首页电视剧最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getSeriList()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getSeriList($this->page, $this->limit);
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->limit;
        return $list['items'];
    }

    /**
     * 获取最新电影，按时间排序，最新的排最前
     * @desc 获取首页电影最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getMovList()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getBtMovList($this->page, $this->limit);
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->limit;
        return $list['items'];
    }

    /**
     * 获取banner推荐
     * @desc 获取首页banner位电影最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getBanner()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getBannerMovList($this->page, $this->limit);
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->limit;
        return $list['items'];
    }


    /**
     * 添加banner推荐
     * @desc 添加banner推荐内容，将影片加到推荐位
     * @return string   md5id   影片ID
     * @return int      type    影片类型，是离线还是在线，用来查询对应的库
     */
    public function removeBanner()
    {
        $rs = array();
        $domain = new DomainCURD();
        $id = $domain->removeFromBannerMovList($this->md5Id);
        $rs['code'] = $id;
        return $rs;
    }

    /**
     * 获取电影专题目录，按id排序，后期准备改为人工运营，人为排序
     * @desc 获取首页电影最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getSubjectTitle()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getSubjectTitleList($this->page, $this->limit);
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->limit;
        return $list['items'];
    }


    /**
     * 根据id查询离线电影
     * @desc Bt离线电影库
     * @return string   md5id  影评id
     */
    public function getBtMvById()
    {

        $domain = new DomainCURD();
        $list = $domain->getMovById($this->md5id);
        return $list;
    }

    /**
     * 根据id查询在线电影
     * @desc 在线电影库
     * @return string   md5id  影评id
     */
    public function getOnlineMvById()
    {

        $domain = new DomainCURD();
        $list = $domain->getOnlineMovById($this->md5id);
        return $list;
    }

    /**
     * 获取专题列表，按时间排序，最新的排最前
     * @desc 获取专题自己的列表，支持分页
     * @return string   type    专题分类
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getSubject()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getSubjectList($this->page, $this->limit ,$this->type);
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        return $list['items'];
    }


    /**
     * 获取首页banner推荐
     * @desc 获取首页banner推荐，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getRecList()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getBtRecList($this->page, $this->limit);
        $rs['page'] = $this->page;
        $rs['perpage'] = $this->limit;
        return $list['items'];
    }

    /**
     * 搜索接口A
     * @desc 搜索离线电影
     * @return string   key       关键词
     * @return string   page     当前页
     * @return string   limit     每页数量
     */
    public function searchA()
    {
        $rs = array();
        $domain = new DomainCURD();
        $list = $domain->getSearchBt($this->key, $this->page, $this->limit);
        $rs['items'] = $list['items'];
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        $rs['total'] = $list['total'];
        return $rs;
    }

    /**
     * 搜索接口B
     * @desc 搜索在线剧集
     * @return string   key       关键词
     * @return string   page     当前页
     * @return string   limit     每页数量
     */
    public function searchB()
    {
        $rs = array();
        $domain = new DomainCURD();
        $list = $domain->getSearchOnlineA($this->key, $this->page, $this->limit);
        $rs['items'] = $list['items'];
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        $rs['total'] = $list['total'];
        return $rs;
    }

    /**
     * 搜索接口C
     * @desc 搜索在线电影
     * @return string   key       关键词
     * @return string   page     当前页
     * @return string   limit     每页数量
     */
    public function searchC()
    {
        $rs = array();
        $domain = new DomainCURD();
        $list = $domain->getSearchOnlineB($this->key, $this->page, $this->limit);
        $rs['items'] = $list['items'];
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        $rs['total'] = $list['total'];
        return $rs;
    }

    /**
     * 获取在线电影，按时间排序，最新的排最前
     * @desc 获取在线资源模块电影最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getOnlineMv()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getOnlineMovList($this->page, $this->limit ,$this->type);
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        return $list['items'];
    }

    /**
     * 获取在线剧集、动漫、综艺，按时间排序，最新的排最前
     * @desc 获取在线资源模块电影最新更新的数据，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getOnlineList()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getOnlineList($this->page, $this->limit ,$this->type);
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        return $list['items'];
    }

    /**
     * 获取离线分类电影，按时间排序，最新的排最前
     * @desc 获取离线分类电影，支持分页
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getBtCategory()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getCategoryMovList($this->page, $this->limit ,$this->type);
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        return $list['items'];
    }

    /**
     * 获取电影相关推荐
     * @desc 获取在线资源模块电影最新推荐
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     */
    public function getRandomMv()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getOnlineMovRandom($this->page, $this->limit ,$this->type);
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;

        return $list['items'];
    }



    /**
     * 获取剧集、动漫、综艺相关推荐
     * @desc 获取在线资源模块电影最新推荐
     * @return int      page    当前第几页
     * @return int      perpage 每页数量
     * @return string   type    推荐分类的类别
     */
    public function getRecommend()
    {
        $rs = array();

        $domain = new DomainCURD();
        $list = $domain->getOnlineRandomRecommend($this->page, $this->limit ,$this->type);
        $rs['page'] = $this->page;
        $rs['limit'] = $this->limit;
        return $list['items'];
    }
}
