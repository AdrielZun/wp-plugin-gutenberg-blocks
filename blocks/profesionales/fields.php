<?php
/**
 * ACF Fields para Profesionales Block
 */

if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key' => 'group_profesionales',
        'title' => 'Profesionales Block Fields',
        'fields' => [
            [
                'key' => 'field_profesionales_name',
                'label' => 'Nombre del Profesional',
                'name' => 'professional_name',
                'type' => 'text',
                'required' => 1,
                'placeholder' => 'Nombre completo',
            ],
            [
                'key' => 'field_profesionales_description',
                'label' => 'Descripción / Experiencia',
                'name' => 'professional_description',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'required' => 1,
            ],
            [
                'key' => 'field_profesionales_link',
                'label' => 'Enlace a Servicio',
                'name' => 'service_link',
                'type' => 'link',
                'required' => 1,
            ],
            [
                'key' => 'field_profesionales_image',
                'label' => 'Imagen del Profesional',
                'name' => 'professional_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'required' => 1,
            ],
            [
                'key' => 'field_profesionales_style',
                'label' => 'Estilo de Diseño (Desktop)',
                'name' => 'layout_style',
                'type' => 'select',
                'choices' => [
                    'default' => 'Texto Izquierda / Imagen Derecha',
                    'inverted' => 'Imagen Izquierda / Texto Derecha',
                ],
                'default_value' => 'default',
                'ui' => 1,
            ],
            [
                'key' => 'field_profesionales_cards',
                'label' => 'Fichas / Cards',
                'name' => 'cards',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Agregar Ficha',
                'sub_fields' => [
                    [
                        'key' => 'field_profesionales_card_icon',
                        'label' => 'Icono',
                        'name' => 'card_icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ],
                    [
                        'key' => 'field_profesionales_card_title',
                        'label' => 'Título',
                        'name' => 'card_title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_profesionales_card_desc',
                        'label' => 'Descripción',
                        'name' => 'card_description',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ],
                    [
                        'key' => 'field_profesionales_card_cta',
                        'label' => 'Texto Botón (Ver Cursos)',
                        'name' => 'card_cta_label',
                        'type' => 'text',
                        'default_value' => 'Ver cursos',
                    ],
                    [
                        'key' => 'field_profesionales_card_courses',
                        'label' => 'Cursos / Certificados',
                        'name' => 'card_courses',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Agregar Curso',
                        'sub_fields' => [
                            [
                                'key' => 'field_profesionales_course_image',
                                'label' => 'Imagen del Curso',
                                'name' => 'course_image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'thumbnail',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/profesionales',
                ],
            ],
        ],
    ]);
}
