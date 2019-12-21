   ![](https://i.ibb.co/bKHWjZn/wp-clean-nonces-logo.png)  
   

A clean Object Oriented implementation of the wordpress nonce library.  
   
## Table of Contents

---
* #### Introduction
+ #### Dependencies
- #### Installation
- #### Running
- #### Unit Testing
- #### Concepts Covered
- #### Final Words from the author
   
   
## Introduction
---
Wordpress provides a means for securing requests against CSRF attacks. The wordpress documentation covers  
how to use the nonces functionality.  
  
This library aims at implementing the core Wordpress functionality in an Object Oriented way aiming to make  
the functionality extensible, testable and easy to maintain. That's what this library is all about.  
  
## Dependencies
---
This library depends on [PHPUnit Version 8 upwards](https://phpunit.de/announcements/phpunit-8.html)  
You also need to have the latest version of wordpress. At the time of writing this library it is compatible  
with wordpress version 5.3. This library should be backwards compatible with older versions of Wordpress.  
  
**Note::** Tests can be run without a wordpress installation.  
  
## Installation
---
To install this library

1. Download the library from bitbucket.
2. `cd` into the library root.
3. Download the latest version of wordpress and copy all the contents of the downloaded wordpress into the library's wordpress directory. 
4. Make sure the wordpress folder is on the same level as the composer.json file
5. Run `composer install`
6. After composer finishes installing dependencies, you will have a vendor directory inside the library root folder
  
## Running
---
To run this library

1. `cd` into the library root folder.
2. Start PHP built in Server, You must have`PHP CLI` by typing `php -S localhost:8000` on terminal
3. Navigate to the [Blog Page](http://localhost:8000/src/Blog.php) by entering the following url to your browser http://localhost:8000/src/Blog.php
    * ### You should see below output  
      ![](https://i.ibb.co/2St3Dw5/nonces-library-output-displaying.png)
4. Output explanation
    * ## Creating a Nonce for a url
	To create a nonce to secure a url, call the **`createTokenUrl()`**  
	The first line on the Blog.php page shows a link secured with a nonce i.e. `inpsyde.com?action=publish_postid%3D2&token=0b0fe9c607`
    * ## Creating a Nonce
	To create a simple nonce that is not attached to any url or form; the **`createToken()`** method is used. Line 2 of Blog.php displays a created nonce.
    * ## Verifying a nonce 
	Line 3 demostrates verifying a token/nonce by calling **`verifyToken()`** method, initially nonce verification fails and a red message is displayed  
	Upon clicking the Verify link under the red message, the nonce will be verified, and a success message will be displayed.
    * ## Generating secure forms 
	Forms can be secured by passing a nonce along form submission  
	The Blog.php page creates secure form field, it is a hidden form that's the reason you cannot see it, to see the form `inspect` the Blog.php page  
	On chrome right click on the page and select inspect, head over to the elements tab, under the body html section you will see a hidden form with  
	an input named `secure-field` and a value with an alphanumeric value(thats a `nonce embedded` in the form)  
	You can generate secure forms by calling the **`generateSecureFormField()`** method of the WPNonce class  
	  ### Secure form field generated and embedded with a nonce  
	  ![](https://i.ibb.co/JkYgNkw/edited-secue-form-field-nonces.png)
  
## Unit Testing
---
The library comes with a unit testing suite. PHPUnit is used for unit testing.  
To run tests

1. `cd` in to the library root folder
2. `cd` into the `tests` folder
3. Make sure you have phpunit is installed globally or has been exported to your $PATH
4. Run `phpunit TestWpNonce`
5. if everything goes well, you will get a beautiful pass message from phpunit
**Note** Currently only createTokenUrl() is covered by tests.
---

# Concepts Covered  
  
* Dependency Injection
* Documentation
* Auto Loading
* Unint testing
* Mocking 
* Interfaces
* OOP 
* Licensing 
* Namespaces
* Git
* Composer
  
  
# Final Words from the author
I've written this clean and simple library to demonstrate that i can brinng value to inpsyde team. Please note that there are improvements that could be made on this library, i.e increasing code coverage(testing coverage)
I have presented a simple,clean,minimal,testable and ready to ship code library. There is always room for improvement, and i hope you will find this library useful enough to demonstrate my skills.
  
  
 I am looking forward to hear from you ,and i am really excited to join your Team. Hopping to hear from you soon  
 Salim Said <saliimsaid@gmail.com>
