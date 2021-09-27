<div class="bjui-pageContent bj-page-wrapper-content">
    <form
        action="<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'edit', $data['id']])?>"
        class="bj-form bj-form-label-w110"
        data-toggle="validate"
        data-reloadNavtab="true"
    >

        <div class="bj-form-item">
            <label class="bj-form-item-label is-required">用户名：</label>
            <div class="bj-form-item-content">
                <input type="text" name="username" value="<?php echo $data['username']?>" data-rule="required">
            </div>
        </div>
        <div class="bj-form-item">
            <label class="bj-form-item-label is-required">密码：</label>
            <div class="bj-form-item-content">
                <input type="text" name="password" value="<?php echo $data['password']?>" data-rule="required">
            </div>
        </div>
        <div class="bj-form-item">
            <label class="bj-form-item-label is-required">状态：</label>
            <div class="bj-form-item-content">
                <input type="text" name="state" value="<?php echo $data['state']?>" data-rule="required">
            </div>
        </div>

    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li>
            <button type="button" class="btn-close btn-no">关闭</button>
        </li>
        <li>
            <button type="submit" class="btn-blue">保存</button>
        </li>
    </ul>
</div>
