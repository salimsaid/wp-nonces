<?php
namespace nonces;

/**
 * IsecurityToken
 * An interface for SecurityToken implementations
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
interface ISecurityToken
{
    /**
     * Create a token for a specific action
     *
     * @param string $tokenAction The action being secured.
     *
     * @return string
     */
    function createToken($tokenAction);

    /**
     * Create a token for a url
     *
     * @param string $resourceToProtect The url being secured.
     *
     * @return string
     */
    function createTokenUrl($resourceToProtect);

    /**
     * Verify a token to see if its valid
     *
     * @param string $nonceToVerify The token being verified.
     *
     * @return false|int False if the token is invalid, 1 if the token is valid
     */
    function verifyToken($nonceToVerify);

    /**
     * Display a warning to confirm the action being done on a token
     *
     * @param string $nonceAttribute The token action.
     *
     * @return void
     */
    function issueTokenWarning($nonceAttribute);

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
    function generateSecureFormField($fieldAction='', $fieldName='', $referer=true, $echo=true);


}