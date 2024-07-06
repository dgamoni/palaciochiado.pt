<?php
	$src1 = get_template_directory_uri() . '/dist/images/glass1.png';
	$src2 = get_template_directory_uri() . '/dist/images/glass2.png';
	$image1 = '<img src="' . $src1 . '" class="menu__bg-image menu__bg-image--one">';
	$image2 = '<img src="' . $src2 . '" class="menu__bg-image menu__bg-image--two">';
?>

<section class="menu-container">
	<?php
		if(get_post_type() === 'bar') {
			echo $image1;
			echo $image2;
		}
	?>

  	<div class="menu">
	  	<div class="menu__head">
		  	<p class="text-tag text-tag--big text-yellow-light"><?php the_field('menu_title'); ?></p>
		  	<h2 class="title title--big text-white"><?php echo get_the_title(); ?></h2>
	  	</div>
        <?php
          $active = '';
          if(get_post_type() === 'restaurant') {
            $active = 'active';
          }
        ?>

		<?php if(have_rows('menu')): ?>
		  	<div class="menu__body">
		  		<ul class="menu__tabs">
						<?php while(have_rows('menu')): the_row(); ?>
				  			<li class="js-tab menu__category <?php echo $active; ?>"><a href="#" data-name="<?php the_sub_field('category'); ?>"><?php the_sub_field('category'); ?></a></li>
						<?php endwhile; ?>
		  		</ul>
					<?php while(have_rows('menu')): the_row(); ?>
						<?php if(have_rows('menu_item')): ?>
			  				<ul class="js-tab-item menu__content">
									<?php
										$k = 0;
										while(have_rows('menu_item')): the_row();
										//var_dump($k);
											if($k % 5 === 0) {
												if($k === 0) {
													echo '<div class="js-pager-container menu__container">';
												} else {
													echo '</div><div class="js-pager-container menu__container">';
												}
											};
											?>
							  				<li class="menu__dish">
							  					<p class="menu__dish-name"><?php the_sub_field('name'); ?></p>
							  					<p class="menu__dish-description"><?php the_sub_field('description'); ?></p>
							  					<!-- <p class="menu__dish-price">€ <?php the_sub_field('price'); ?></p> -->
							  				</li>
											<?php
												$k++;
										endwhile;
									?>
									</div>

									<ul class="menu__pager">
										<?php
										//var_dump($k);
	
										// $numbOfItems = $k < 5 ? 0 : $k % 5;
										if ( $k <= 5){
											$numbOfItems = 0;
										} else {
											$numbOfItems = floor( $k / 5 );
										}
										
							            if($numbOfItems > 0) {
							  				for ($i = 0; $i <= $numbOfItems; $i++) {
							  					//var_dump($i);
							                  $active = $i === 0 ? 'active' : '';
							  					echo '<li class="menu__pager-item '. $active .'"><a href="#" class="js-menu-pager">' . intval($i + 1) . '</a></li>';
							  				}
							            }
										?>
									</ul>
					  		</ul>
						<?php endif; ?>
					<?php endwhile; ?>
		  	</div>
		<?php endif; ?>

	</div>


	<?php
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		if (strpos($url,'http://palaciochiado.pt/restaurant/barra/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}

		if (strpos($url,'http://palaciochiado.pt/restaurant/farrobodo') !== false) {
		    echo '<br><ul style="margin-top: 67px !important; margin-bottom: 5px !important;" class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}

		if (strpos($url,'http://palaciochiado.pt/restaurant/rosmarino') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}

		if (strpos($url,'http://palaciochiado.pt/restaurant/seed') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}

		if (strpos($url,'http://palaciochiado.pt/restaurant/confeitaria-palacio') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}

		if (strpos($url,'http://palaciochiado.pt/restaurant/azimuth') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}

		if (strpos($url,'http://palaciochiado.pt/restaurant/cutelo') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}
		
		if (strpos($url,'http://palaciochiado.pt/restaurant/bar-do-palacio') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_PT_2020.pdf" data-name="Veja a carta completa aqui">Veja a carta completa aqui</a></li>
			</ul>';
		}
		
		//INGLES
		
		if (strpos($url,'/en/restaurant/barra/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		if (strpos($url,'/en/restaurant/farrobodo/') !== false) {
		    echo '<br><ul style="margin-top: 67px !important; margin-bottom: 5px !important;" class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		if (strpos($url,'/en/restaurant/rosmarino/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		if (strpos($url,'/en/restaurant/confeitaria-palacio/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		if (strpos($url,'/en/restaurant/seed/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		if (strpos($url,'/en/restaurant/cutelo/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		if (strpos($url,'/en/restaurant/azimuth/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="See the full menu here">See the full menu here</a></li>
			</ul>';
		}
		
		//ESPANHOL
		
		if (strpos($url,'/es/restaurant/barra/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
		
		if (strpos($url,'/es/restaurant/farrobodo/') !== false) {
		    echo '<br><ul style="margin-top: 67px !important; margin-bottom: 5px !important;" class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
		
		if (strpos($url,'/es/restaurant/rosmarino/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
		
		if (strpos($url,'/es/restaurant/confeitaria-palacio/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
		
		if (strpos($url,'/es/restaurant/seed/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
		
		if (strpos($url,'/es/restaurant/cutelo/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
		
		if (strpos($url,'/es/restaurant/azimuth/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VER EL MENÚ COMPLETO AQUÍ">VER EL MENÚ COMPLETO AQUÍ</a></li>
			</ul>';
		}
				//FRANCÊS
		
		if (strpos($url,'/fr/restaurant/barra/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
		
		if (strpos($url,'/fr/restaurant/farrobodo/') !== false) {
		    echo '<br><ul style="margin-top: 67px !important; margin-bottom: 5px !important;" class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
		
		if (strpos($url,'/fr/restaurant/rosmarino/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
		
		if (strpos($url,'/fr/restaurant/confeitaria-do-palacio/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
		
		if (strpos($url,'/fr/restaurant/seed/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
		
		if (strpos($url,'/fr/restaurant/cutelo/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
		
		if (strpos($url,'/fr/restaurant/azimuth/') !== false) {
		    echo '<br><ul class="menu__tabs tabs_pdf">
		  		<li class="js-tab menu__category active"><a href="https://palaciochiado.pt/wp/wp-content/uploads/2020/06/Palacio_Chiado_Gastronomia_EN_2020.pdf" data-name="VOIR LE MENU COMPLET ICI">VOIR LE MENU COMPLET ICI</a></li>
			</ul>';
		}
	?>
</section>
