<?php
/**
 * **************************************************************************
 *
 * File:         CurrencyInfo.php
 *
 * Purpose:      A helper class that holds currency info information for API
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
 * A helper class that holds Currency information, usually coming with
 * request queries to Text2Pay API.
 *
 * This was created to ease object-ization of this type of information.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_Objects_CurrencyInfo::getSymbol()}
 *  <li>{@link Text2PayApi_Objects_CurrencyInfo::getSymbolLocal()}
 *  <li>{@link Text2PayApi_Objects_CurrencyInfo::getPrefix()}
 * </ul>
 *
 * @see Text2PayApi_getCountryInfo_Response
 * @see Text2PayApi_getCountries_Response
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
class Text2PayApi_Objects_CurrencyInfo {
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CurrencyInfo::getSymbol()}
     *
     * @see Text2PayApi_Objects_CurrencyInfo
     * @see Text2PayApi_Objects_CurrencyInfo::getSymbol()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $symbol;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CurrencyInfo::getSymbolLocal()}
     *
     * @see Text2PayApi_Objects_CurrencyInfo
     * @see Text2PayApi_Objects_CurrencyInfo::getSymbolLocal()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $symbolLocal;
    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_Objects_CurrencyInfo::getPrefix()}
     *
     * @see Text2PayApi_Objects_CurrencyInfo
     * @see Text2PayApi_Objects_CurrencyInfo::getPrefix()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     *
     * @var string
     */
    private $prefix;

    /**
     * Creates a new instance of this object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $symbol the currency symbol value
     * @param string $symbolLocal the local currency symbol value
     * @param string $prefix the <a href="http://en.wikipedia.org/wiki/ISO_4217">ISO-4217</a> currency code prefix
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function __construct($symbol, $symbolLocal, $prefix) {
        $this->symbol = $symbol;
        $this->symbolLocal = $symbolLocal;
        $this->prefix = $prefix;
    }

    /**
     * Access to the currency symbol value information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getSymbol() { return $this->symbol; }
    /**
     * Access to the currency symbol value information in local language.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getSymbolLocal() { return $this->symbolLocal; }
    /**
     * Access to the <a href="http://en.wikipedia.org/wiki/ISO_4217">ISO-4217</a>
     * currency prefix value information.
     *
     * @return string
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.4
     */
    public function getPrefix() { return $this->prefix; }
}
?>