<?php

// require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
/**
*  
*/
class PDF
{
	
	public static function generaPDF($carrito,$total){
		$content = '<html>';
		$content .= '<head>';
		$content .= '<style>';
		$content .= '</style>';
		$content .= '</head><body>';
		$content .= '<h1>Factura de compra</h1>';
		$content .= '<hr>';
		$content .= '<h5>Producto			Cantidad    				Subtotal</h5>';
		foreach ($carrito as $shop => $value) {
			$content .= "<p>$value[nombre_producto]         $value[cant] 			$value[subtotal]</p>";
			
		}
		$content .= 'Total $'.$total;
		$content .= '</body></html>';

		echo $content; exit;
	}
}