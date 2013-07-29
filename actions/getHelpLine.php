<?php
/**
 * **************************************************************************
 *
 * File:         getHelpLine.php
 *
 * Purpose:      Holds the functionality for [getHelpLine] Text2Pay API action.
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
 * Represents the action <b>getHelpLine</b> executed in Text2Pay API.
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
final class Text2PayApi_getHelpLine_Request
extends Text2PayApi_RequestBase {

    /**
     * Retrieves the support helpline for a particular country
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param string $countryCode International ISO-3166 country code
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
    public function __construct($apiConnection,
    $countryCode) {

        parent::__construct($apiConnection);

        // Set remaining stuff for this action
        $this->setArgument('action',   		 'getHelpLine'    );
        $this->setArgument('country_code',   $countryCode  );
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return Text2PayApi_getHelpLine_Response object
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
        return new Text2PayApi_getHelpLine_Response($response);
    }
}



/**
 * Represents the response for the action <b>getHelpLine</b> executed
 * in Text2Pay API, with {@link Text2PayApi_getHelpLine_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_getHelpLine_Response::getHelpLine()}
 * </ul>
 *
 * @see Text2PayApi_getHelpLine_Request
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
final class Text2PayApi_getHelpLine_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_getHelpLine_Response::getHelpLine()}
     *
     * @var string
     *
     * @see Text2PayApi_getHelpLine_Response
     * @see Text2PayApi_getHelpLine_Response::getHelpLine()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    private $helpLine;

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
        $this->helpLine     = $this->response['country']['@attributes']['helpline'];
    }

    /**
     * Returns the value of helpLine, retrieved by the API response as
     * [helpLine] XML node.
     *
     * @return int value of helpLine
     *
     * @see Text2PayApi_getHelpLine_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     * @author Martens, Scott <smartens80@gmail.com>
     *
     * @since 0.1
     *
     */
    public function getHelpLine() {
        return $this->helpLine;
    }
}


?>