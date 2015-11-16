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
            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '/gii', 'access' => 'admin'],
            ['label' => 'Down', 'icon' => 'fa fa-dashboard', 'url' => '', 'access' => 'admin',
             'items' => [
                 ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '/gii','access' => 'admin'],
                 ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => '/debug','access' => 'admin'],
             ],
            ],

        ];

    }

    static function renderItems()
    {
        $items = self::initItems();

        echo '<ul class="sidebar-menu">';

        foreach( $items as $item )
        {
            $access = $item['access'];


            if( isset($item['items']) )
            {
                if( $access == 'admin' )
                {
                    echo '<li class="treeview '.$access.'"><a><i class="' . $item['icon'] . '"></i><span>' . $item["label"] . '<i class="fa fa-angle-left pull-right"></i></a><span><ul class="treeview-menu"></li>';
                    foreach( $item['items'] as $subitem )
                    {
                        $accessSubItem = $subitem['access'];
//                        провер€ю пользовател€
                        if($accessSubItem == 'admin')
                        {
                            $accessSubItem = 'show';
                        }else
                        {
                            $accessSubItem = 'hide';
                        }

                        echo '<li class="treeview-menu '.$accessSubItem.'"><a href="' . $subitem['url'] . '"><i class="' . $subitem['icon'] . '"></i><span>' . $subitem["label"] . '<span></a></li>';
                    }
                    echo '</ul>';
                }
            }else
            {
                if($access == 'admin')
                {
                    $access = 'show';
                }else
                {
                    $access = 'hide';
                }
                echo '<li class="treeview '.$access.'"><a href="' . $item['url'] . '"><i class="' . $item['icon'] . '"></i><span>' . $item["label"] . '<span></a></li>';

            }
        }

        echo "</ul>";
    }


}