<?php

/**
 *
 * @link              https://criacaocriativa.com
 * @since             1.0.0
 * @package           aplicar_desconto_no_pagamento 
 *
 * @wordpress-plugin
 * Plugin Name:       Aplicar Desconto no Pagamento for WooCommerce
 * Plugin URI:        https://plugins.criacaocriativa.com
 * Description:       No WooCommerce, aplicar descontos no pagamento é uma estratégia eficaz para incentivar os clientes a finalizarem suas compras, oferecendo-lhes um desconto específico ao utilizar determinado método de pagamento.
 * Version:           1.0.0
 * Author:            carlosramosweb
 * Author URI:        https://criacaocriativa.com
 * Donate link:       https://donate.criacaocriativa.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aplicar-desconto-no-pagamento
 * Domain Path:       /languages
 */

// Adicione um gancho para aplicar o desconto no pagamento
add_action('woocommerce_cart_calculate_fees', 'aplicar_desconto_no_pagamento');

function aplicar_desconto_no_pagamento() {
    // Verifique se o cupom está aplicado
    if (WC()->cart->has_discount('seu_codigo_de_desconto')) {
        // Calcule o valor do desconto
        $desconto = WC()->cart->get_subtotal() * 0.1; // 10% de desconto
        
        // Adicione o desconto ao carrinho
        WC()->cart->add_fee('Desconto de Pagamento', -$desconto);
    }
}
