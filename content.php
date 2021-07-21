<?php
switch($GV){
	
	default:
	require_once 'ShowProduct.php';
	break;
	
	case 'show_product_detail':
	require_once 'ShowProductDetail.php';
	break;
	
	case 'shopping_cart':
	require_once 'ShowCart.php';
	break;
	
	case 'complete_order':
	require_once 'FormRegister.php';
	break;
	
	case 'show_order':
	require_once 'ShowOrder.php';
	break;

}

?>
