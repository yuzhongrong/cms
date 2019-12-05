<?php
namespace App\Domain;

use App\Model\Examples\CURD as ModelCURD;
use App\Model\MovModel as MovCURD;
use App\Model\OnlineModel;
use App\Model\OnlineMovModel;
use App\Model\OnlineMovModel as OnlineMvModel;
use App\Model\SeriModel as SeriCURD;
use App\Model\BtLibraryModel as BtLibraryModel;
use App\Model\OnlineSeriModel as OnlineSeriModel;
use App\Model\SubjectListModel;
use App\Model\SubjectModel as SubjectModel;
use App\Model\MovBannerModel as BannerModel;
use PhalApi\Crypt\MultiMcryptCrypt;

class MovDomain {


    /**
     * 获取电视剧列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getSeriList($page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);

        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('cate_home_seri_'.$page);
        if (empty($data)){


            $model = new SeriCURD();
            $items = $model->getListItems( $page, $perpage);

            $rs['items'] = $items;
            $cache->set('cate_home_seri_'.$page,$items,300);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }
    }

    /**
 * 获取首页最新电影tab部分的列表
 * @param $page
 * @param $perpage
 * @return array
 */
    public function getBtMovList($page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);


        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('cate_home_mv_'.$page);
        if (empty($data)){


            $model = new MovCURD();
            $items = $model->getListItems( $page, $perpage);

            $rs['items'] = $items;
            $cache->set('cate_home_mv_'.$page,$items,300);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }

    }

    /**
     * 获取首页最新电影tab部分的列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getBannerMovList($page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);


        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('cate_banner_mv_'.$page);
        if (empty($data)){


            $model = new BannerModel();
            $items = $model->getListItems( $page, $perpage);

            $rs['items'] = $items;
            $cache->set('cate_banner_mv_'.$page,$items,60);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }

    }


    /**
     * 获取专题电影分类列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getSubjectTitleList($page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);


        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('cate_subject_title_'.$page);
        if (empty($data)){


            $model = new SubjectModel();
            $items = $model->getListItems( $page, $perpage);

            $rs['items'] = $items;
            $cache->set('cate_subject_title_'.$page,$items,300);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }
    }



    /**
     * 获取专题电影分类具体的列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getSubjectList($page, $perpage,$type) {
        $rs = array('items' => array(), 'total' => 0);

        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('cate_subjects_list_'.$type.'_'.$page);
        if (empty($data)){

            $model = new SubjectListModel();
            $items = $model->getListItems( $page, $perpage,$type);

            $rs['items'] = $items;
            $cache->set('cate_subjects_list_'.$type.'_'.$page,$items,3000);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }
    }

    /**
     * 获取首页banner推荐电影列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getBtRecList($page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);

        $model = new BtLibraryModel();
        $items = $model->getRecItems( $page, $perpage);

        $rs['items'] = $items;
        return $rs;
    }

    /**
     * 根据id获取Bt电影
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getMovById($type) {
        $model = new BtLibraryModel();
        $items = $model->getById( $type);
        return $items;
    }

    /**
     * 根据id获取在线电影
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getOnlineMovById($md5id) {

        $model = new OnlineModel();
        $items = $model->getById( $md5id);
        return $items;
    }

    /**
     * 获取BT电影分类列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getCategoryMovList($page, $perpage,$type) {
        $rs = array('items' => array(), 'total' => 0);

        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('cate_bt_'.$type.'-'.$page);
        if (empty($data)){

            $model = new BtLibraryModel();
            $items = $model->getBtByCategory( $page, $perpage , $type);
            $rs['items'] = $items;
            $cache->set('cate_bt_'.$type.'-'.$page,$items,300);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }
    }

    /**
     * 获取在线电影列表
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getOnlineMovList($page, $perpage,$type) {
        $rs = array('items' => array(), 'total' => 0);

        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('onlineMv_'.$type.'-'.$page);
        if (empty($data)){

            $model = new OnlineMvModel();
            $items = $model->getOnlineMvListItems( $page, $perpage , $type);
            $rs['items'] = $items;
            $cache->set('onlineMv_'.$type.'-'.$page,$items,300);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }

        return $rs;
    }

    /**
     * 获取在线电影推荐
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getOnlineMovRandom($page, $perpage,$type) {
        $rs = array('items' => array(), 'total' => 0);

        $model = new OnlineMvModel();
        $items = $model->getOnlineMovRandom( $page, $perpage , $type);
        $rs['items'] = $items;

        $mcrypt =  new MultiMcryptCrypt('12345678');
        $key = 'zxmovie';
        $encryptData = $mcrypt->encrypt($rs,$key);

        return $encryptData;
    }

    /**
     * 获取在线剧集列表，动画、综艺
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getOnlineList($page, $perpage, $type) {
        $rs = array('items' => array(), 'total' => 0);

        $cache =\PhalApi\DI()->cache;

        $data = $cache->get('onlineSeri_'.$type.'-'.$page);
        if (empty($data)){

            $model = new OnlineModel();
            $items = $model->getOnlineItems( $page, $perpage , $type);
            $rs['items'] = $items;
            $cache->set('onlineSeri_'.$type.'-'.$page,$items,300);

            return $rs;
        }else{
            $rs['items'] = $data;
            return $rs;
        }
    }


    /**
     * 获取在线剧集列表，动画、综艺,推荐
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getOnlineRandomRecommend($page, $perpage, $type) {
        $rs = array('items' => array(), 'total' => 0);
        $model = new OnlineModel();
        $items = $model->getRecommendByType( $page, $perpage , $type);
        $rs['items'] = $items;
        return $rs;
    }


    /**
     * 搜索电影
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getSearchBt($keyWords, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);

        $model = new BtLibraryModel();
        $items = $model->getSearch($keyWords, $page, $perpage);
        $total = $model->getListTotal($keyWords);
        $rs['items'] = $items;
        $rs['total'] = $total;

        return $rs;
    }

    /**
     * 搜索电影
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getSearchOnlineA($keyWords, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);

        $model = new OnlineSeriModel();
        $items = $model->getSearch($keyWords, $page, $perpage);
        $total = $model->getListTotal($keyWords);
        $rs['items'] = $items;
        $rs['total'] = $total;

        return $rs;
    }

    /**
     * 搜索电影
     * @param $page
     * @param $perpage
     * @return array
     */
    public function getSearchOnlineB($keyWords, $page, $perpage) {
        $rs = array('items' => array(), 'total' => 0);

        $model = new OnlineMvModel();
        $items = $model->getSearch($keyWords, $page, $perpage);
        $total = $model->getListTotal($keyWords);
        $rs['items'] = $items;
        $rs['total'] = $total;

        return $rs;
    }



}
