<?php


namespace app\logic;


use app\models\Member;
use app\models\User;
use moonland\phpexcel\Excel;
use yii\data\Pagination;

class HomeLogic extends BaseLogic
{

    /**
     * 我的成员
     *
     * @param  integer $_intUid
     * @param  array $_aryParam
     * @param  integer $_intPageSize
     * @return array
     */
    public function member($_intUid, $_aryParam ,$_intPageSize = 10) {
        \Yii::$app->request->get('page_size') ? $_intPageSize = \Yii::$app->request->get('page_size') : null;

        $query = Member::find()
            ->select('*');

        $query->andFilterWhere([ '=', 'recommend_id', $_intUid ]);

        // 关键字搜索
        if (isset($_aryParam['keyword']) && $_aryParam['keyword']) {
            $query->andFilterWhere([
                'or',
                [ 'like', 'id', "{$_aryParam['keyword']}" ],
                [ 'like', 'identity_card', "{$_aryParam['keyword']}" ],
                [ 'like', 'name', "{$_aryParam['keyword']}" ],
                [ 'like', 'phone', "{$_aryParam['keyword']}" ],
            ]);
        }

        // 时间搜索
        if (isset($_aryParam['date']) && $_aryParam['date']) {
            $strStartData = date('Y-m-d H:i:s', strtotime($_aryParam['date']));
            $strEndData = date('Y-m-d H:i:s', strtotime($strStartData.' + 1 day'));
            $query->andFilterWhere([ '>=', 'create_at', $strStartData ]);
            $query->andFilterWhere([ '<', 'create_at', $strEndData ]);
        }

        if (isset($_aryParam['export']) && $_aryParam['export']) {
            $aryData = $query->orderBy('create_at DESC')->asArray()->all();
            $this->export($aryData);
        }

        $intCount = $query->count();
        $pages = new Pagination([ 'totalCount' => $intCount, 'pageSize' => $_intPageSize ]);
        $pages->pageParam = 'page';

        $aryList = $query->orderBy('create_at DESC')
            ->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        if (\Yii::$app->request->get($pages->pageParam) > $pages->getPageCount()) {
            $aryList = [];
        }

        $currentPage = \Yii::$app->request->get($pages->pageParam) ? \Yii::$app->request->get($pages->pageParam) : 1;
        $currentPage = $currentPage <= 0 ? 1 : $currentPage;

        return [
            'count'       => intval($intCount),
            'currentPage' => intval($currentPage),
            'pageCount'   => intval($pages->getPageCount()),
            'pageSize'    => intval($_intPageSize),
            'list'        => $aryList,
        ];
    }

    /**
     * 我的成员
     *
     * @param  integer $_intUid
     * @param  array $_aryParam
     * @param  integer $_intPageSize
     * @return array
     */
    public function members($_intUid, $_aryParam ,$_intPageSize = 10) {
        \Yii::$app->request->get('page_size') ? $_intPageSize = \Yii::$app->request->get('page_size') : null;

        $query = Member::find()
            ->select('*');

        // 关键字搜索
        if (isset($_aryParam['keyword']) && $_aryParam['keyword']) {
            $query->andFilterWhere([
                'or',
                [ 'like', 'id', "{$_aryParam['keyword']}" ],
                [ 'like', 'identity_card', "{$_aryParam['keyword']}" ],
                [ 'like', 'name', "{$_aryParam['keyword']}" ],
                [ 'like', 'phone', "{$_aryParam['keyword']}" ],
            ]);
        }

        // 时间搜索
        if (isset($_aryParam['date']) && $_aryParam['date']) {
            $strStartData = date('Y-m-d H:i:s', strtotime($_aryParam['date']));
            $strEndData = date('Y-m-d H:i:s', strtotime($strStartData.' + 1 day'));
            $query->andFilterWhere([ '>=', 'create_at', $strStartData ]);
            $query->andFilterWhere([ '<', 'create_at', $strEndData ]);
        }

        if (isset($_aryParam['export']) && $_aryParam['export']) {
            $aryData = $query->orderBy('create_at DESC')->asArray()->all();
            $this->export($aryData);
        }

        $intCount = $query->count();
        $pages = new Pagination([ 'totalCount' => $intCount, 'pageSize' => $_intPageSize ]);
        $pages->pageParam = 'page';

        $aryList = $query->orderBy('create_at DESC')
            ->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        if (\Yii::$app->request->get($pages->pageParam) > $pages->getPageCount()) {
            $aryList = [];
        }

        $currentPage = \Yii::$app->request->get($pages->pageParam) ? \Yii::$app->request->get($pages->pageParam) : 1;
        $currentPage = $currentPage <= 0 ? 1 : $currentPage;

        return [
            'count'       => intval($intCount),
            'currentPage' => intval($currentPage),
            'pageCount'   => intval($pages->getPageCount()),
            'pageSize'    => intval($_intPageSize),
            'list'        => $aryList,
        ];
    }


    /**
     * 导出
     */
    private function export($_aryData) {
        \moonland\phpexcel\Excel::export([
            'models'   => $_aryData,
            'fileName' => '我的成员'.date('YmdHis'),
            'columns'  => [
                'id',
                'identity_card',
                'name',
                'phone',
                'create_at',
            ],
            'headers' => [
                'id' => '用户ID',
                'identity_card' => '身份证号',
                'name' => '姓名',
                'phone' => '联系电话',
                'create_at' => '注册时间',
            ],
        ]);
    }

    /**
     * 我的团队
     *
     * @param  array $_aryParam
     * @param  integer $_intPageSize
     * @return array
     */
    public function team($_aryParam ,$_intPageSize = 10) {
        \Yii::$app->request->get('page_size') ? $_intPageSize = \Yii::$app->request->get('page_size') : null;

        $query = User::find()
            ->select('*');

        $intCount = $query->count();
        $pages = new Pagination([ 'totalCount' => $intCount, 'pageSize' => $_intPageSize ]);
        $pages->pageParam = 'page';

        $aryList = $query->orderBy('create_at DESC')
            ->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        if (\Yii::$app->request->get($pages->pageParam) > $pages->getPageCount()) {
            $aryList = [];
        }

        $currentPage = \Yii::$app->request->get($pages->pageParam) ? \Yii::$app->request->get($pages->pageParam) : 1;
        $currentPage = $currentPage <= 0 ? 1 : $currentPage;

        return [
            'count'       => intval($intCount),
            'currentPage' => intval($currentPage),
            'pageCount'   => intval($pages->getPageCount()),
            'pageSize'    => intval($_intPageSize),
            'list'        => $aryList,
        ];
    }

}