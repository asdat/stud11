<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Hyperspace by HTML5</title>
               <base href="http://stud11.asdat.info/alex/"/>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<?php
		// массив нашего меню, в будущем будет взят из базы данных
		$menu=[
			['title'=>'Главная', 'link'=>'/'],
			['title'=>'Услуги', 'link'=>'/#intro',
				'children'=>[
					['title'=>'Услуга 1', 'link'=>'#one'],
					['title'=>'Услуга 2', 'link'=>'#two'],
					['title'=>'Услуга 3', 'link'=>'#three']
				]
			],
			['title'=>'Новости', 'link'=>'/alex/?page=news'],
			['title'=>'Портфолио', 'link'=>'portfolio'],
			['title'=>'Контакты', 'link'=>'/alex/?page=contacts']
		];
		// массив классов для разных уровней иерархии
		$classes = [0=>'menu','submenu','third-level'];
		// объявляем функцию
		function printMenu($menu, $level){
			// объявляем доступ к глобальной переменной
			global $classes;
			// начинаем формирование меню с учетом класса соответствующего текущему уровню иерархии
			$html= "<ul class=\"{$classes[$level]}\">\n";
			// в цикле выводим все элементы текущего уровня
			foreach($menu AS $i=>$item){
				// выводим конкретный текущий элемент
				$html.="<li class='item-$i'><a href='{$item['link']}'>{$item['title']}</a>\n";
				// проверяем есть ли дочерние элементы
				if(count($item['children'])){
					// выводим дочерние элементы, если они есть
					$html.=printMenu($item['children'], $level+1);
				}
				// конец формирования вывода
				$html.="</li>\n";
			}
			// завершаем формирование
			$html.= '</ul>';
			// возвращаем результат
			return $html;
		}
		 
				// массив страниц, на данном этапе имеем стативный код
		// в будущем будем извлекать из специальных шаблонов и наполнять данными из БД
$x=include ("1.php");
		$pages=[
			'contacts'=>['title'=>'Contacts', 'content'=> "$x"],
			'news'=>['title'=>'New', 'content'=>'<section>
					<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
					<div class="content">
						<div class="inner">
							<h2>Feugiat consequat</h2>
							<p>rtrerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr.</p>
							<ul class="actions">
								<li><a href="#" class="button">Learn more</a></li>
							</ul>
						</div>
					</div>
				</section>']
		];
                
                
		?>
		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<!-- обращаемся к нашей функции и выводим меню из массива $menu -->
						<?php echo printMenu($menu, 0);?>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<?php
							// условная база пользователей
							$users=[
								['title'=>'test', 'pass'=>'789', 'type'=>'user'],
								['title'=>'admin', 'pass'=>'12345', 'type'=>'admin'],
							];
							// результат авторизации, по умолчанию будет false, чтобы типы не приводить
							$result=false;
							// перебираем всех пользователей в базе
							foreach($users AS $i=>$user){
								// проверяем это ли искомый пользователь
								if(strcmp($user['title'],$_REQUEST['user'])==0){
									// если искомый пользователь найден, то проверяем совпадает ли пароль
									if(strcmp($user['pass'],$_REQUEST['pass'])==0){
										// если искомый пользователь найден и пароль правильный, то возвращаем результат, что пользователь авторизован
										$result = $user['title'].' authorized';
									}else{
										// если искомый пользователь найден и пароль правильный, то возвращаем результат, что пароль неправильный
										$result =  'password is incorrect';
									}
									// т.к. пользователь найден, то прерываем цикл перебора
									break;
								}
							}
							// по-умолчанию false, в цикле мы либо меняем $result и прерываем цикл, либо выходим из него, а значит любое значение даст true
							if($result){
								// если пользователь найден
								echo $result;
							// проверяем установлена ли переменная
							}elseif(isset($_REQUEST['user'])){
								// если пользователь не найден
								echo 'user '.$_REQUEST['title'].' not registered<br/>';
							}
							?>
							<h1>
							<?php
								// выводим заголовок в зависимости от страницы, если ничего не задано, то выводим "Главная"
								// используем сокращенную форму условного оператора и функцию проверки
								// наличия элемента в массиве in_array($value, $array), возвращает true или false
								// и функцию получения массива ключей массива array_keys($array), возвращает array
								echo in_array($_GET['page'], array_keys($pages)) ? $pages[$_GET['page']]['title'] : 'Главная';
								// развернутый вариант условия
								/*
								if(in_array($_GET['page'], array_keys($pages))){
									echo $pages[$_GET['page']]['title'];
								}else{
									echo 'Главная';
								}
								echo $pages[$_GET['page']]['content'];
								*/
							?>
							</h1>
							<p>Just another fine responsive site template designed by <a href="http://html5up.net">HTML5 UP</a><br />
							and released for free under the <a href="http://html5up.net/license">Creative Commons</a>.</p>
							<!-- Это HTML комментарий, будет выведен на странице -->
							<!-- Форма авторизации, передаем данные через POST -->
							<form action="index.php" method="post">
								<!-- имя пользователя -->
								<input name="user" type="text" value="" />
								<!-- пароль -->
								<input name="pass" type="password" value="" />
								<!-- кнопка "отправить" -->
								<input name="submit" type="submit" value="submit" />
							</form>
							<?php echo in_array($_GET['page'], array_keys($pages)) ? $pages[$_GET['page']]['content'] : 'Главная';?>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="images/pic01.jpg" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Sed ipsum dolor</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
						</section>
						
						<section>
							<a href="#" class="image"><img src="images/pic03.jpg" alt="" data-position="25% 25%" /></a>
							<div class="content">
								<div class="inner">
									<h2>Ultricies aliquam</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									<ul class="actions">
										<li><a href="#" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
						</section>
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>What we do</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<div class="features">
								<section>
									<span class="icon major fa-code"></span>
									<h3>Lorem ipsum amet</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-lock"></span>
									<h3>Aliquam sed nullam</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-cog"></span>
									<h3>Sed erat ullam corper</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-desktop"></span>
									<h3>Veroeros quis lorem</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-chain"></span>
									<h3>Urna quis bibendum</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-diamond"></span>
									<h3>Aliquam urna dapibus</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
							</div>
							<ul class="actions">
								<li><a href="#" class="button">Learn more</a></li>
							</ul>
						</div>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Get in touch</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<div class="split style1">
								
								<section>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<span>12345 Somewhere Road #654<br />
											Nashville, TN 00000-0000<br />
											USA</span>
										</li>
										<li>
											<h3>Email</h3>
											<a href="#">user@untitled.tld</a>
										</li>
										<li>
											<h3>Phone</h3>
											<span>(000) 000-0000</span>
										</li>
										<li>
											<h3>Social</h3>
											<ul class="icons">
												<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="fa-github"><span class="label">GitHub</span></a></li>
												<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="fa-linkedin"><span class="label">LinkedIn</span></a></li>
											</ul>
										</li>
									</ul>
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>