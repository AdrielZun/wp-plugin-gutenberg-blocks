<?php
/**
 * ACF Fields para Hero Servicio Destacado
 * 
 * @package wp-plugin-gutenberg-blocks
 */

if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_service_hero',
			'title'                 => 'Hero Servicio Destacado',
			'fields'                => array(
				array(
					'key'           => 'field_video_file',
					'label'         => 'Video Demostrativo',
					'name'          => 'video_file',
					'type'          => 'file',
					'return_format' => 'url',
					'library'       => 'all',
					'mime_types'    => 'mp4',
					'instructions'  => 'Sube el archivo MP4 que se reproducirá en la columna izquierda',
				),
				array(
					'key'           => 'field_video_poster',
					'label'         => 'Imagen de Carga (Poster)',
					'name'          => 'video_poster',
					'type'          => 'image',
					'return_format' => 'array',
					'instructions'  => 'Imagen estática que se mostrará antes de que cargue el video',
				),
				array(
					'key'   => 'field_titulo_principal',
					'label' => 'Título Principal',
					'name'  => 'titulo_principal',
					'type'  => 'text',
					'default_value' => 'DERMACOSMETO',
					'instructions' => 'Ej: DERMACOSMETO',
				),
				array(
					'key'   => 'field_subtitulo_autor',
					'label' => 'Subtítulo / Autor',
					'name'  => 'subtitulo_autor',
					'type'  => 'text',
					'default_value' => 'X Stefany Varas',
					'instructions' => 'Ej: X Stefany Varas',
				),
				array(
					'key'   => 'field_descripcion_corta',
					'label' => 'Descripción Corta',
					'name'  => 'descripcion_corta',
					'type'  => 'textarea',
					'rows'  => 4,
					'default_value' => 'Cosmetología y dermatología',
					'instructions' => 'Texto descriptivo del servicio',
				),
				array(
					'key'   => 'field_cta_texto',
					'label' => 'Texto del Botón CTA',
					'name'  => 'cta_texto',
					'type'  => 'text',
					'default_value' => 'EVALUACIÓN FACIAL POR $10.990',
					'instructions' => 'Ej: EVALUACIÓN FACIAL POR $10.990',
				),
				array(
					'key'   => 'field_cta_link',
					'label' => 'Enlace CTA',
					'name'  => 'cta_link',
					'type'  => 'url',
					'default_value' => '#',
					'instructions' => 'URL de destino para la reserva o compra',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'wp-plugin-gutenberg-blocks/example-service-hero',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		)
	);
}
