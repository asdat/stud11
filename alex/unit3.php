<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unit 1</title>
    </head>
    <body style="font-size:50px;" >
	<?php
		$menu='
			<li>
				<a href="https://github.com/adobe/brackets" data-i18n="footer.links.content.source">Source Code on Github</a>
			</li>
			<li>
				<a href="docs/current/modules/brackets.html" data-i18n="footer.links.content.apidocs">API Documentation</a>
			</li>
			<li>
				<a href="https://ingorichter.github.io/BracketsExtensionTweetBot/" data-i18n="footer.links.content.extension-updates">Weekly Extension Updates</a>
			</li>
			<li>-
				<a href="https://github.com/adobe/brackets/wiki/Troubleshooting" data-i18n="footer.links.content.troubleshooting">Troubleshooting Help</a>
			</li>
			<li>
				<a href="https://github.com/adobe/brackets/wiki" data-i18n="footer.links.content.wiki">Wiki</a>
			</li>
		';
		// var_dump(count(explode("</li>
			// <li>", $menu)));
		// die;
		#test
		// echo str_replace(['<li>','</li>'],['<p>','</p>'],$menu);
		// str_ireplace();
		// echo $menu[5];
		// echo strpos($menu, '<li1>');
		// echo strlen($menu);
		// var_dump(strpos($menu, '<li>')===false);
		// echo strcmp($menu, $menu);
		// var_dump(str_split($menu));
		// echo '12345'/5;
		// var_dump(str_shuffle($menu));
		// echo strip_tags($menu,'<li></li>');
		// echo html_entity_decode(htmlentities($menu));
		// echo base64_encode('https://github.com/adobe/brackets');
		// $tmp = urlencode(base64_encode('echo "20";'));
		// echo $tmp;
		// eval(base64_decode(urldecode($_GET['test'])));
		// eval('echo "20";');
                //file_put_contents('test.html', 'tt');
		//echo file_get_contents('test.html');
		
		// echo "";
		// strrev();
		// stripos();
		// strripos();
		// strrpos();
		
		
		// $explode = 'test1,test2';
		// $explode .= $explode.'test';
		// $array = explode('s', $explode);
		// print_R($array);
		// var_dump($array);
		
		
		// $k=" i am delimiter!  $explode";
		// echo implode($k, $array);
		// echo $string1;
		// print_string($string1);
		// $string2 = "\n \t $\$k  \" ''''";
		
		// echo '<br/>';
		// echo '<br/>';
		// echo '<br/>';
		// echo $string2;
		
		// echo date('H:i d/m/Y');
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
            echo "<ul class=\"menu\">\n";
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
            echo '</ul>';
            $classes=['menu', 'submen', 'sub-submen'];
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
	&copy;
    </body>
</html>