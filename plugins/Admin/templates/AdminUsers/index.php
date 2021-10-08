<div class="bjui-pageHeader hide">
    <form
        id="pagerForm"
        data-toggle="ajaxsearch"
        action="<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'index'])?>"
        method="post"
    >
        <input type="hidden" name="pageSize" value="<?php echo $numPerPage ?>">
        <input type="hidden" name="pageCurrent" value="1">
    </form>
</div>

<div class="bjui-pageContent bg-white bj-page-wrapper-content bj-p-10">
    <div class="bj-m-b-10">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'add'])?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="350" data-mask="true" data-icon="plus">添加</a>
        </div>
    </div>
    <table class="table table-bordered table-hover table-striped table-top text-center" data-width="100%">
        <thead>
            <tr>
                <th style="width: 80px">序号</th>
                <th>用户名</th>
                <th>状态</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $key => $item): ?>
            <tr>
                <td><?php echo $key + 1?></td>
                <td><?php echo $item['username']?></td>
                <td><?php echo $item['state']?></td>
                <td><?php echo $item['created']?></td>
                <td style="width: 250px">
                    <a href="<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'edit', $item['id']])?>" class="btn btn-blue" data-toggle="dialog" data-width="600" data-height="350" data-mask="true">编辑</a>&nbsp;
                    <a href="<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'delete', $item['id']])?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>&nbsp;
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<div class="bjui-pageFooter">
    <div class="pages">
        <span>每页&nbsp;</span>
        <div class="selectPagesize">
            <select data-toggle="selectpicker" data-toggle-change="changepagesize">
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        <span>&nbsp;条，共 <?php echo str_replace(',', '', $this->Paginator->counter('{{count}}'));?> 条</span>
    </div>
    <div class="pagination-box" data-toggle="pagination"
         data-total="<?php echo str_replace(',', '', $this->Paginator->counter('{{count}}'));?>"
         data-page-size="<?php echo $numPerPage; ?>"
         data-page-current="1">
    </div>
</div>
