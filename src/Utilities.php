<?php
namespace nonces;

/**
 * Utilities
 * Utility/helper functions for use accross this library
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

class Utilities
{
    /**
     * Prints a new line n number of times where n equals
     * the value passes as $count. i.e. if $count = 3 this
     * method will print 3 new lines
     *
     * @param int $count The number of times to print the newline.
     *
     * @return boolean
     */
    function newLine( $count)
    {
        for ($i = 0; $i < $count; $i++) {
            echo "<BR>";
        }

        return true;
    }
}