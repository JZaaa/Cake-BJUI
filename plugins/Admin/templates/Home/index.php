<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B-JUI 客户端框架</title>
    <meta name="Keywords" content="B-JUI,Bootstrap,DWZ,jquery,ui,前端,框架,开源,OSC,开源框架,knaan"/>
    <meta name="Description" content="B-JUI, Bootstrap for DWZ富客户端框架，基于DWZ富客户端框架修改。主要针对皮肤，编辑器，表单验证等方面进行了大量修改，引入了Bootstrap，Font Awesome，KindEditor，jquery.validationEngine，iCheck等众多开源项目。"/>
    <link rel="shortcut icon" href="<?php echo $this->Url->webroot('assets/bjui/assets/img/icons/icon-96x96.png')?>" />

    <!----------- required start  ----------->
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/jquery/jquery.min.js')?>"></script>

    <!-- bootstrap -->
    <link href="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- bootstrap select -->
    <link href="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap-select/css/bootstrap-select.min.css')?>" rel="stylesheet">
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap-select/js/bootstrap-select.min.js')?>"></script>
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap-select/js/i18n/defaults-zh_CN.js')?>"></script>

    <!-- jquery validator -->
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/nice-validator/jquery.validator.min.js?local=zh-CN')?>"></script>

    <!-- bootstrap-icon -->
    <link href="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">

    <!----------- required end  ----------->

    <!----------- 外部插件(可选) start ----------->

    <!-- ztree -->
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/ztree_v3/js/jquery.ztree.all.min.js')?>"></script>

    <!-- color picker -->
    <link href="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')?>" rel="stylesheet">
    <script src="<?php echo $this->Url->webroot('assets/bjui/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')?>"></script>

    <!----------- 外部插件(可选) end ----------->

    <!-- core  -->
    <link href="<?php echo $this->Url->webroot('assets/bjui/css/index.css')?>" rel="stylesheet">
    <script src="<?php echo $this->Url->webroot('assets/bjui/js/index.js')?>"></script>

    <!-- init -->
    <script type="text/javascript">
        $(function() {
            BJUI.init({
                menus: {
                    menusData: [
                        {
                            "name": "用户管理",
                            "icon": "bi-house",
                            "children": [
                                {
                                    "name": "用户列表",
                                    "path": '<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'index'])?>',
                                },
                                {
                                    "name": "用户新增",
                                    "path": '<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'add'])?>',
                                }
                            ]
                        },
                    ]
                },
                JSPATH: '/',         //[可选]框架路径
                PLUGINPATH: '<?php echo $this->Url->webroot('assets/bjui/plugins/')?>', //[可选]插件路径
                loginInfo: { url: '<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'login'])?>', title:'登录' }, // 会话超时后弹出登录对话框
                dialog: {
                    mask: false
                },
                debug: true,    // [可选]调试模式 [true|false，默认false]
                // kindEditor插件全局配置
                KindEditor: {
                    uploadJson: undefined,
                    fileManagerJson: undefined
                }
            })
        })

    </script>

</head>
<body>
<div id="bjui-app" class="bjui-app">
    <section class="bjui-app-layout">
        <aside id="bjui-menu" class="bjui-sidebar bjui-sidebar__fixed">
            <div class="sidebar-content">
                <a class="sidebar-brand text-center" href="index.html">
                    <span class="align-middle">BJUI NEXT</span>
                </a>

                <div id="bjui-menu-nav">
                </div>

            </div>
        </aside>
        <section id="bjui-app-layout-main" class="bjui-app-layout-main">
            <div id="bjui-app-layout-header" class="bjui-app-layout-multi-header bjui-app-layout-multi-header--fixed">
                <header class="bjui-app-layout-header">
                    <div class="bjui-app-layout-header-left">
                        <a class="bjui-sidebar-toggle">
                            <i class="bi-list"></i>
                        </a>
                    </div>

                    <div class="bjui-app-layout-header-right">
                        <div class="bjui-app-layout-header-right__item dropdown">
                            <a class="nav-icon dropdown-toggle" href="javascript:" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <i class="bi-bell"></i>
                                    <span class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <ul class="list-group">
                                    <li class="list-group-item">An item</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item">A third item</li>
                                    <li class="list-group-item">A fourth item</li>
                                    <li class="list-group-item">And a fifth one</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bjui-app-layout-header-right__item">
                            <a class="nav-icon js-fullscreen d-lg-block" href="javascript:">
                                <i class="bi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="bjui-app-layout-header-right__item dropdown">
                            <a class="nav-icon pe-md-0 dropdown-toggle" href="javascript:" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $this->Url->webroot('assets/bjui/assets/img/avatars/avatar.png')?>" class="avatar img-fluid rounded" alt="Charles Hall">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="pages-profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user align-middle me-1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile</a>
                                <a class="dropdown-item" href="javascript:"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart align-middle me-1"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle me-1"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Settings &amp;
                                    Privacy</a>
                                <a class="dropdown-item" href="javascript:"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle align-middle me-1"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $this->Url->build(['plugin' => 'Admin', 'controller' => 'AdminUsers', 'action' => 'logout'])?>">Log out</a>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <div class="bjui-app-layout-multi-header-placeholder"></div>

            <main id="bjui-app-layout-content" class="bjui-app-layout-content">

            </main>
        </section>
    </section>
</div>
</body>
</html>
