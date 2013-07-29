<?php
/**
 * **************************************************************************
 *
 * File:         MsisdnInfo.php
 *
 * Purpose:      A helper class that holds MSISDN info information for API
 *               response.
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
 * A helper class that holds MSISDN information, usually coming with
 * request queries to Text2Pay API.
 * <p>
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getInternationalPrefix()}
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getLocalPrefix()}
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getSuffix()}
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getRememberAllowed()}
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getNetworkLookupAvailable()}
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getMoReachable()}
 *  <li>{@link Text2PayApi_Objects_MsisdnInfo::getReference()}
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
class Text2PayApi_Objects_MsisdnInfo {
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getInternationalPrefix()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getInternationalPrefix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $internationalPrefix;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getLocalPrefix()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getLocalPrefix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $localPrefix;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getSuffix()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getSuffix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $suffix;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getRememberAllowed()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getRememberAllowed()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var boolean
     */
    private $rememberAllowed;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getNetworkLookupAvailable()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getNetworkLookupAvailable()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var boolean
     */
    private $networkLookupAvailable;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getMoReachable()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getMoReachable()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var boolean
     */
    private $moReachable;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_MsisdnInfo::getReference()}
     *
     * @see Text2PayApi_Objects_MsisdnInfo
     * @see Text2PayApi_Objects_MsisdnInfo::getReference()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $reference;

    /**
     * Creates a new instance of this object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $internationalPrefix international regex prefix of phone numbers for the country
     * @param string $localPrefix local regex prefix of phone numbers for the country.
     * @param string $suffix the regex suffix of phone numbers for the country
     * @param boolean $rememberAllowed True if the country allows the service to
     *     "remember" the phone number (store locally)
     * @param boolean $networkLookupAvailable True if the country has network lookup functionality
     * @param boolean $moReachable True if the country has shortcodes for sending SMS messages
     * @param string $reference phone number detail reference
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function __construct($internationalPrefix, $localPrefix, $suffix,
                    $rememberAllowed, $networkLookupAvailable, $moReachable, $reference) {
        $this->internationalPrefix = $internationalPrefix;
        $this->localPrefix = $localPrefix;
        $this->suffix = $suffix;
        $this->rememberAllowed = $rememberAllowed;
        $this->networkLookupAvailable = $networkLookupAvailable;
        $this->moReachable = $moReachable;
        $this->reference = $reference;
    }

    /**
     * Access to the international regex prefix of phone numbers for the country.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getInternationalPrefix() { return $this->internationalPrefix; }
    /**
     * Access to the local regex prefix of phone numbers for the country.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getLocalPrefix() { return $this->localPrefix; }
    /**
     * Access to the regex suffix of phone numbers for the country.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getSuffix() { return $this->suffix; }
    /**
     * Defines if the country allows the service to "remember" the phone number (store locally)
     *
     * @return boolean true if the interface can remember the phone number.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getRememberAllowed() { return $this->rememberAllowed; }
    /**
     * Defines if the country has network lookup functionality.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getNetworkLookupAvailable() { return $this->networkLookupAvailable; }
    /**
     * Defines if the country has shortcodes for sending SMS messages.
     *
     * @return boolean true if MO is reachable.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getMoReachable() { return $this->moReachable; }
    /**
     * Access to the reference of the phone number.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getReference() { return $this->reference; }
}

?>