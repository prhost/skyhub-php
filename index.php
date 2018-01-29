<?php
/**
 * BSeller Platform | B2W - Companhia Digital
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @category  ${MAGENTO_MODULE_NAMESPACE}
 * @package   ${MAGENTO_MODULE_NAMESPACE}_${MAGENTO_MODULE}
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br)
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 */

require_once 'vendor/autoload.php';

$baseUri  = 'https://api.skyhub.com.br';
$email    = 'valdir.calixto@e-smart.com.br';
$apiKey   = 'wxVMVTkf_csx17LioTjY';
$apiToken = 'bZa6Ml0zgS';

/** @var \SkyHub\Api $api */
$api = new SkyHub\Api($baseUri, $email, $apiKey, $apiToken);

$api->productAttribute()->create('color', 'Color', ['Blue', 'White', 'Green', 'Yellow']);
$api->productAttribute()->update('color', 'Color', ['Blue', 'White', 'Green', 'Yellow', 'Orange']);
