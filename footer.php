<?php
/**
 * The template for displaying the footer
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php		  
    $context = Timber::context();    
    Timber::render('page-templates/views/footer.twig', $context);
?>
