<?php
namespace nonces;

/**
 * WPNonce
 * Nonce based Token implementation based on the ISecurityToken interface
 *
 * Wp-clean-nonces is A clean OOP implementation of the Wordpress Nonce library.
 * Copyright (C) 2019  Salim Said.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * For the complete terms of the GNU General Public License, please see this URL:
 * http://www.gnu.org/licenses/gpl-2.0.html

 * @category  NA
 * @package   NA
 * @author    Salim Said <saliimsaid@gmail.com>
 * @copyright 2019 Salim Said
 * @license   GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link      ****
 */

if(file_exists('../wordpress/wp-load.php'))
    require_once '../wordpress/wp-load.php';
if(file_exists('../vendor/autoload.php'))
require_once '../vendor/autoload.php';

use nonces\ISecurityToken;
class WPNonce implements ISecurityToken
{
    /**
     * Create a token for a specific action
     *
     * @param string $tokenAction The action being secured.
     *
     * @return string
     */
    function createToken($tokenAction)
    {
        $nonce = wp_create_nonce($tokenAction);
        return $nonce;
    }

    /**
     * Create a token for a url
     *
     * @param string          $urlToProtect The url being secured.
     * @param string|optional $name         The name to be given to the nonce
     *
     * @return string
     */
    function createTokenUrl($urlToProtect,$name='')
    {
        $protected_url = wp_nonce_url($urlToProtect, 'trash-post_'. 1, $name);
        return $protected_url;
    }

    /**
     * Verify a token to see if its valid
     *
     * @param string                                    $nonceToVerify The token being verified.
     * @param string|optional The action to be verified $action        The action to be verified
     *
     * @return false|int False if the token is invalid, 1 if the token is valid
     */
    function verifyToken($nonceToVerify, $action=null)
    {
        return wp_verify_nonce($nonceToVerify, $action);
    }

    /**
     * Display a warning to confirm the action being done on a token
     *
     * @param string $nonceAttribute The token action.
     *
     * @return void
     */
    function issueTokenWarning($nonceAttribute)
    {
        wp_nonce_ays($nonceAttribute);
    }

    /**
     * Generate a secure form field
     *
     * @param string           $fieldAction The action being secured.
     * @param string|optional  $fieldName   The name for the field
     * @param boolean|optional $referer     Whether to display referer or not
     * @param boolean|optional $echo        Whether to print the generated form or not
     *
     * @return false|int False if the token is invalid, 1 if the token is valid
     */
    function generateSecureFormField($fieldAction='', $fieldName='', $referer=true, $echo=true)
    {
        $secureField =  wp_nonce_field($fieldAction, $fieldName, $referer, $echo);
        return $secureField;
    }
}