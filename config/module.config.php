<?php 
return array(
    'module' => array(
        'Action' => array(
            'name' => 'Action',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/action.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Action\Controller\ConsoleController' => 'Action\Controller\Factory\ConsoleControllerFactory',
            'Action\Controller\CreateController' => 'Action\Controller\Factory\CreateControllerFactory',
            'Action\Controller\DeleteController' => 'Action\Controller\Factory\DeleteControllerFactory',
            'Action\Controller\IndexController' => 'Action\Controller\Factory\IndexControllerFactory',
            'Action\Controller\RestController' => 'Action\Controller\Factory\RestControllerFactory',
            'Action\Controller\UpdateController' => 'Action\Controller\Factory\UpdateControllerFactory',
            'Action\Controller\ViewController' => 'Action\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Action\Service\ServiceInterface' => 'Action\Service\Factory\ServiceFactory',
            'Action\Mapper\MysqlMapperInterface' => 'Action\Mapper\Factory\MysqlMapperFactory',
            'Action\Form\Form' => 'Action\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'action-create' => array(
                'pageTitle' => 'Action',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'action-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/action/create',
                    'defaults' => array(
                        'controller' => 'Action\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'action-delete' => array(
                'pageTitle' => 'Action',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'action-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/action/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Action\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'action-index' => array(
                'pageTitle' => 'Action',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'action-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/action',
                    'defaults' => array(
                        'controller' => 'Action\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'action-rest' => array(
                'pageTitle' => 'Action',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'action-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'rest',
                'type' => 'literal',
                'options' => array(
                    'route' => '/api/action[/:id]',
                    'defaults' => array(
                        'controller' => 'Action\Controller\RestController',
                        'action' => 'index'
                    )
                )
            ),
            'action-update' => array(
                'pageTitle' => 'Action',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'action-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/action/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Action\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'action-view' => array(
                'pageTitle' => 'Action',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'action-index',
                'icon' => 'fa fa-cogs',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/action/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Action\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'action-console-index' => array(
                    'options' => array(
                        'route' => 'action',
                        'defaults' => array(
                            'controller' => 'Action\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'action-create',
                'action-delete',
                'action-index',
                'action-update',
                'action-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'name' => 'Admin',
                'route' => 'admin',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'location' => 'left',
                'active' => true,
                'items' => array(
                    array(
                        'name' => 'Action',
                        'route' => 'action-index',
                        'icon' => 'fa fa-cogs',
                        'order' => 2,
                        'active' => true
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Action',
                        'route' => 'action-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'action-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'action-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'action-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'action-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);