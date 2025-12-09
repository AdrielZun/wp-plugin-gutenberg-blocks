<?php
/**
 * Template de renderizado para Hero Servicio Destacado
 * 
 * @package wp-plugin-gutenberg-blocks
 */

// Valores por defecto
$defaults = array(
	'titulo_principal' => 'DERMACOSMETO',
	'subtitulo_autor'  => 'X Stefany Varas',
	'descripcion_corta' => 'Cosmetología y dermatología',
	'cta_texto'        => 'EVALUACIÓN FACIAL POR $10.990',
	'cta_link'         => '#',
	'video_file'       => '',
	'video_poster'     => ''
);

// Mezclar atributos con valores por defecto
$atts = array_merge( $defaults, (array) $attributes );

// Extraer variables
extract( $atts );

// Obtener la URL del poster
$poster_url = '';
if ( is_array( $video_poster ) && ! empty( $video_poster['url'] ) ) {
	$poster_url = $video_poster['url'];
} elseif ( is_string( $video_poster ) && ! empty( $video_poster ) ) {
	$poster_url = $video_poster;
}

// Sanitizar URLs
$video_url = esc_url( $video_file );
$cta_link  = esc_url( $cta_link );
?>

<article class="wp-block-wp-plugin-gutenberg-blocks-example-service-hero service-hero">
	<div class="service-hero__wrapper">
		
		<!-- Video Column -->
		<div class="service-hero__video-column">
			<?php if ( $video_url ) : ?>
				<video 
					class="service-hero__video"
					autoplay
					muted
					loop
					playsinline
					<?php echo $poster_url ? 'poster="' . esc_attr( $poster_url ) . '"' : ''; ?>
				>
					<source src="<?php echo $video_url; ?>" type="video/mp4">
					Tu navegador no soporta la etiqueta de video.
				</video>
			<?php else : ?>
				<div style="width: 100%; height: 100%; background: #ccc; display: flex; align-items: center; justify-content: center; color: #999; font-size: 14px;">
					Sin video
				</div>
			<?php endif; ?>
		</div>

		<!-- Content Column -->
		<div class="service-hero__content">
			<h2 class="service-hero__title">
				<?php echo esc_html( $titulo_principal ); ?>
			</h2>

			<?php if ( $subtitulo_autor ) : ?>
				<span class="service-hero__author">
					<?php echo esc_html( $subtitulo_autor ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $descripcion_corta ) : ?>
				<p class="service-hero__description">
					<?php echo wp_kses_post( nl2br( $descripcion_corta ) ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $cta_texto ) : ?>
				<a href="<?php echo $cta_link; ?>" class="service-hero__cta">
					<?php echo esc_html( $cta_texto ); ?>
					<span class="service-hero__cta-arrow">›</span>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<!-- Schema.org Markup -->
	<?php if ( $titulo_principal || $descripcion_corta ) : ?>
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Service",
			"name": "<?php echo esc_attr( $titulo_principal ); ?>",
			"description": "<?php echo esc_attr( $descripcion_corta ); ?>",
			"provider": {
				"@type": "Organization",
				"name": "<?php echo esc_attr( $subtitulo_autor ); ?>"
			},
			"offers": {
				"@type": "Offer",
				"price": "10990",
				"priceCurrency": "CLP",
				"url": "<?php echo $cta_link; ?>"
			},
			"image": "<?php echo esc_attr( $poster_url ); ?>"
		}
		</script>
	<?php endif; ?>
</article>
