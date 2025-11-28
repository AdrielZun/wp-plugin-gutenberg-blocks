<?php
/**
 * Template del bloque Profesionales
 */

if (!defined('ABSPATH')) {
    exit;
}

// Fields
$name = get_field('professional_name');
$description = get_field('professional_description');
$link = get_field('service_link');
$image = get_field('professional_image');
$layout = get_field('layout_style') ?: 'default';
$cards = get_field('cards') ?: [];

$block_id = 'profesionales-' . ($block['id'] ?? uniqid());
$class_name = 'acf-block-profesionales';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Colors
$color_text = '#483528';
$color_secondary = '#cac4be';

// Grid Classes
// Mobile: Flex Column.
// Desktop: Grid 2 cols.
$container_classes = 'acfb-flex acfb-flex-col md:acfb-grid md:acfb-grid-cols-2 md:acfb-gap-12 acfb-items-start';

// Order classes for Desktop
// Default: Text (Left), Image (Right)
// Inverted: Image (Left), Text (Right)
$text_col_order = ($layout === 'inverted') ? 'md:acfb-col-start-2' : 'md:acfb-col-start-1';
$img_col_order = ($layout === 'inverted') ? 'md:acfb-col-start-1' : 'md:acfb-col-start-2';

?>

<div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?> acfb-py-12 acfb-px-4">
    <div class="<?php echo esc_attr($container_classes); ?>">
        
        <!-- Name -->
        <div class="acfb-order-1 <?php echo $text_col_order; ?> acfb-mb-4 md:acfb-mb-6">
            <h2 class="acfb-text-3xl md:acfb-text-4xl acfb-font-bold acfb-mb-4" style="color: <?php echo $color_text; ?>">
                <?php echo esc_html($name); ?>
            </h2>
        </div>

        <!-- Description -->
        <div class="acfb-order-2 <?php echo $text_col_order; ?> acfb-mb-6 md:acfb-mb-8 acfb-text-lg [&>p]:acfb-mb-4" style="color: <?php echo $color_text; ?>">
            <?php echo $description; ?>
        </div>

        <!-- Image & Cards Container -->
        <div class="acfb-order-3 <?php echo $img_col_order; ?> acfb-mb-8 md:acfb-mb-0 acfb-w-full">
            <?php if ($image): ?>
                <div class="acfb-relative acfb-mb-6">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="acfb-w-full acfb-h-auto acfb-object-cover acfb-rounded-lg acfb-shadow-lg">
                    
                    <!-- Animation Placeholder (Simple pulse bar) -->
                    <div class="acfb-mt-4 acfb-h-1 acfb-w-1/2 acfb-mx-auto acfb-rounded acfb-overflow-hidden">
                        <div class="acfb-h-full acfb-animate-pulse" style="background-color: <?php echo $color_secondary; ?>"></div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Cards -->
             <div class="acfb-grid acfb-grid-cols-1 sm:acfb-grid-cols-2 acfb-gap-4">
                <?php foreach ($cards as $index => $card): 
                    $card_id = $block_id . '-card-' . $index;
                ?>
                    <div class="acfb-bg-white acfb-p-6 acfb-rounded-xl acfb-shadow-md acfb-flex acfb-flex-col acfb-items-center acfb-text-center acfb-border acfb-border-gray-100">
                        <?php if ($card['card_icon']): ?>
                            <img src="<?php echo esc_url($card['card_icon']['url']); ?>" class="acfb-w-16 acfb-h-16 acfb-mb-4 acfb-object-contain">
                        <?php endif; ?>
                        
                        <h3 class="acfb-font-bold acfb-text-xl acfb-mb-3" style="color: <?php echo $color_text; ?>">
                            <?php echo esc_html($card['card_title']); ?>
                        </h3>
                        
                        <div class="acfb-text-sm acfb-mb-4 acfb-flex-grow [&>p]:acfb-mb-2" style="color: <?php echo $color_text; ?>">
                            <?php echo $card['card_description']; ?>
                        </div>

                        <button 
                            class="acfb-mt-auto acfb-px-6 acfb-py-2 acfb-text-white acfb-font-medium acfb-rounded-full acfb-transition hover:acfb-opacity-90 open-lightbox-btn"
                            style="background-color: <?php echo $color_secondary; ?>"
                            data-target="<?php echo esc_attr($card_id); ?>"
                        >
                            <?php echo esc_html($card['card_cta_label']); ?>
                        </button>
                    </div>

                    <!-- Lightbox Modal -->
                    <div id="<?php echo esc_attr($card_id); ?>" class="acfb-fixed acfb-inset-0 acfb-z-[9999] acfb-hidden acfb-flex acfb-items-center acfb-justify-center acfb-bg-black acfb-bg-opacity-80 lightbox-modal" aria-hidden="true">
                        <div class="acfb-bg-white acfb-p-6 md:acfb-p-8 acfb-rounded-xl acfb-max-w-4xl acfb-w-[90%] acfb-max-h-[90vh] acfb-overflow-y-auto acfb-relative acfb-shadow-2xl">
                            <button class="acfb-absolute acfb-top-4 acfb-right-4 acfb-text-gray-400 hover:acfb-text-gray-600 close-lightbox-btn">
                                <svg class="acfb-w-8 acfb-h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                            
                            <h3 class="acfb-text-2xl md:acfb-text-3xl acfb-font-bold acfb-mb-8 acfb-text-center" style="color: <?php echo $color_text; ?>">
                                <?php echo esc_html($card['card_title']); ?>
                            </h3>

                            <div class="acfb-grid acfb-grid-cols-1 sm:acfb-grid-cols-2 md:acfb-grid-cols-3 acfb-gap-6">
                                <?php if ($card['card_courses']): ?>
                                    <?php foreach ($card['card_courses'] as $course): ?>
                                        <?php if ($course['course_image']): ?>
                                            <div class="acfb-group acfb-relative acfb-aspect-[4/3] acfb-rounded-lg acfb-overflow-hidden acfb-shadow-sm hover:acfb-shadow-md acfb-transition">
                                                <img src="<?php echo esc_url($course['course_image']['url']); ?>" class="acfb-object-cover acfb-w-full acfb-h-full">
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="acfb-col-span-full acfb-text-center acfb-text-gray-500">No hay cursos disponibles para mostrar.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Service Link -->
        <div class="acfb-order-5 <?php echo $text_col_order; ?> acfb-mt-8 md:acfb-mt-0">
             <?php if ($link): ?>
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" class="acfb-inline-block acfb-px-10 acfb-py-3 acfb-text-white acfb-font-bold acfb-text-lg acfb-rounded-full acfb-transition hover:acfb-opacity-90 acfb-shadow-md hover:acfb-shadow-lg hover:acfb-translate-y-[-2px] acfb-transform" style="background-color: <?php echo $color_text; ?>">
                    <?php echo esc_html($link['title']); ?>
                </a>
            <?php endif; ?>
        </div>

    </div>
</div>
