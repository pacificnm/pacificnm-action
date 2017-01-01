<?php
/**
 * Pacific NM (https://www.pacificnm.com)
 *
 * @link https://github.com/pacificnm/pacificnm-action for the canonical source repository
 * @copyright Copyright (c) 20011-2016 Pacific NM USA Inc. (https://www.pacificnm.com)
 * @license https://github.com/pacificnm/pacificnm-action/blob/master/LICENSE.md
 */
return array(
    'module' => array(
        'Action' => array(
            'name' => 'Action',
            'version' => '1.0.2',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/action.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\Action\Controller\ConsoleController' => 'Pacificnm\Action\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\Action\Controller\CreateController' => 'Pacificnm\Action\Controller\Factory\CreateControllerFactory',
            'Pacificnm\Action\Controller\DeleteController' => 'Pacificnm\Action\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\Action\Controller\IndexController' => 'Pacificnm\Action\Controller\Factory\IndexControllerFactory',
            'Pacificnm\Action\Controller\RestController' => 'Pacificnm\Action\Controller\Factory\RestControllerFactory',
            'Pacificnm\Action\Controller\UpdateController' => 'Pacificnm\Action\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\Action\Controller\ViewController' => 'Pacificnm\Action\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\Action\Service\ServiceInterface' => 'Pacificnm\Action\Service\Factory\ServiceFactory',
            'Pacificnm\Action\Mapper\MysqlMapperInterface' => 'Pacificnm\Action\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\Action\Form\Form' => 'Pacificnm\Action\Form\Factory\FormFactory'
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
                        'controller' => 'Pacificnm\Action\Controller\CreateController',
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
                        'controller' => 'Pacificnm\Action\Controller\DeleteController',
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
                        'controller' => 'Pacificnm\Action\Controller\IndexController',
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
                        'controller' => 'Pacificnm\Action\Controller\RestController',
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
                        'controller' => 'Pacificnm\Action\Controller\UpdateController',
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
                        'controller' => 'Pacificnm\Action\Controller\ViewController',
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
                            'controller' => 'Pacificnm\Action\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\Action' => true
        ),
        'template_map' => array(
            'pacificnm/action/create/index' => __DIR__ . '/../view/action/create/index.phtml',
            'pacificnm/action/delete/index' => __DIR__ . '/../view/action/delete/index.phtml',
            'pacificnm/action/index/index' => __DIR__ . '/../view/action/index/index.phtml',
            'pacificnm/action/update/index' => __DIR__ . '/../view/action/update/index.phtml',
            'pacificnm/action/view/index' => __DIR__ . '/../view/action/view/index.phtml',
        ),
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
                                        'useRouteMatch' => true
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'action-delete',
                                        'useRouteMatch' => true
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'action-create',
                                'useRouteMatch' => true
                            )
                        )
                    )
                )
            )
        )
    )
);