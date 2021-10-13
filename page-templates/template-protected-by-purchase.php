<?php

	/*
	Template Name: Protected by Purchase
	** Checks to see if the active user has purchased a specific product
	** Checks if the most recent purchase of that product
	*/

	get_header();

	$context = Timber::context();
	$context['post'] = new TimberPost();

	$context['can_view_content'] = false;
	$productToPurchaseID = get_field('product_to_purchase');

	// The first entry in the array is the latest purchase of the matching product ID.
	$dateTime = getCurrentCustomerOrdersContainingProduct($productToPurchaseID)[0];
	$myDateTime = new DateTime($dateTime);
	$dateOfLatestPurchase = date_create($myDateTime->format('Y-m-d'));
	$rentalPeriod = strval(get_field('rental_period'));
	$expiresOn = date_add($dateOfLatestPurchase, date_interval_create_from_date_string("$rentalPeriod days"))->format('Y-m-d');
	$today = date('Y-m-d');

	if ( customerHasBoughtProduct($productToPurchaseID) && $today < $expiresOn) {
		$context['can_view_content'] = true;
	}

	if ( $today > $expiresOn ) {
		$context['expired'] = true;
	}

	if (get_current_user_id() === 1) {
		echo "debug:";
		var_dump($today);
		var_dump($expiresOn);
	}

	if (! is_user_logged_in()) {
		$context['logged_in'] = false;
	} else {
		$context['logged_in'] = true;
	}

	Timber::render( 'template-protected-by-purchase.twig', $context );

	get_footer();
