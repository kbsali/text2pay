<?php
/**
 * --------------------------------------------------------------------------
 *
 * File:         api.php
 *
 * Purpose:      Holds all Text2Pay API wrapping functionality, to be easily
 *               accessible by PHP developers connecting to Text2Pay services
 *
 * Last
 *   Changes:    Rev $Rev: 26 $
 *               on $Date: 2013-07-16 13:05:30 +1000 (Tue, 16 Jul 2013) $
 *               by $Author: bruno.braga@gmail.com $
 *
 * --------------------------------------------------------------------------
 *
 * Copyright 2012 Text2Pay, Inc. http://www.text2pay.com/
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, softwareAPI
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 *
 * --------------------------------------------------------------------------
 *
 * Documentation:
 * --------------
 *
 * Comprehensive documentation about the Text2Pay API is available at:
 *
 * {@link http://merchants.text2pay.com/developers/api_documentation}
 * (you will need proper merchant credentials to access contents here)
 *
 * The documentation provided here merely attempts to facilitate development
 * process. If you are not sure of the functionalities here described, always
 * refer to official documentation.
 *
 * Feel free to contact Text2Pay if you have any trouble:
 * {@link http://www.text2pay.com/contact}
 *
 * --------------------------------------------------------------------------
 *
 * Example:
 * --------
 *
 *
 * <code>
 *
 * <?php
 *
 * 	require_once ('/path/to/text2pay/api.php');
 *
 * 	// your credentials here
 * 	$apiKey = '';
 * 	$pubId = '';
 * 	$username = '';
 * 	$password = '';
 *
 * 	try {
 *
 *
 * 	    // Create a Text2Pay API connection
 * 	    $cn = new Text2PayApi_Connection($apiKey, $pubId, $username, $password);
 *
 * 	    // Get List of Carriers
 * 	    $brandId = 1;
 * 	    $countryCode = 'AU';
 * 	    $o = new Text2PayApi_getCarriers_Request($cn, $brandId, $countryCode);
 * 	    $carriers = $o->execute();
 *
 * 	    // print results
 * 	    echo var_dump($carriers->getCarriers());
 *
 * 	}
 * 	catch (Text2PayApiException $taex) {
 * 	    // This will hold most exceptions thrown by the API wrapper, usually
 * 	    // related to user credentials or internet connectivity issues.
 * 	    echo '(' . $taex->getCode() . ') '. $taex->getMessage() . "\n";
 * 	}
 * 	catch (Text2PayException $tex) {
 * 	    // This is usually errors caused by developers, passing wrong
 * 		// info to the API wrapper.
 * 	    echo '(' . $tex->getCode() . ') '. $tex->getMessage() . "\n";
 * 	}
 * 	catch (Exception $ex) {
 * 	    // Unknown errors should not happen, unless there are PHP issues
 *      // (invalid libraries, etc)
 * 	    // Any troubleshooting here needs to be carefully analysed,
 * 	    // and a support ticket may be requested to Text2Pay.
 * 	    echo 'Should never happen! ' . $ex . "\n";
 * 	}
 * ?>
 *
 * </code>
 *
 * --------------------------------------------------------------------------
 */


//
// Helper stuff
//
foreach (glob(dirname(__FILE__) . '/helpers/*.php') as $f) include $f;

//
// All API Actions
//
foreach (glob(dirname(__FILE__) . '/actions/*.php') as $f) include $f;

//
// Create PHP version info
//
if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);
    /**
     * Defines the running PHP version.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.2
     *
     */
    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}


/**
 * Holds the version of this API SDK.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.1
 *
 */
define('TEX2PAY_API_SDK_VERSION', '0.9');

?>
