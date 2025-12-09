( function() {
	const { registerBlockType } = wp.blocks;
	const { InspectorControls, useBlockProps, MediaUpload } = wp.blockEditor;
	const { PanelBody, TextControl, TextareaControl, Button } = wp.components;
	const el = wp.element.createElement;

	registerBlockType( 'wp-plugin-gutenberg-blocks/example-service-hero', {
		edit: function( { attributes, setAttributes } ) {
			const {
				video_file,
				video_poster,
				titulo_principal,
				subtitulo_autor,
				descripcion_corta,
				cta_texto,
				cta_link
			} = attributes;

			const blockProps = useBlockProps( {
				className: 'service-hero'
			} );

			return el(
				wp.element.Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: 'Video', initialOpen: true },
						el(
							'div',
							{ style: { marginBottom: '16px' } },
							el( 'label', { style: { display: 'block', marginBottom: '8px', fontWeight: 500 } }, 'Archivo de Video' ),
							video_file && el(
								'div',
								{ style: { background: '#f5f5f5', padding: '12px', borderRadius: '4px', marginBottom: '8px', fontSize: '12px', wordBreak: 'break-all' } },
								video_file,
								el(
									Button,
									{ isSmall: true, isDestructive: true, onClick: () => setAttributes( { video_file: '' } ), style: { marginTop: '8px' } },
									'Remover Video'
								)
							),
							el(
								MediaUpload,
								{
									onSelect: ( media ) => setAttributes( { video_file: media.url } ),
									allowedTypes: [ 'video' ],
									value: video_file,
									render: ( { open } ) => el( Button, { onClick: open, isPrimary: true, isSmall: true }, 'Seleccionar Video MP4' )
								}
							)
						),
						el(
							'div',
							null,
							el( 'label', { style: { display: 'block', marginBottom: '8px', fontWeight: 5 } }, 'Imagen de Carga (Poster)' ),
							video_poster && video_poster.url && el(
								'div',
								{ style: { marginBottom: '8px' } },
								el( 'img', { src: video_poster.url, style: { maxWidth: '100%', height: 'auto', borderRadius: '4px', marginBottom: '8px' } } ),
								el( Button, { isSmall: true, isDestructive: true, onClick: () => setAttributes( { video_poster: null } ) }, 'Remover Poster' )
							),
							el(
								MediaUpload,
								{
									onSelect: ( media ) => setAttributes( { video_poster: media } ),
									allowedTypes: [ 'image' ],
									value: video_poster ? video_poster.id : '',
									render: ( { open } ) => el( Button, { onClick: open, isPrimary: true, isSmall: true }, 'Seleccionar Imagen' )
								}
							)
						)
					),
					el(
						PanelBody,
						{ title: 'Contenido Principal' },
						el( TextControl, { label: 'Título Principal', value: titulo_principal, onChange: ( value ) => setAttributes( { titulo_principal: value } ), placeholder: 'DERMACOSMETO' } ),
						el( TextControl, { label: 'Subtítulo / Autor', value: subtitulo_autor, onChange: ( value ) => setAttributes( { subtitulo_autor: value } ), placeholder: 'X Stefany Varas' } ),
						el( TextareaControl, { label: 'Descripción Corta', value: descripcion_corta, onChange: ( value ) => setAttributes( { descripcion_corta: value } ), placeholder: 'Cosmetología y dermatología...', rows: 4 } )
					),
					el(
						PanelBody,
						{ title: 'Call to Action' },
						el( TextControl, { label: 'Texto del Botón', value: cta_texto, onChange: ( value ) => setAttributes( { cta_texto: value } ), placeholder: 'EVALUACIÓN FACIAL POR $10.990' } ),
						el( TextControl, { label: 'Enlace CTA', value: cta_link, onChange: ( value ) => setAttributes( { cta_link: value } ), placeholder: '#', type: 'url' } )
					)
				),
				el(
					'article',
					blockProps,
					el(
						'div',
						{ className: 'service-hero__wrapper' },
						el(
							'div',
							{ className: 'service-hero__video-column' },
							video_file ? el( 'video', { className: 'service-hero__video', autoPlay: true, muted: true, loop: true, playsInline: true, poster: video_poster ? video_poster.url : '', style: { width: '100%', height: '100%', objectFit: 'cover' } },
								el( 'source', { src: video_file, type: 'video/mp4' } )
							) : el(
								'div',
								{ className: 'service-hero__video-placeholder' },
								el(
									MediaUpload,
									{
										onSelect: ( media ) => setAttributes( { video_file: media.url } ),
										allowedTypes: [ 'video' ],
										value: video_file,
										render: ( { open } ) => el( Button, { onClick: open, isPrimary: true }, 'Sube un Video' )
									}
								)
							)
						),
						el(
							'div',
							{ className: 'service-hero__content' },
							el( 'h2', { className: 'service-hero__title' }, titulo_principal || 'DERMACOSMETO' ),
							el( 'span', { className: 'service-hero__author' }, subtitulo_autor || 'X Stefany Varas' ),
							el( 'p', { className: 'service-hero__description' }, descripcion_corta || 'Cosmetología y dermatología...' ),
							el( 'a', { href: cta_link, className: 'service-hero__cta', onClick: ( e ) => e.preventDefault() },
								cta_texto || 'EVALUACIÓN FACIAL POR $10.990',
								el( 'span', { className: 'service-hero__cta-arrow' }, '›' )
							)
						)
					)
				)
			);
		},

		save: function() {
			return null;
		}
	} );
} )();

