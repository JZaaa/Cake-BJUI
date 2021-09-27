<?php
declare(strict_types=1);

namespace Admin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    private $limit = 20;

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('ajax');

        $this->loadComponent('Authentication.Authentication');
    }

    /**
     * 分页参数设置
     * @param null $limit
     */
    public function setPage($limit = null)
    {
        $page = !empty($this->request->getData('pageCurrent')) ? $this->request->getData('pageCurrent') : 1;
        if (!empty($this->request->getQuery('pageCurrent'))) {
            $page = $this->request->getQuery('pageCurrent');
        }

        $numPerPage = !empty($this->request->getData('pageSize')) ? $this->request->getData('pageSize') : (empty($limit) ? $this->limit : $limit);
        $this->paginate['page'] = $page;
        $this->paginate['limit'] = $numPerPage;

        $this->set(compact('page', 'numPerPage'));
    }

    /**
     * 页面跳转函数
     * 调用必须 return
     * @param int|array statusCode 必选。状态码(ok = 200, error = 300, timeout = 301)
     * @param string message 可选。信息内容。
     * @param string tabid 可选。待刷新navtab id，多个id以英文逗号分隔开，当前的navtab id不需要填写
     * @param string dialogid 可选。待刷新dialog id，多个id以英文逗号分隔开，请不要填写当前的dialog id。
     * @param string divid 可选。待刷新div id，多个id以英文逗号分隔开
     * @param boolean closeCurrent 可选。是否关闭当前窗口(navtab或dialog)。
     * @param string forward 可选。跳转到某个url。
     * @param string forwardConfirm 可选。跳转url前的确认提示信息。
     * @param array $data 附加信息
     * @return \Cake\Http\Response|null
     */
    public function jump(
        $statusCode,
        $message = null,
        $tabid = '',
        $closeCurrent = true,
        $forward = '',
        $divid = false,
        $dialogid = '',
        $forwardConfirm = '',
        array $data = []
    ): ?\Cake\Http\Response
    {
        $result = array();

        if (is_array($statusCode)) {
            foreach ($statusCode as $key => $value) {
                if ($key == 'code') {
                    $key = 'statusCode';
                }
                $$key = $value;
            }
        }

        if ($divid && $tabid == '') {
            $tabid = false;
        }

        if (empty($message)) {
            switch ($statusCode) {
                case 200:
                    $message = '操作成功';
                    break;
                case 300:
                    $message = '操作失败';
                    break;
                case 401:
                    $message = '登录超时';
                    break;
                case 403:
                    $message = '无权限访问';
                    break;
                default:
                    $message = '未知错误';
            }
        }
        $result['statusCode'] = empty($statusCode) ? 200 : $statusCode;
        $result['message'] = $message;
        $result['tabid'] = is_string($tabid) ? strtolower($tabid) : !!$tabid;
        $result['forward'] = $forward;
        $result['dialogid'] = $dialogid;
        $result['divid'] = is_string($divid) ? strtolower($divid) : $divid;
        $result['forwardConfirm'] = $forwardConfirm;
        $result['closeCurrent'] = $closeCurrent;
        $result['data'] = $data;
        return parent::apiResponse($result);
    }
}
