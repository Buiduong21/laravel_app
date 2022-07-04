<?php 
return [
    [
        'route' => 'category.index',
        'title' => 'Trang chủ',
        'icon' => 'fa-home'
    ],
     [
        'route' => 'category.index',
        'title' => 'Danh mục',
        'icon' => 'fa-th',
        'items' => [
            [
            'route' => 'category.index',
            'title' => 'Danh sách danh mục',
            'icon' => 'fa-th'
            ],
            [
            'route' => 'category.create',
            'title' => 'Thêm danh mục',
            'icon' => 'fa-th'
            ]   
        ]
    ],
     [
        'route' => 'product.index',
        'title' => 'Sản phẩm',
        'icon' => 'fa-th',
        'items' => [
            [
            'route' => 'product.index',
            'title' => 'Danh sách sản phẩm',
            'icon' => 'fa-th'
            ],
            [
            'route' => 'product.create',
            'title' => 'Thêm sản phẩm',
            'icon' => 'fa-th'
            ]   
        ]
            ],
            [
        'route' => 'blog.index',
        'title' => 'Blog',
        'icon' => 'fa-th',
        'items' => [
            [
            'route' => 'blog.index',
            'title' => 'Danh sách blog',
            'icon' => 'fa-th'
            ],
            [
            'route' => 'blog.create',
            'title' => 'Thêm mới blog',
            'icon' => 'fa-th'
            ]   
        ]
    ]
]

?>