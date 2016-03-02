	<?php
	
          $menu=[
                ['title'=>'Main', 'link'=>'/'],
                ['title'=>'Services', 'link'=>'services',
                    'children'=>[
                        ['title'=>'Service 1', 'link'=>'service-1'],
                        ['title'=>'Service 2', 'link'=>'service-2'],
                        ['title'=>'Service 3', 'link'=>'service-3']
                    ]
                ],
                ['title'=>'Contacts', 'link'=>'contacts']
            ];
   /*         echo "<ul class=\"menu\">\n";
            foreach($menu AS $i=>$item){
                echo "\t<li class='item-$i'>\n\t\t<a href='{$item['link']}'>{$item['title']}</a>\n";
                if(count($item['children'])){
                    echo "\t\t<ul class=\"submenu\">\n";
                    foreach($item['children'] AS $k=>$subitem){
                        echo "\t\t\t<li class='item-$k'>\n"
                                . "\t\t\t\t<a href='{$subitem['link']}'>{$subitem['title']}</a>\n"
                                . "\t\t\t</li>\n";
                    }
                    echo "\t\t</ul>\n";
                }
                echo "\t</li>\n";
            }
            echo '</ul>';*/
            $classes=['selected', 'selected', 'selected'];
            function printMenu($menu, $level){
                global $classes;
                if($level==0) $html.='menu';
                else $html.='submenu';
                $html= "<ul class=\"{$classes[$level]}\">\n";
                foreach($menu AS $i=>$item){
                    $html.="\t<li class='item-$i'>\n\t\t<a href='{$item['link']}'>{$item['title']}</a>\n";
                    if(count($item['children'])){
                        $html.=printMenu($item['children'], $level+1);
                    }
                    $html.="\t\t</li>\n";
                }
                $html.= '</ul>';
                return $html;
            }
            echo printMenu($menu, 0);
        
	?>