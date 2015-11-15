<?php

namespace app\components;
use Yii;


class Menu
{
    public $items;
    static function initItems()
    {
        return [
            ['label' => 'Landing', 'icon' => 'fa fa-cubes', 'url' => '/landing', 'access' => 'admin'],
            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '/gii','access' => 'admin'],
            ['label' => 'Down', 'icon' => 'fa fa-dashboard', 'url' => '/debug','access' => 'admin',
             'items' => [
                 ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '/gii'],
                 ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => '/debug'],
             ],
            ],

        ];

    }
    static function renderItems()
    {
        $items = self::initItems();

        echo '<ul class="sidebar-menu">';
        foreach ($items as $item) {
            if (isset($item['access']) && $item['access'] == 'admin') {
                echo '<li><a href="' . $item['url'] . '"><i class=' . $item['icon'] . '></i><span>' . $item["label"] . '<span></a></li>';
                if(isset($item['items']))
                {
                    foreach ($item['items'] as $itemin)
                    {
                        echo '<li><a href="' . $itemin['url'] . '"><i class=' . $itemin['icon'] . '></i><span>' . $itemin["label"] . '<span></a></li>';
                    }

                }
            }
        }
        echo "</ul>";


    }



}