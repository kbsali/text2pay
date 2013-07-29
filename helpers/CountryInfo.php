<?php
/**
 * **************************************************************************
 *
 * File:         CountryInfo.php
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
 * A helper class that holds country information, usually coming with
 * request queries to Text2Pay API.
 * <p>
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getCountryCode()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getTitle()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getTitleLocal()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getContinent()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getLanguageCode()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getTextDirection()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getMsisdnInfo()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getSupportNumber()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getSupportEmail()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getCurrencyInfo()}
 *  <li>{@link Text2PayApi_Objects_CountryInfo::getTerms()}
 * </ul>
 *
 * @see Text2PayApi_getCountryInfo_Request
 * @see Text2PayApi_getCountries_Request
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
class Text2PayApi_Objects_CountryInfo {


    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getCode()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $code;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getTitle()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getTitle()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $title;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getTitleLocal()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getTitleLocal()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $titleLocal;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getContinent()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getContinent()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $continent;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getLanguageCode()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getLanguageCode()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $languageCode;

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CountryInfo::getTextDirection()}
     *
     * @var string
     *
     * @see Text2PayApi_Objects_CountryInfo
     * @see Text2PayApi_Objects_CountryInfo::getTextDirection()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    private $textDirection;

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
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function __construct($code, $title, $titleLocal,
            $continent, $languageCode, $textDirection) {
        $this->code = $code;
        $this->title = $title;
        $this->titleLocal = $titleLocal;
        $this->continent = $continent;
        $this->languageCode = $languageCode;
        $this->textDirection = $textDirection;
    }

    /**
     * Returns the <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO-3166</a>
     * value of the country code.
     *
     * @return string the country code value
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getCode() { return $this->code; }
    /**
     * Returns the name of the country in English.
     *
     * @return string
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getTitle() { return $this->title; }
    /**
     * Returns the name of the country in native language.
     *
     * @return string
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getTitleLocal() { return $this->titleLocal; }
    /**
     * Returns the continent name in English.
     *
     * @return string
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getContinent() { return $this->continent; }
    /**
     * Returns the <a href="https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes">ISO-639</a>
     * language code.
     *
     * @return string
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getLanguageCode() { return $this->languageCode; }
    /**
     * Returns the text direction for the country language.
     * See also: <a href="https://en.wikipedia.org/wiki/Bi-directional_text">Wikipedia - Bi-directional text</a>
     *
     * @return string
     *
     * @see Text2PayApi_Objects_CountryInfo
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     */
    public function getTextDirection() { return $this->textDirection; }
}

?>