<?php

//Adding Meta Boxes
function my_cpt_add_custom_box()
{
	$screens = ['banners', 'depoimentos', 'diretoria', 'quick_access', 'sobre-nos', 'sections', 'locais', 'page', 'lgpd'];
	foreach ($screens as $screen) {
		add_meta_box(
			'my_cpt_id',           // Unique ID
			'Campos de Conteúdo',  // Box title
			'my_cpt_custom_box_html',  // Content callback, must be of type callable
			$screen                   // Post type
		);
	}
}
add_action('add_meta_boxes', 'my_cpt_add_custom_box');

// Print HTML add Meta Boxes
function my_cpt_custom_box_html($post)
{
	$metabox_content_1 = get_post_meta($post->ID, 'metabox_content_1', true);
	$metabox_content_2 = get_post_meta($post->ID, 'metabox_content_2', true);
	$metabox_content_3 = get_post_meta($post->ID, 'metabox_content_3', true);
	$metabox_content_4 = get_post_meta($post->ID, 'metabox_content_4', true);

	$place_my_cpt = get_post_meta($post->ID, 'place_my_cpt_key', true);
	$parent_my_cpt = get_post_meta($post->ID, 'parent_my_cpt_key', true);
	$parent_my_cpt_pg = get_post_meta($post->ID, 'parent_my_cpt_pg_key', true);
	$type_my_cpt = get_post_meta($post->ID, 'type_my_cpt_key', true);
	$title_my_cpt = get_post_meta($post->ID, 'title_my_cpt_key', true);
	$title_my_cpt_color = get_post_meta($post->ID, 'title_my_cpt_color_key', true);
	$description_my_cpt = get_post_meta($post->ID, 'description_my_cpt_key', true);
	$description_my_cpt_color = get_post_meta($post->ID, 'description_my_cpt_color_key', true);
	$format_my_cpt = get_post_meta($post->ID, 'format_my_cpt_key', true);
	$style_my_cpt = get_post_meta($post->ID, 'style_my_cpt_key', true);
	$link_button_my_cpt = get_post_meta($post->ID, 'link_button_my_cpt_key', true);
	$text_button_my_cpt = get_post_meta($post->ID, 'text_button_my_cpt_key', true);
	// Style Button
	$button_my_cpt_color = get_post_meta($post->ID, 'button_my_cpt_color', true);
	$text_button_my_cpt_color = get_post_meta($post->ID, 'text_button_my_cpt_color', true);
	$button_my_cpt_color_border = get_post_meta($post->ID, 'button_my_cpt_color_border', true);
	// Hover Style Button
	$button_my_cpt_color_hover = get_post_meta($post->ID, 'button_my_cpt_color_hover', true);
	$text_button_my_cpt_color_hover = get_post_meta($post->ID, 'text_button_my_cpt_color_hover', true);
	$button_my_cpt_color_border_hover = get_post_meta($post->ID, 'button_my_cpt_color_border_hover', true);


?>
	<style type="text/css">
		.my_cpt_forms.container {
			position: relative;
			display: flex;
			flex-direction: column;
		}

		.my_cpt_forms .my_cpt_row {
			position: relative;
			display: flex;
			flex-direction: row;
			margin-bottom: 10px;
		}

		.my_cpt_forms .my_cpt_label {
			position: relative;
			width: 160px !important;
		}

		.my_cpt_forms .my_cpt_input {
			position: relative;
			width: calc(100% - 120px) !important;
		}

		.my_cpt_forms .my_cpt_row.colls {}

		.my_cpt_forms .my_cpt_row.colls--colls2 {}

		.my_cpt_forms .my_cpt_row .colls--colls2--coll {
			width: calc(50% - 60px) !important;
			display: flex;
		}

		.my_cpt_forms .my_cpt_row .colls--colls2--coll:last-child {
			padding-left: 15px;
		}

		.my_cpt_forms .my_cpt_row.colls--colls2 .my_cpt_label--coll {
			width: 60px !important;
			display: flex;
			align-items: center;
			color: #777777;
			font-size: 12px;
		}

		.my_cpt_forms .my_cpt_row.colls--colls2 .my_cpt_input {
			width: calc(100% - 60px) !important;
		}

		@media screen and (max-width:768px) {
			.my_cpt_forms .my_cpt_row.colls--colls2 {
				flex-direction: column;
			}

			.my_cpt_forms .my_cpt_row .colls--colls2--coll {
				width: 100% !important;
			}

			.my_cpt_forms .my_cpt_row .colls--colls2--coll:last-child {
				padding-left: 0px !important;
			}
		}
	</style>


	<script type="text/javascript">

		jQuery(function($) {
			$(document).ready(function() {

				var check_complement = jQuery('#metabox_content_1').val();
				if ( check_complement == 'complement' ){
					jQuery('#DropDown--complement').show();
				}
				
			});
		});

		function eventChangeDropDow(param1,param2) {
			if ( param1 == 'locais' ) {
				if ( param2 == 'complement' ) {
					jQuery('#DropDown--complement').fadeIn();
				} else {
					jQuery('#DropDown--complement').fadeOut();
				}
			} 
		}
		
		function checkCategoryType(category_type) {
			if (category_type == 'tax') {
				jQuery('#parent_my_cpt_tax').fadeIn();
			} else {
				jQuery('#parent_my_cpt_tax').fadeOut();
			}

			if (category_type == 'page') {
				jQuery('#parent_my_cpt_page').fadeIn();
			} else {
				jQuery('#parent_my_cpt_page').fadeOut();
			}

			if (category_type == 'bg_video') {
				jQuery('#parent_type_my_cpt_bg_video').fadeIn();
			} else {
				jQuery('#parent_type_my_cpt_bg_video').fadeOut();
			}
		}
	</script>

	<script>
		(function($) {
			// Add Color Picker to all inputs that have 'color-field' class
			$(function() {
				$('.color-field').wpColorPicker();
			});
		})(jQuery);
	</script>

	<div class="my_cpt_forms container">
		<?php if ($post->post_type == 'banners') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="place_my_cpt"><strong>Local:</strong></label>
				<select class="my_cpt_input" name="place_my_cpt" id="place_my_cpt" onchange="checkCategoryType(this.value)">
					<option value="">Selecione...</option>
					<option value="home" <?php selected($place_my_cpt, 'home'); ?>>Home - Principal</option>
				</select>
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="type_my_cpt"><strong>Tipo de conteúdo:</strong></label>
				<select class="my_cpt_input" name="type_my_cpt" id="type_my_cpt" onchange="checkCategoryType(this.value)">
					<option value="image" <?php selected($type_my_cpt, 'image'); ?>>Apenas Imagem e link</option>
					<option value="bg_image" <?php selected($type_my_cpt, 'bg_image'); ?>>Imagem | Legendas | Botão Link</option>
					<!-- <option value="bg_video" <?php // selected($type_my_cpt, 'bg_video'); ?>>Vídeo Background</option> -->
				</select>
			</div>
			<div id="parent_type_my_cpt_bg_video" class="my_cpt_row" style="<?php if ($type_my_cpt != 'bg_video') {
					echo 'display: none;';
				} ?>">
				<label class="my_cpt_label" for="metabox_content_1"><strong>URL do vídeo:</strong></label>
				<input class="my_cpt_input " type="text" name="metabox_content_1" id="metabox_content_1" value="<?php echo $metabox_content_1; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="title_my_cpt"><strong>Título</strong></label>
				<input class="my_cpt_input " type="text" name="title_my_cpt" id="title_my_cpt" value="<?php echo $title_my_cpt; ?>" />
			</div>
			
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="title_my_cpt_color"><strong>Cor do título</strong></label>
				<input class="my_cpt_input color-field" type="text" name="title_my_cpt_color" id="title_my_cpt_color" value="<?php echo $title_my_cpt_color; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="description_my_cpt"><strong>Descrição</strong></label>
				<textarea class="my_cpt_input" rows="3" name="description_my_cpt" id="description_my_cpt"><?php echo $description_my_cpt; ?></textarea>
			</div>
		
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="description_my_cpt_color"><strong>Cor da descrição</strong></label>
				<input class="my_cpt_input color-field" type="text" name="description_my_cpt_color" id="description_my_cpt_color" value="<?php echo $description_my_cpt_color; ?>" />
			</div>

			<div class="my_cpt_row colls--colls2">
				<label class="my_cpt_label" for="format_my_cpt"><strong>Layout:</strong></label>
				<div class="colls--colls2--coll">
					<label class="my_cpt_label--coll" for="format_my_cpt">Formato</label>
					<select class="my_cpt_input" name="format_my_cpt" id="format_my_cpt">
						<option value="format_1" <?php selected($format_my_cpt, 'format_1'); ?>>Formato 01</option>
						<option value="format_2" <?php selected($format_my_cpt, 'format_2'); ?>>Formato 02</option>
						<option value="format_3" <?php selected($format_my_cpt, 'format_3'); ?>>Formato 03</option>
					</select>
				</div>
				<div class="colls--colls2--coll">
					<label class="my_cpt_label--coll" for="style_my_cpt">Estilo</label>
					<select class="my_cpt_input" name="style_my_cpt" id="style_my_cpt">
						<option value="style_1" <?php selected($style_my_cpt, 'style_1'); ?>>Estilo 01</option>
					</select>
				</div>
			</div>

			<div class="my_cpt_row">
				<label class="my_cpt_label" for="link_button_my_cpt"><strong>Link do botão</strong></label>
				<input class="my_cpt_input " type="text" name="link_button_my_cpt" id="link_button_my_cpt" value="<?php echo $link_button_my_cpt; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="text_button_my_cpt"><strong>Texto do botão</strong></label>
				<input class="my_cpt_input " type="text" name="text_button_my_cpt" id="text_button_my_cpt" value="<?php echo $text_button_my_cpt; ?>" />
			</div>

			<!-- Style Button -->

			<div class="my_cpt_row">
				<label class="my_cpt_label" for="button_my_cpt_color"><strong>Cor do botão</strong></label>
				<input class="my_cpt_input color-field" type="text" name="button_my_cpt_color" id="button_my_cpt_color" value="<?php echo $button_my_cpt_color; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="text_button_my_cpt_color"><strong>Cor texto do botão</strong></label>
				<input class="my_cpt_input color-field" type="text" name="text_button_my_cpt_color" id="text_button_my_cpt_color" value="<?php echo $text_button_my_cpt_color; ?>" />
			</div>

			<div class="my_cpt_row">
				<label class="my_cpt_label" for="button_my_cpt_color_border"><strong>Cor da Borda do botão</strong></label>
				<input class="my_cpt_input color-field" type="text" name="button_my_cpt_color_border" id="button_my_cpt_color_border" value="<?php echo $button_my_cpt_color_border; ?>" />
			</div>

			<!-- Hover Style Button -->

			<div class="my_cpt_row">
				<label class="my_cpt_label" for="button_my_cpt_color_hover"><strong>Hover cor do botão</strong></label>
				<input class="my_cpt_input color-field" type="text" name="button_my_cpt_color_hover" id="button_my_cpt_color_hover" value="<?php echo $button_my_cpt_color_hover; ?>" />
			</div>

			<div class="my_cpt_row">
				<label class="my_cpt_label" for="text_button_my_cpt_color_hover"><strong>Hover Cor texto do botão</strong></label>
				<input class="my_cpt_input color-field" type="text" name="text_button_my_cpt_color_hover" id="text_button_my_cpt_color_hover" value="<?php echo $text_button_my_cpt_color_hover; ?>" />
			</div>

			<div class="my_cpt_row">
				<label class="my_cpt_label" for="button_my_cpt_color_border_hover"><strong>Cor da Borda do botão</strong></label>
				<input class="my_cpt_input color-field" type="text" name="button_my_cpt_color_border_hover" id="button_my_cpt_color_border_hover" value="<?php echo $button_my_cpt_color_border_hover; ?>" />
			</div>

		<?php } ?>
		<?php if ($post->post_type == 'depoimentos') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="title_my_cpt"><strong>Nome do cliente</strong></label>
				<input class="my_cpt_input " type="text" name="title_my_cpt" id="title_my_cpt" value="<?php echo $title_my_cpt; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="description_my_cpt"><strong>Citação</strong></label>
				<textarea class="my_cpt_input" rows="3" name="description_my_cpt" id="description_my_cpt"><?php echo $description_my_cpt; ?></textarea>
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="link_button_my_cpt"><strong>Local</strong></label>
				<input class="my_cpt_input " type="text" name="link_button_my_cpt" id="link_button_my_cpt" value="<?php echo $link_button_my_cpt; ?>" placeholder="Empresa ou Cidade-UF" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="button_my_cpt_color"><strong>Cargo</strong></label>
				<input class="my_cpt_input" type="text" name="button_my_cpt_color" id="button_my_cpt_color" value="<?php echo $button_my_cpt_color; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="place_my_cpt"><strong>Avaliação:</strong></label>
				<select class="my_cpt_input" name="place_my_cpt" id="place_my_cpt" onchange="checkCategoryType(this.value)">
					<option value="">Selecione...</option>
					<option value="1" <?php selected($place_my_cpt, 1); ?>>1</option>
					<option value="2" <?php selected($place_my_cpt, 2); ?>>2</option>
					<option value="3" <?php selected($place_my_cpt, 3); ?>>3</option>
					<option value="4" <?php selected($place_my_cpt, 4); ?>>4</option>
					<option value="5" <?php selected($place_my_cpt, 5); ?>>5</option>
				</select>
			</div>
		<?php } ?>
		<?php if ($post->post_type == 'diretoria') { ?>
			<h3>Redes Sociais</h3>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_1"><strong>Instagram</strong></label>
				<input class="my_cpt_input " type="text" name="metabox_content_1" id="metabox_content_1" value="<?php echo $metabox_content_1; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_2"><strong>Facebook</strong></label>
				<input class="my_cpt_input " type="text" name="metabox_content_2" id="metabox_content_1" value="<?php echo $metabox_content_2; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_3"><strong>Linkedin</strong></label>
				<input class="my_cpt_input " type="text" name="metabox_content_3" id="metabox_content_3" value="<?php echo $metabox_content_3; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_4"><strong>Youtube</strong></label>
				<input class="my_cpt_input " type="text" name="metabox_content_4" id="metabox_content_4" value="<?php echo $metabox_content_4; ?>" />
			</div>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="description_my_cpt"><strong>Descrição</strong></label>
				<textarea class="my_cpt_input" rows="3" name="description_my_cpt" id="description_my_cpt"><?php echo $description_my_cpt; ?></textarea>
			</div>
		<?php } ?>
		<?php if ($post->post_type == 'quick_access') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_1"><strong>Tipo:</strong></label>
				<select class="my_cpt_input" name="metabox_content_1" id="metabox_content_1" onchange="checkCategoryType(this.value)">
					<option value="">Selecione...</option>
					<option value="scroller" <?php selected($metabox_content_1, 'scroller'); ?>>Scroll Link</option>
					<option value="modal" <?php selected($metabox_content_1, 'modal'); ?>>Modal (Popup)</option>
					<option value="inner_link" <?php selected($metabox_content_1, 'inner_link'); ?>>Link Interno</option>
					<option value="external_link" <?php selected($metabox_content_1, 'external_link'); ?>>Link Externo</option>
				</select>
			</div>			
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_2"><strong>URL/URI</strong></label>
				<input class="my_cpt_input" type="text" name="metabox_content_2" id="metabox_content_2" value="<?php echo $metabox_content_2; ?>" />
			</div>
		<?php } ?>
		<?php if ($post->post_type == 'sobre-nos') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_1"><strong>Tipo:</strong></label>
				<select class="my_cpt_input" name="metabox_content_1" id="metabox_content_1" >
					<option value="">Selecione...</option>
					<option value="historia" <?php selected($metabox_content_1, 'historia'); ?>>História</option>
					<option value="missao" <?php selected($metabox_content_1, 'missao'); ?>>Missão</option>
					<option value="visao" <?php selected($metabox_content_1, 'visao'); ?>>Visão</option>
					<option value="valores" <?php selected($metabox_content_1, 'valores'); ?>>Valores</option>
					<option value="curiosidades" <?php selected($metabox_content_1, 'curiosidades'); ?>>Curiosidades</option>
					<option value="gerencia" <?php selected($metabox_content_1, 'gerencia'); ?>>Gerência</option>
					<option value="valores-comerciais" <?php selected($metabox_content_1, 'valores-comerciais'); ?>>Valores Comerciais</option>
					<option value="linha-do-tempo" <?php selected($metabox_content_1, 'linha-do-tempo'); ?>>Linha do Tempo</option>
				</select>
			</div>
		<?php } ?>
		<?php if ($post->post_type == 'locais') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_1"><strong>Tipo:</strong></label>
				<select class="my_cpt_input" name="metabox_content_1" id="metabox_content_1" onchange="eventChangeDropDow('locais',this.value)"> 
					<option value="">Selecione...</option>
					<option value="locations" <?php selected($metabox_content_1, 'locations'); ?>>Locais</option>
					<option value="complement" <?php selected($metabox_content_1, 'complement'); ?>>Complemento</option>
					<option value="others" <?php selected($metabox_content_1, 'others'); ?>>Outros</option>
				</select>
			</div>
			<div class="my_cpt_row" id="DropDown--complement" style="display:none;">
				<label class="my_cpt_label" for="metabox_content_2"><strong>Locais:</strong></label>
				<select class="my_cpt_input" name="metabox_content_2" id="metabox_content_2" >
					<option value="">Selecione...</option>
					<?php 

						$arr_locations = array(
							"post_type"   => "locais",
							"posts_per_page" => -1,
							"orderby" => "DATE",
							"order" => "DESC",
							'meta_query' => array(
							array(
								'key' => 'metabox_content_1',
								'value' => 'locations',
								'compare' => "="
										)
								)
							);
						$lopp_locations = get_posts($arr_locations);
						foreach( $lopp_locations as $location_detail ){
							if ( $location_detail->ID == $metabox_content_2 ) {
								$selected = 'selected="selected"';
							} else {
								$selected = '';
							}
							echo '<option value="' . $location_detail->ID . '" ' . $selected . ' >' . $location_detail->post_title . '</option>';
						}
					?>
					
				</select>
			</div>
		<?php } ?>
		<?php if ($post->post_type == 'lgpd') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_1"><strong>Tipo:</strong></label>
				<select class="my_cpt_input" name="metabox_content_1" id="metabox_content_1"> 
					<option value="">Selecione...</option>
					<option value="card" <?php selected($metabox_content_1, 'card'); ?>>Card</option>
					<option value="faq" <?php selected($metabox_content_1, 'faq'); ?>>FAQ</option>
				</select>
			</div>
		<?php } ?>
		<?php if ($post->post_type == 'sections') { ?>
			<div class="my_cpt_row">
				<label class="my_cpt_label" for="metabox_content_1"><strong>Seção:</strong></label>
				<select class="my_cpt_input" name="metabox_content_1" id="metabox_content_1">
					<option value="">Selecione...</option>
					<option value="acesso_rapido" <?php selected($metabox_content_1, 'acesso_rapido'); ?>>Acesso rápido</option>
					<option value="sobre_nos" <?php selected($metabox_content_1, 'sobre_nos'); ?>>Sobre nós</option>
					<option value="onde_estamos" <?php selected($metabox_content_1, 'onde_estamos'); ?>>Onde estamos</option>
					<option value="depoimentos" <?php selected($metabox_content_1, 'depoimentos'); ?>>Depoimentos</option>
					<option value="produtos" <?php selected($metabox_content_1, 'produtos'); ?>>Produtos</option>
					<option value="fale_conosco" <?php selected($metabox_content_1, 'fale_conosco'); ?>>Fale conosco</option>
					<option value="trabalhe_conosco" <?php selected($metabox_content_1, 'trabalhe_conosco'); ?>>Trabalhe conosco</option>
					<option value="lgpd" <?php selected($metabox_content_1, 'lgpd'); ?>>LGPD</option>
					<option value="blog" <?php selected($metabox_content_1, 'blog'); ?>>Blog</option>
					<option value="redes_sociais" <?php selected($metabox_content_1, 'redes_sociais'); ?>>Redes sociais</option>
					<option value="feed_instagram" <?php selected($metabox_content_1, 'feed_instagram'); ?>>Feed do Instagram</option>
					<option value="newsletter" <?php selected($metabox_content_1, 'newsletter'); ?>>Newsletter</option>
				</select>
			</div>
		<?php } ?>

	<?php
}

//Saving Values
function my_cpt_save_postdata($post_id)
{
	if (array_key_exists('metabox_content_1', $_POST)) {
		update_post_meta($post_id, 'metabox_content_1', $_POST['metabox_content_1']);
	}
	if (array_key_exists('metabox_content_2', $_POST)) {
		update_post_meta($post_id, 'metabox_content_2', $_POST['metabox_content_2']);
	}
	if (array_key_exists('metabox_content_3', $_POST)) {
		update_post_meta($post_id, 'metabox_content_3', $_POST['metabox_content_3']);
	}
	if (array_key_exists('metabox_content_4', $_POST)) {
		update_post_meta($post_id, 'metabox_content_4', $_POST['metabox_content_4']);
	}
	if (array_key_exists('place_my_cpt', $_POST)) {
		update_post_meta($post_id, 'place_my_cpt_key', $_POST['place_my_cpt']);
	}
	if (array_key_exists('parent_my_cpt', $_POST)) {
		update_post_meta($post_id, 'parent_my_cpt_key', $_POST['parent_my_cpt']);
	}
	if (array_key_exists('parent_my_cpt_pg', $_POST)) {
		update_post_meta($post_id, 'parent_my_cpt_pg_key', $_POST['parent_my_cpt_pg']);
	}
	if (array_key_exists('title_my_cpt', $_POST)) {
		update_post_meta($post_id, 'title_my_cpt_key', $_POST['title_my_cpt']);
	}
	if (array_key_exists('title_my_cpt_color', $_POST)) {
		update_post_meta($post_id, 'title_my_cpt_color_key', $_POST['title_my_cpt_color']);
	}
	if (array_key_exists('description_my_cpt', $_POST)) {
		update_post_meta($post_id, 'description_my_cpt_key', $_POST['description_my_cpt']);
	}
	if (array_key_exists('description_my_cpt_color', $_POST)) {
		update_post_meta($post_id, 'description_my_cpt_color_key', $_POST['description_my_cpt_color']);
	}
	if (array_key_exists('type_my_cpt', $_POST)) {
		update_post_meta($post_id, 'type_my_cpt_key', $_POST['type_my_cpt']);
	}
	if (array_key_exists('format_my_cpt', $_POST)) {
		update_post_meta($post_id, 'format_my_cpt_key', $_POST['format_my_cpt']);
	}
	if (array_key_exists('style_my_cpt', $_POST)) {
		update_post_meta($post_id, 'style_my_cpt_key', $_POST['style_my_cpt']);
	}
	if (array_key_exists('link_button_my_cpt', $_POST)) {
		update_post_meta($post_id, 'link_button_my_cpt_key', $_POST['link_button_my_cpt']);
	}
	if (array_key_exists('text_button_my_cpt', $_POST)) {
		update_post_meta($post_id, 'text_button_my_cpt_key', $_POST['text_button_my_cpt']);
	}

	// Button Style
	if (array_key_exists('button_my_cpt_color', $_POST)) {
		update_post_meta($post_id, 'button_my_cpt_color', $_POST['button_my_cpt_color']);
	}
	if (array_key_exists('text_button_my_cpt_color', $_POST)) {
		update_post_meta($post_id, 'text_button_my_cpt_color', $_POST['text_button_my_cpt_color']);
	}
	if (array_key_exists('button_my_cpt_color_border', $_POST)) {
		update_post_meta($post_id, 'button_my_cpt_color_border', $_POST['button_my_cpt_color_border']);
	}
	// Hover Button Style
	if (array_key_exists('button_my_cpt_color_hover', $_POST)) {
		update_post_meta($post_id, 'button_my_cpt_color_hover', $_POST['button_my_cpt_color_hover']);
	}
	if (array_key_exists('text_button_my_cpt_color_hover', $_POST)) {
		update_post_meta($post_id, 'text_button_my_cpt_color_hover', $_POST['text_button_my_cpt_color_hover']);
	}
	if (array_key_exists('button_my_cpt_color_border_hover', $_POST)) {
		update_post_meta($post_id, 'button_my_cpt_color_border_hover', $_POST['button_my_cpt_color_border_hover']);
	}
}
add_action('save_post', 'my_cpt_save_postdata');


//Imagem de mobile do Banner

function add_post_enctype() {
	//Changing form enctype..
echo ' enctype="multipart/form-data"';
}

add_action('post_edit_form_tag', 'add_post_enctype');


function upload_mobile_image_metabox() {
	add_meta_box(
		'upload_mobile_image',          // ID da Meta Box
		'Imagem auxiliar',   // Título
		'upload_mobile_image_callback',  // Função de callback
		['banners', 'locais', 'page'],                    // Local onde ela vai aparecer
		'normal',                   // Contexto
		'high'                      // Prioridade
	);
}

add_action( 'add_meta_boxes', 'upload_mobile_image_metabox', 1 );

function upload_mobile_image_callback ( $_post ) { ?>

	<?php
			wp_nonce_field( 'upload_mobile_image', 'upload_mobile_image_nonce' ); //Token de segurança

			$uploaded_image = get_post_meta( $_post->ID, "uploaded_mobile_image_file", true );

			if ( $uploaded_image ) {
				$image_info = pathinfo( $_SERVER['DOCUMENT_ROOT'] . parse_url( $uploaded_image )['path'] );
				echo "<img src='".$uploaded_image."' alt='". $image_info['filename'] ."' style='width: 100%; height: auto; object-fit: contain;'><br><a target='_blank' class='button' href='" . $uploaded_image . "'>Ver em tela cheia</a>";
			}
	?>
	<p><strong>Upload de uma nova imagem</strong></p>
	<input type="hidden" name="MAX_FILE_SIZE" value="7000000">
	<input type="file" name="uploaded_mobile_image_file" value="" accept=".png">
	<p style="font-size: 11px;"> Formatos suportados: <strong>.png</strong> &nbsp; Tamanho máximo: <strong>700 KB</strong></p>

<?php }


function  save_upload_mobile_image ( $post_id ) {
	//Verificações de segurança
	if ( ! isset( $_POST['upload_mobile_image_nonce'] ) ) { return; }
	if ( ! wp_verify_nonce( $_POST['upload_mobile_image_nonce'], 'upload_mobile_image' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

	$uploaded_file = $_FILES['uploaded_mobile_image_file'];

	//Existe erro?
	if ( $uploaded_file['error'] ) {
			switch ( $uploaded_file['error'] ) {
					case 1 : wp_die( 'O arquivo enviado excede o tamanho máximo permitido pelo servidor. <br> <a href="javascript:history.back()"><-Voltar</a>' ); break;
					case 2 : wp_die( 'O arquivo excede o limite máximo definido pelo site. <br> <a href="javascript:history.back()"><-Voltar</a>' ); break;
					case 3 : wp_die( 'O upload do arquivo foi feito parcialmente. <br> <a href="javascript:history.back()"><-Voltar</a> ' ); break;
					default : return;
			}
	}

	//Formato do arquivo bate com o tipo suportado?]
	$suported = 0;
	$formats 	= ['image/png', 'image/jpeg', 'image/jpg'];

	foreach ( $formats as $format ) {
			if ( $format == $uploaded_file['type'] ) {
					$suported++;
			}
	}

	if ( !$suported ) { wp_die('Tipo de arquivo não suportado <br> <a href="javascript:history.back()"><-Voltar</a>'); }

	//Tamanho do arquivo bate com o máximo suportado?
	if ( $uploaded_file['size'] > 700000 ) { wp_die( 'O arquivo excede o limite máximo definido pelo site. <br> <a href="javascript:history.back()"><-Voltar</a>' ); }



	//Caminhos da imagem
	$banner_mobile_images_path 	= 'wp-content/uploads/banner_images';
	$target_path 							 	= get_home_path() . $banner_mobile_images_path;
	$target_file_path 					= $target_path . '/' . basename( $uploaded_file['name'] );
	$target_file_url 						= get_home_url() . '/' . $banner_mobile_images_path . '/' . basename( $uploaded_file['name'] );

	//Verificando existência do diretório, e do arquivo de upload.
	if ( ! is_dir( $target_path ) ) {
			mkdir( $target_path );
	} else if ( file_exists( $target_file_path ) ) {
			wp_die( 'Imagem selecionada já existe no site! <br> <a href="javascript:history.back()"><-Voltar</a>' );
	}

	//Salvar os dados, uma vez que todas as condições acima foram satisfeitas.
	if ( move_uploaded_file( $uploaded_file['tmp_name'], $target_file_path ) ) {
			update_post_meta( $post_id, 'uploaded_mobile_image_file', $target_file_url );
	} else {
			wp_die( 'Algo de errado aconteceu <br> <a href="javascript:history.back()"><-Voltar</a>' );
	}

}

add_action( 'save_post', 'save_upload_mobile_image' );


	?>