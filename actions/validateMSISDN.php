<?php
/**
 * **************************************************************************
 *
 * File:         validateMSISDN.php
 *
 * Purpose:      Holds the functionality for [validateMSISDN] Text2Pay API action.
 *               Refer to detailed documentation below, or on Text2Pay website.
 *
 * Last
 *   Changes:    Rev $Rev: 7 $
 *               on $Date: 2012-11-13 13:31:31 +1000 (Tue, 13 Nov 2012) $
 *               by $Author: bruno.braga@gmail.com $
 *
 * **************************************************************************
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
 * **************************************************************************
 */


/**
 * Represents the action <b>validateMSISDN</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
final class Text2PayApi_validateMSISDN_Request
extends Text2PayApi_RequestBase {

    /**
     * Validates a MSISDN (consumers phone number in E.164 format) to ensure
     * that the number is a valid MSISDN registered by the networks/carriers.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param string $countryCode International ISO-3166 country code
     *
     * @param int $msisdn Mobile consumers phone number in E.164
     *
     * @throws Text2PayException if the connection is not a valid connection
     * (thrown by the base class {@link Text2PayApi_RequestBase}, or if
     * required arguments are not valid (thrown by
     * {@link Text2PayApi_RequestBase::setArgument()} method).
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::setArgument()
     * @see Text2PayApi_initiateTransaction_Request
     * @see Text2PayApi_getServices_Request
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($apiConnection,
    $countryCode,
    $msisdn) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',   		 'validateMSISDN');
        $this->setArgument('country_code',   $countryCode    );
        $this->setArgument('msisdn',         $msisdn         );
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_validateMSISDN_Response object
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::execute()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public function execute() {

        // Execute all from base class
        $response = parent::execute();

        // Map the result in a proper response object
        return new Text2PayApi_validateMSISDN_Response($response);
    }
}




/**
 * Represents the response for the action <b>validateMSISDN</b> executed
 * in Text2Pay API, with {@link Text2PayApi_validateMSISDN_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_validateMSISDN_Response::getMsisdn()}
 *  <li>{@link Text2PayApi_validateMSISDN_Response::getCountryCode()}
 *  <li>{@link Text2PayApi_validateMSISDN_Response::getNetworkCode()}
 *  <li>{@link Text2PayApi_validateMSISDN_Response::getNetworkTitle()}
 *  <li>{@link Text2PayApi_validateMSISDN_Response::getNetworkTierLevel()}
 * </ul>
 *
 * @see Text2PayApi_validateMSISDN_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_validateMSISDN_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_validateMSISDN_Response::getMsisdn()}
     *
     * @var string
     *
     * @see Text2PayApi_validateMSISDN_Response
     * @see Text2PayApi_validateMSISDN_Response::getMsisdn()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $msisdn;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_validateMSISDN_Response::getCountryCode()}
     *
     * @var string
     *
     * @see Text2PayApi_validateMSISDN_Response
     * @see Text2PayApi_validateMSISDN_Response::getCountryCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $countryCode;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_validateMSISDN_Response::getNetworkId()}
     *
     * @var string
     *
     * @see Text2PayApi_validateMSISDN_Response
     * @see Text2PayApi_validateMSISDN_Response::getNetworkId()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    private $networkId;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_validateMSISDN_Response::getNetworkCode()}
     *
     * @var string
     *
     * @see Text2PayApi_validateMSISDN_Response
     * @see Text2PayApi_validateMSISDN_Response::getNetworkCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $networkCode;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_validateMSISDN_Response::networkTitle()}
     *
     * @var string
     *
     * @see Text2PayApi_validateMSISDN_Response
     * @see Text2PayApi_validateMSISDN_Response::networkTitle()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $networkTitle;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_validateMSISDN_Response::getNetworkTierLevel()}
     *
     * @var int
     *
     * @see Text2PayApi_validateMSISDN_Response
     * @see Text2PayApi_validateMSISDN_Response::getNetworkTierLevel()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $networkTierLevel;

    /**
     * Creates a new instance of this response object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $raw The raw value from the API call response.
     * 
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($raw) {
        parent::__construct($raw);

        // Map all response data into this object
        $this->msisdn           = $this->response['msisdn'];
        $this->countryCode      = $this->response['country_code'];
        $this->networkId        = $this->response['network_id'];
        $this->networkCode      = $this->response['network_code'];
        $this->networkTitle     = $this->response['network_title'];
        $this->networkTierLevel = $this->response['network_tierlevel'];
    }

    /**
     * Returns the value of msisdn, retrieved by the API response as
     * [msisdn] XML node.
     *
     * @return string value of msisdn
     *
     * @see Text2PayApi_validateMSISDN_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getMsisdn()           {
        return $this->msisdn;
    }
    /**
     * Returns the value of countryCode, retrieved by the API response as
     * [country_code] XML node.
     *
     * @return string value of countryCode
     *
     * @see Text2PayApi_validateMSISDN_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getCountryCode()      {
        return $this->countryCode;
    }
    /**
     * Returns the value of networkCode, retrieved by the API response as
     * [network_code] XML node.
     *
     * @return string value of networkCode
     *
     * @see Text2PayApi_validateMSISDN_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getNetworkId()       {
        return $this->networkId;
    }
    /**
     * Returns the value of networkCode, retrieved by the API response as
     * [network_code] XML node.
     *
     * @return string value of networkCode
     *
     * @see Text2PayApi_validateMSISDN_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getNetworkCode()      {
        return $this->networkCode;
    }
    /**
     * Returns the value of networkTitle, retrieved by the API response as
     * [network_title] XML node.
     *
     * @return string value of networkTitle
     *
     * @see Text2PayApi_validateMSISDN_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getNetworkTitle()     {
        return $this->networkTitle;
    }
    /**
     * Returns the value of networkTierLevel, retrieved by the API response as
     * [network_tierlevel] XML node.
     *
     * @return int value of networkTierLevel
     *
     * @see Text2PayApi_validateMSISDN_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getNetworkTierLevel() {
        return $this->networkTierLevel;
    }
}


?>