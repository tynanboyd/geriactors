<?php

function customerHasBoughtProduct($productID) {

	$boughtProduct = false;
	if ( wc_customer_bought_product( wp_get_current_user()->user_email, get_current_user_id(), $productID) ) {
		$boughtProduct = true;
	}

	return $boughtProduct;
}

function getCurrentCustomerOrdersContainingProduct($productID) {
	$customer = wp_get_current_user();

	$customerOrders = get_posts([
	'numberposts' => -1,
	'meta_key'    => '_customer_user',
	'orderby' => 'date',
	'order' => 'DESC',
	'meta_value'  => get_current_user_id(),
	'post_type'   => 'shop_order',
	'post_status' => array_keys( wc_get_order_statuses() ),
	]);

	$productsAndDates = [];

	foreach ( $customerOrders as $customerOrder ) {
		$order = wc_get_order( $customerOrder );
		$items = $order->get_items();

		foreach ($items as $item) {
			// var_dump($item);
			// var_dump($item->get_product_id());
			if ($item->get_product_id() === $productID ) {
				$productsAndDates[] = $order->get_date_completed();
			}
		}
	}

	return $productsAndDates;
}
