<?php
namespace nonces;

/**
 * Blog
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

use nonces\Utilities;
use nonces\WPNonce;
class Blog
{
    protected $nonce;
    protected $utility;

    /**
     * Create a token for a specific action
     *
     * @param WPNonce   $nonce   The nonce object to be used.
     * @param Utilities $utility The utility object to be used.
     *
     * @return string
     */
    public function __construct(WPNonce $nonce, Utilities $utility)
    {
        $this->nonce = $nonce;
        $this->utility = $utility;
    }

    /**
     * Runs and tests token creation
     * This method does the following
     *
     * 1.Create Token
     * 2. Verify Token
     * 3. Issue warning
     * 4. Create secure field
     *
     * @return void
     */
    public function runTokenRoutine()
    {
        echo $this->nonce->createTokenUrl("inpsyde.com?action=publish_postid=2", "token");
        $this->utility->newLine(3);

        $nonce = $this->nonce->createToken("travel-token");
        echo "Created Nonce :: <b>" . $nonce . "</b>";
        $this->utility->newLine(2);


        $nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : null;


        if (! $this->nonce->verifyToken($nonce, 'any-wp-action')) {
            /*
             * Nonce is not valid
             * Ask the user to click on the link to trigger nonce verification
             */
            $this->utility->newLine(2);

            echo ('<strong style="color: red;"><i>Nonce Verification Failed. You are not authorized to see this 🔫</i></strong>');
            $this->utility->newLine(1);
            $nonce2 = $this->nonce->createToken('any-wp-action');

            echo "<a href='Blog.php?_wpnonce=$nonce2'>Click here to Verify NONCE</a>";
            $this->utility->newLine(1);

        } else {
            $this->utility->newLine(2);
            echo " Nonce verified successfully  ";
            echo "<a href='Blog.php'>Go home</a>";
            $this->utility->newLine(2);
        }


        /*
         * Create secure form field
         * To see this form field printed on-screen, inspect the html elements of this page on chrome
         */
        $this->nonce->generateSecureFormField('my-action', 'secure-field');

    }

}

echo "<h2>Welcome to the nonces Blog</h2>";
(new Utilities())->newLine(2);

//display blog
$token = new WPNonce();
$util = new Utilities();

$blog = new Blog($token, $util);
$blog->runTokenRoutine();