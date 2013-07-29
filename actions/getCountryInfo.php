<?php
/**
 * **************************************************************************
 *
 * File:         getCountryInfo.php
 *
 * Purpose:      Holds the functionality for [getCountryInfo] Text2Pay API action.
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
 * Represents the action <b>getCountryInfo</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.4
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
final class Text2PayApi_getCountryInfo_Request extends Text2PayApi_RequestBase {

    /**
     * Retrieves all active countries setup for the specified brand.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * Example:
     * <code>
     *     // Create a Text2Pay API connection
     *     $cn = new Text2PayApi_Connection('apiKey', 1, 'username', 'password');
     *
     *     // Get countries function
     *     $countryCode = 'AU';
     *     $o = new Text2PayApi_getCountryInfo_Request($cn, $countryCode);
     *     $countryInfo = $o->execute();
     *
     *     // print results
     *     print_r($countryInfo);
     *
     * </code>
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param string $countryCode International ISO-3166 country code

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
        $this->setArgument('action',       'getCountryInfo');
        $this->setArgument('country_code', $countryCode);
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getCountries_Response object
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
        return new Text2PayApi_getCountryInfo_Response($response);
    }
}

/**
 * Represents the response for the action <b>getCountryInfo</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getCountryInfo_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getCountryCode()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getTitle()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getTitleLocal()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getContinent()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getLanguageCode()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getTextDirection()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getMsisdnInfo()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getSupportNumber()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getSupportEmail()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getCurrencyInfo()}
 *  <li>{@link Text2PayApi_getCountryInfo_Response::getTerms()}
 * </ul>
 *
 * @see Text2PayApi_getCountryInfo_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.4
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_getCountryInfo_Response
extends Text2PayApi_ResponseBase {


    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getCountryCode()}
     *
     * @var Text2PayApi_Objects_CountryInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getCountryInfo()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $countryInfo;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getSupportNumber()}
     *
     * @var string
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getSupportNumber()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $supportNumber;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getSupportEmail()}
     *
     * @var string
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getSupportEmail()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $supportEmail;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getMsisdnInfo()}
     *
     * @var Text2PayApi_Objects_MsisdnInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getMsisdnInfo()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $msisdnInfo;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getCurrencyInfo()}
     *
     * @var Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getCurrencyInfo()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $currencyInfo;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getTerms()}
     *
     * @var Text2PayApi_getCountryInfo_TermsInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getTerms()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $terms;






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

        $this->countryInfo = new Text2PayApi_Objects_CountryInfo(
                        $this->response['country']['@attributes']['code'],
                        $this->response['country']['@attributes']['title'],
                        $this->response['country']['@attributes']['title_local'],
                        $this->response['country']['continent']['@attributes']['name'],
                        $this->response['country']['language']['@attributes']['code'],
                        $this->response['country']['language']['@attributes']['text_direction']);

        $this->msisdnInfo = new Text2PayApi_Objects_MsisdnInfo(
                        $this->response['country']['msisdn']['@attributes']['international_prefix'],
                        $this->response['country']['msisdn']['@attributes']['local_prefix'],
                        $this->response['country']['msisdn']['@attributes']['suffix'],
                        $this->response['country']['msisdn']['@attributes']['remember_allowed'],
                        $this->response['country']['msisdn']['@attributes']['network_lookup_available'],
                        $this->response['country']['msisdn']['@attributes']['mo_reachable'],
                        $this->response['country']['msisdn']['@attributes']['reference']
        );

        $this->currencyInfo = new Text2PayApi_Objects_CurrencyInfo(
                        $this->response['country']['currency']['@attributes']['symbol'],
                        $this->response['country']['currency']['@attributes']['symbol_local'],
                        $this->response['country']['currency']['@attributes']['prefix']
        );

        $this->supportNumber = $this->response['country']['support']['@attributes']['number'];
        $this->supportEmail = $this->response['country']['support']['@attributes']['email'];

        $this->terms = new Text2PayApi_getCountryInfo_TermsInfo(
                        $this->response['country']['terms']['campaign'][0],
                        $this->response['country']['terms']['campaign'][1],
                        $this->response['country']['terms']['campaign'][2]
        );
    }

    /**
     * Returns country information.
     *
     * @return Text2PayApi_Objects_CountryInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getCountryInfo() { return $this->countryInfo; }
    /**
     * Returns details of phone numbers in this country.
     *
     * @return Text2PayApi_Objects_MsisdnInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getMsisdnInfo() { return $this->msisdnInfo; }
    /**
     * Returns the official support number by Text2Pay on this country.
     *
     * @return string
     *
     * @see Text2PayApi_getCountryInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getSupportNumber() { return $this->supportNumber; }
    /**
     * Returns the official support email contact by Text2Pay on this country.
     *
     * @return string
     *
     * @see Text2PayApi_getCountryInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getSupportEmail() { return $this->supportEmail; }
    /**
     * Returns details of the currency information for this country.
     *
     * @return Text2PayApi_Objects_CurrencyInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getCurrencyInfo() { return $this->currencyInfo; }
    /**
     * Returns the various terms and conditions available for this country.
     *
     * @return Text2PayApi_getCountryInfo_TermsInfo
     *
     * @see Text2PayApi_getCountryInfo_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getTerms() { return $this->terms; }
}





/**
 * A helper class that holds Terms and conditions information, usually coming with
 * {@link Text2PayApi_getCountryInfo_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCountryInfo_TermsInfo::getOnceOff()}
 *  <li>{@link Text2PayApi_getCountryInfo_TermsInfo::getSubscription()}
 *  <li>{@link Text2PayApi_getCountryInfo_TermsInfo::getDirectBill()}
 * </ul>
 *
 * @see Text2PayApi_getCountryInfo_Response
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.4
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 */
class Text2PayApi_getCountryInfo_TermsInfo {
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_TermsInfo::getOnceOff()}
     *
     * @see Text2PayApi_getCountryInfo_TermsInfo
     * @see Text2PayApi_getCountryInfo_TermsInfo::getOnceOff()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $onceOff;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_TermsInfo::getSubscription()}
     *
     * @see Text2PayApi_getCountryInfo_TermsInfo
     * @see Text2PayApi_getCountryInfo_TermsInfo::getSubscription()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $subscription;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_TermsInfo::getDirectBill()}
     *
     * @see Text2PayApi_getCountryInfo_TermsInfo
     * @see Text2PayApi_getCountryInfo_TermsInfo::getDirectBill()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $directBill;

    /**
     * Creates a new instance of this object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $onceOff The once off terms
     * @param string $subscription The subscription terms
     * @param string $directBill The direct carrier billing terms
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function __construct($onceOff, $subscription, $directBill) {
        $this->onceOff = $onceOff;
        $this->subscription = $subscription;
        $this->directBill = $directBill;
    }

    /**
     * Access to the Once Off terms information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getOnceOff() { return $this->onceOff; }
    /**
     * Access to the Subscription terms information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getSubscription() { return $this->subscription; }
    /**
     * Access to the Direct Billing terms information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getDirectBill() { return $this->directBill; }
}


?>