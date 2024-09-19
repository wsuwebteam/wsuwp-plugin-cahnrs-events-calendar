<?php
/**
 * View: List View - Single Event Title
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 * @var string $heading_tag The heading tag (e.g., h1, h2, h3, etc.) passed from shortcode.
 *
 * @see tribe_get_event() For the format of the event object.
 */

// Default heading tag
$heading_tag = isset($heading_tag) ? $heading_tag : 'h3';
?>

<<?php echo esc_attr($heading_tag); ?> class="tribe-events-calendar-list__event-title tribe-common-h6 tribe-common-h4--min-medium">
    <a
        href="<?php echo esc_url( $event->permalink ); ?>"
        title="<?php echo esc_attr( $event->title ); ?>"
        rel="bookmark"
        class="tribe-events-calendar-list__event-title-link tribe-common-anchor-thin"
    >
        <?php
        // phpcs:ignore
        echo $event->title;
        ?>
    </a>
</<?php echo esc_attr($heading_tag); ?>>
