<?php
namespace Auth;
return [
    'router' => [
        'routes' => [
             "auth" => [
                "type" => "Literal",
                "options" => [
                    "route" => "/auth",
                    "defaults" => [
                        "__NAMESPACE__" => "Auth\Controller",
                        "controller" => "Auth",
                        "action" => "login",
                    ],
                ],
                "may_terminate" => true,
                "child_routes" => [
                    "default" => [
                        "type" => "Segment",
                        "options" => [
                            "route" => "/[:controller[/:action][/:id]]",
                            "constraints" => [
                                "controller" => "[a-zA-Z][a-zA-Z0-9_-]*",
                                "action" => "[a-zA-Z][a-zA-Z0-9_-]*",
                            ],
                            "defaults" => [

                            ],
                        ],
                    ],
                ],
            ],
             "authenticate" => [
                "type" => "Literal",
                "options" => [
                    "route" => "/authenticate",
                    "defaults" => [
                        "__NAMESPACE__" => "Auth\Controller",
                        "controller" => "Auth",
                        "action" => "authenticate",
                    ],
                ],
                "may_terminate" => true,
                "child_routes" => [
                    "default" => [
                        "type" => "Segment",
                        "options" => [
                            "route" => "/auth/authenticate[/:redirect]",
                            "constraints" => [
                                "provider" => "[a-zA-Z][a-zA-Z0-9_-]*",
                                "redirect" => "[a-zA-Z][a-zA-Z0-9_-]*",
                            ],
                            "defaults" => [
                            ],
                        ],
                    ],
                ],
            ],
              "access-deny" => [
                "type" => "Literal",
                "options" => [
                    "route" => "/access-deny",
                    "defaults" => [
                        "__NAMESPACE__" => "Auth\Controller",
                        "controller" => "Auth",
                        "action" => "access-deny",
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Auth\Controller\Auth' =>  'Auth\Controller\Factory\AuthControllerFactory',
            'Auth\Controller\Profile' => 'Auth\Controller\Factory\ProfileControllerFactory',
            'Auth\Controller\UpdatePassword' => 'Auth\Controller\Factory\UpdatePasswordControllerFactory',
            "Home\Controller\Home" => "Home\Controller\Factory\HomeControllerFactory",
           
           ],
    ],
    'service_manager' => [
        'factories' => [
            //Seviço de Authentication
            'Auth\Storage\IdentityManager'=>'Auth\Storage\Factory\IdentityManagerFactory',
            'Auth\Storage\AuthStorage'=>'Auth\Storage\Factory\AuthStorageFactory',
            'Auth\Acl\Acl'=>'Auth\Acl\Factory\AclFactory',
            'Auth\Model\Users\AuthRepository'=>'Auth\Model\Users\Factory\AuthRepositoryFactory',
            'Auth\Form\ForgothenPasswordFilter'=>'Auth\Form\Factory\ForgothenPasswordFilterFactory',
            'Auth\Form\ForgothenPasswordForm'=>'Auth\Form\Factory\ForgothenPasswordFormFactory',
            'Auth\Form\ProfileFilter'=>'Auth\Form\Factory\ProfileFilterFactory',
            'Auth\Form\ProfileForm'=>'Auth\Form\Factory\ProfileFormFactory',
            'Auth\Form\UpdatePasswordFilter'=>'Auth\Form\Factory\UpdatePasswordFilterFactory',
            'Auth\Form\UpdatePasswordForm'=>'Auth\Form\Factory\UpdatePasswordFormFactory',
            'Auth\Form\RegisterForm'=>'Auth\Form\Factory\RegisterFormFactory',
            'Auth\Form\RegisterFilter'=>'Auth\Form\Factory\RegisterFilterFactory',
            'Auth\Form\AuthForm'=>'Auth\Form\Factory\AuthFormFactory',
            'Auth\Form\AuthFilter' => 'Auth\Form\Factory\AuthFilterFactory',

        ],
        'invokables' => [

        ],
    ],
    'view_helpers' => [
        'invokables' => [

        ],
        'factories' => [
            'UserIdentity'=>'Auth\View\Helper\UserIdentityFactory',
            
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
