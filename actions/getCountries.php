<?php
/**
 * **************************************************************************
 *
 * File:         getCountries.php
 *
 * Purpose:      Holds the functionality for [getCountries] Text2Pay API action.
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
 * Represents the action <b>getCountries</b> executed in Text2Pay API.
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
final class Text2PayApi_getCountries_Request extends Text2PayApi_RequestBase {

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
     *     $brandId = 1;
     *     $o = new Text2PayApi_getCountries_Request($cn, $brandId);
     *     $countries = $o->execute();
     *
     *     // print results
     *     foreach($countries->getCountries() as $code => $name)
         *         echo "code=[${code}], name=[${name}]\n";
     *
     * </code>
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param int $campaignId the campaign identification number

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
    public function __construct($apiConnection, $campaignId) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',     'getCountries');
        $this->setArgument('campaign_id', $campaignId);
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
        return new Text2PayApi_getCountries_Response($response);
    }
}

/**
 * Represents the response for the action <b>getCountries</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getCountries_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCountries_Response::getCountries()}
 * </ul>
 *
 * @see Text2PayApi_getCountries_Request
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
final class Text2PayApi_getCountries_Response
extends Text2PayApi_ResponseBase {


    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountries_Response::getCountryInfos()}
     *
     * @var mixed
     *
     * @see Text2PayApi_getCountries_Response
     * @see Text2PayApi_getCountries_Response::getCountryInfos()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $countryInfos;

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
        $this->countryInfos = array();
        foreach($this->fixXmlPhpArray($this->response['countries']['country']) as $co) {
            array_push($this->countryInfos, new Text2PayApi_getCountries_CountryInfo(
                $co['@attributes']['code'],
                $co['@attributes']['title'],
                $co['@attributes']['title_local'],
                $co['@attributes']['continent_name'],
                $co['@attributes']['language_code'],
                $co['@attributes']['text_direction'],
                $co['@attributes']['network_lookup_available'],
                new Text2PayApi_Objects_CurrencyInfo(
                    $co['@attributes']['currency_symbol'],
                    $co['@attributes']['currency_symbol_local'],
                    $co['@attributes']['currency_prefix']
                )
            ));
        }
    }

    /**
     * Returns the value of carriers, retrieved by the API response as
     * [countries] XML node and its child nodes.
     *
     * @return array of Text2PayApi_getCountries_CountryInfo
     *
     * @see Text2PayApi_getCountries_CountryInfo
     * @see Text2PayApi_getCountries_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getCountryInfos() {
        return $this->countryInfos;
    }
}

/**
 * A helper class that holds Country information, usually coming with
 * {@link Text2PayApi_getCountries_Response} queries to Text2Pay API.
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getCountries_CountryInfo::getCode()}
 *  <li>{@link Text2PayApi_getCountries_CountryInfo::getTitle()}
 * </ul>
 *
 * @see Text2PayApi_getCountries_Response
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 * @author Martens, Scott <smartens80@gmail.com>
 *
 * @since 0.3
 *
 * @package Text2Pay
 *
 * @subpackage Objects
 */
final class Text2PayApi_getCountries_CountryInfo extends Text2PayApi_Objects_CountryInfo {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getCountryInfo_Response::getNetworkLookupAvailable()}
     *
     * @var boolean
     *
     * @see Text2PayApi_getCountryInfo_Response
     * @see Text2PayApi_getCountryInfo_Response::getNetworkLookupAvailable()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $networkLookupAvailable;

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
     * Creates a new instance of this object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $code The  <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO-3166</a>
     * country code value
     * @param string $title The country name in English
     * @param string $titleLocal The country name in local language
     * @param string $continent The continent name in English
     * @param string $languageCode The local <a href="https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes">ISO-639</a> language
     * @param string $textDirection The direction of text (see: <a href="https://en.wikipedia.org/wiki/Bi-directional_text">Wikipedia - Bi-directional text</a>)
     * @param boolean $networkLookupAvailable Defines if network lookup is available for the country
     * @param Text2PayApi_Objects_CurrencyInfo $currencyInfo currency information for the country
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function __construct($code, $title, $titleLocal,
            $continent, $languageCode, $textDirection,
            $networkLookupAvailable, $currencyInfo) {
        parent::__construct($code, $title, $titleLocal, $continent, $languageCode, $textDirection);
        $this->networkLookupAvailable = $networkLookupAvailable;
        $this->currencyInfo = $currencyInfo;
    }

    /**
     * Access to the network lookup available information.
     *
     * @return boolean
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.4
     */
    public function getNetworkLookupAvailable() { return $this->networkLookupAvailable; }
    /**
     * Access to the currency information of the country.
     *
     * @return Text2PayApi_Objects_CurrencyInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.4
     */
    public function getCurrencyInfo() { return $this->currencyInfo; }
}

?>