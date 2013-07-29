<?php
/**
 * **************************************************************************
 *
 * File:         getCarriers.php
 *
 * Purpose:      Holds the functionality for [getCarriers] Text2Pay API action.
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
 * Represents the action <b>getCarriers</b> executed in Text2Pay API.
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
final class Text2PayApi_getCarriers_Request
extends Text2PayApi_RequestBase {

    /**
     * Retrieves all the available carriers setup for the specified countryCode.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param string $countryCode International <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO-3166</a> country code
     *
     * @throws Text2PayException if the connection is not a valid connection
     * (thrown by the base class {@link Text2PayApi_RequestBase}, or if
     * required arguments are not valid (thrown by
     * {@link Text2PayApi_RequestBase::setArgument()} method).
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::setArgument()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function __construct($apiConnection, $countryCode) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',   		 'getCarriers');
        $this->setArgument('country_code',   $countryCode );
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getCarriers_Response object
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
        return new Text2PayApi_getCarriers_Response($response);
    }
}


/**
 * Represents the response for the action <b>getCarriers</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getCarriers_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCarriers_Response::getCarrierInfos()}
 *  <li>{@link Text2PayApi_getCarriers_Response::getCountryInfo()}
 * </ul>
 *
 * @see Text2PayApi_getCarriers_Request
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
final class Text2PayApi_getCarriers_Response
extends Text2PayApi_ResponseBase {


    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_Response::getCarrierInfos()}
     *
     * @var array
     *
     * @see Text2PayApi_getCarriers_Response
     * @see Text2PayApi_getCarriers_Response::getCarrierInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $carrierInfos;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_Response::getCountryInfo()}
     *
     * @var Text2PayApi_getCarriers_CountryInfo
     *
     * @see Text2PayApi_getCarriers_Response
     * @see Text2PayApi_getCarriers_Response::getCountryInfo()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $countryInfo;

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

        $this->countryInfo = new Text2PayApi_getCarriers_CountryInfo(
                $this->response['country']['@attributes']['code'],
                $this->response['country']['@attributes']['hlr_lookup'],
                $this->response['country']['@attributes']['msisdn_local_prefix'],
                $this->response['country']['@attributes']['msisdn_international_prefix'],
                $this->response['country']['@attributes']['msisdn_suffix'],
                $this->response['country']['@attributes']['msisdn_remember']
        );

        $this->carrierInfos = array();
        foreach($this->fixXmlPhpArray($this->response['carriers']['carrier']) as $ca) {
                $code = $ca['@attributes']['code'];
                $title = $ca['@attributes']['title'];
                $tier = $ca['@attributes']['tier'];
                // got all elements, so push in the object into the array
                array_push($this->carrierInfos, new Text2PayApi_getCarriers_CarrierInfo($code, $title, $tier));
        }
    }

    /**
     * Returns the value of carriers, retrieved by the API response as
     * [carriers] XML node and its child nodes.
     *
     * @return array
     *
     * @see Text2PayApi_getCarriers_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    public function getCarrierInfos() {
        return $this->carrierInfos;
    }

    /**
     * Returns the value of carriers, retrieved by the API response as
     * [carriers] XML node and its child nodes.
     *
     * @return Text2PayApi_getCarriers_CountryInfo
     *
     * @see Text2PayApi_getCarriers_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    public function getCountryInfo() {
        return $this->countryInfo;
    }

}

/**
 * A helper class that holds carrier information, usually coming with
 * {@link Text2PayApi_getCarriers_Request} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * @see Text2PayApi_getCarriers_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 *
 */
class Text2PayApi_getCarriers_CarrierInfo {
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getCode()}
     *
     * @var string
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    private $code;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getTitle()}
     *
     * @var string
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getTitle()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
     private $title;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getTier()}
     *
     * @var int
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getTier()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    private $tier;

    /**
     * Creates a new instance of this class, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $code the value for carrier code
     * @param string $title the value for carrier name
     * @param string $tier the carrier tier
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    public function __construct($code, $title, $tier) {
        $this->code = $code;
        $this->title = $title;
        $this->tier = $tier;
    }

    /**
     * Returns the value of carrier code, retrieved by the API response as
     * [code] XML attribute.
     *
     * @return string
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    public function getCode() { return $this->code; }
    /**
     * Returns the value of carrier name, retrieved by the API response as
     * [title] XML attribute.
     *
     * @return string
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    public function getTitle() { return $this->title; }
        /**
     * Returns the value of carrier tier, retrieved by the API response as
     * [tier] XML attribute.
     *
     * @return string
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     *
     */
    public function getTier() { return $this->tier; }
}

/**
 * A helper class that holds Country information, usually coming with
 * {@link Text2PayApi_getCarriers_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getCarrierCode()}
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getCode()}
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getlookupAvailable()}
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getMsisdnLocalPrefix()}
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getMsisdnIntlPrefix()}
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getMsisdnSuffix()}
 *  <li>{@link Text2PayApi_getCarriers_CountryInfo::getMsisdnRemember()}
 *  <li>
 * </ul>
 *
 * @see Text2PayApi_getCarriers_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 *
 */
class Text2PayApi_getCarriers_CountryInfo {
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getCode()}
     *
     * @var string
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
	private $code;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getLookupAvailable()}
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getLookupAvailable()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
	 * @var bool
     */
    private $lookupAvailable;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getMsisdnLocalPrefix()}
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getMsisdnLocalPrefix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
	 * @var string
     */
    private $msisdnLocalPrefix;
     /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getMsisdnIntlPrefix()}
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getMsisdnIntlPrefix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
	 * @var string
     */
    private $msisdnIntlPrefix;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getMsisdnSufffix()}
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getMsisdnSufffix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
	 * @var string
     */
    private $msisdnSuffix;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCarriers_CarrierInfo::getMsisdnRemember()}
     *
     * @see Text2PayApi_getCarriers_CarrierInfo
     * @see Text2PayApi_getCarriers_CarrierInfo::getMsisdnRemember()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
	 * @var string
     */
    private $msisdnRemember;

    /**
     * Creates a new instance of this class, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $code the value for country code
     * @param string $lookupAvailable the value for country lookup
     * @param string $msisdnLocalPrefix the regular expression prefix for local numbers
     * @param string $msisdnIntlPrefix  the regular expression prefix for international numbers
     * @param string $msisdnSuffix  the regular expression suffix for mobile numbers
     * @param string $msisdnRemember the value for remembering the phone
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.3
     *
     */
    public function __construct($code, $lookupAvailable, $msisdnLocalPrefix,
            $msisdnIntlPrefix, $msisdnSuffix, $msisdnRemember) {
        $this->code = $code;
        $this->lookupAvailable = $lookupAvailable;
        $this->msisdnLocalPrefix = $msisdnLocalPrefix;
        $this->msisdnIntlPrefix = $msisdnIntlPrefix;
        $this->msisdnSuffix = $msisdnSuffix;
        $this->msisdnRemember = $msisdnRemember;
    }

    /**
     * Access to the country code value information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getCode() { return $this->code; }
    /**
     * Defines if lookup is available for this country.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getlookupAvailable() { return $this->lookupAvailable; }
	/**
     * Defines the regular expresion prefix for local numbers in this country
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getMsisdnLocalPrefix() { return $this->msisdnLocalPrefix; }
	/**
     * Defines the regular expresion prefix for international numbers in this country
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getMsisdnIntlPrefix() { return $this->msisdnIntlPrefix; }
	/**
     * Defines the regular expresion suffix for mobile numbers in this country
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getMsisdnSuffix() { return $this->msisdnSuffix; }
    /**
     * Defines if the country regulations allow to remember (cookies, etc) the mobile number
     *
     * @return boolean
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.3
     */
    public function getMsisdnRemember() { return $this->msisdnRemember; }
}

?>