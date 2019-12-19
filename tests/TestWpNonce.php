<?php
namespace nonces;

/**
 * TestWpNonce
 * Test suite for wp-clean-nonces library
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

if(file_exists('../vendor/autoload.php'))
require_once '../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
class TestWpNonce extends TestCase
{
    /**
     * This test will create a nonce for a url and verify if a correct
     * url is returned
     *
     * The method asserts for the result returned by createTokenUrl()
     * against a predefined expected return value containing a nonce
     * protected string url
     *
     * @return void
     */
    public function testCreateTokenUrl()
    {
        $wpNonce = $this->getMockBuilder(WPNonce::class)
            ->getMock();

        $wpNonce->expects($this->once())
            ->method('createTokenUrl')
            ->with($this->equalTo("inpsyde.com?action=publish_postid=2"))
            ->will($this->returnValue('inpsyde.com?action=publish_postid=2&token=297d58f6ae'));

        $this->assertEquals(
            "inpsyde.com?action=publish_postid=2&token=297d58f6ae",
            $wpNonce->createTokenUrl("inpsyde.com?action=publish_postid=2")
        );
    }
}