<?php
/**
 * **************************************************************************
 *
 * File:         resendConfirmation.php
 *
 * Purpose:      Holds the functionality for [resendConfirmation] Text2Pay API action.
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
 * Represents the action <b>resendConfirmation</b> executed in Text2Pay API.
 *
 * Refer to constructor for additional documentation.
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.2
 *
 * @package Text2Pay
 *
 * @subpackage Request
 *
 */
final class Text2PayApi_resendConfirmation_Request
extends Text2PayApi_RequestBase {

    /**
     * Use this call to resend the user their confirmation message.
     * If you have setup your campaign to NOT send confirmation messages,
     * then this API action will return a failed result.
     *
     * Official documentation is available at:
     * <a href="https://merchants.text2pay.com/integrate/api_documentation/">https://merchants.text2pay.com/integrate/api_documentation/</a>
     * (you will need proper merchant credentials to access contents here)
     *
     * @param Text2PayApi_Connection $apiConnection the connection object
     *
     * @param int $serviceId Market & product identifier. This is a unique
     * number based on the carrier, price_point and purchase type. See
     * {@link Text2PayApi_getServices_Request} for details.
     *
     * @param int $transactionId first value of a transactionId
     * (also referred to as the parent transaction_id) from initiateTransaction
     * function. See {@link Text2PayApi_initiateTransaction_Request} for
     * details.
     *
     * @param int $transactionGroupId The transaction_group_id for the entire
     * transaction. A transaction_group_id will group all transaction_id's to
     * make up the complete transaction. Eg: A transaction may be made up of more
     * than 1 transaction_id (often the case for high price points)
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
     *
     * @since 0.2
     *
     */
    public function __construct($apiConnection,
            $serviceId,
            $transactionId=null,
            $transactionGroupId=null) {

        parent::__construct($apiConnection);

        // As a rule, either of the optional values must be passed.
        if (!isset($transactionGroupId) && !isset($transactionId))
            throw new Text2PayException(
                "Either the transactionGroupId or transactionId must be informed.",
                Text2PayException::LIB_ERROR_INVALID_ARG);

        // Set remaining stuff for this action
        $this->setArgument('action', 'resendConfirmation'  );
        $this->setArgument('service_id', $serviceId        );
        if (isset($transactionGroupId))
            $this->setArgument('transaction_group_id', $transactionGroupId );
        if (isset($transactionId))
            $this->setArgument('transaction_id', $transactionId );
    }

    /**
     * Simply executes the base class {@link Text2PayApi_RequestBase::execute()}
     * and returns a corresponding object to this request's purpose.
     *
     * @return {@link Text2PayApi_resendConfirmation_Response} object
     *
     * @see Text2PayApi_RequestBase
     * @see Text2PayApi_RequestBase::execute()
     * @see Text2PayApi_resendConfirmation_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    public function execute() {

        // Execute all from base class
        $response = parent::execute();

        // Map the result in a proper response object
        return new Text2PayApi_resendConfirmation_Response($response);
    }
}


/**
 * Represents the response for the action <b>resendConfirmation</b> executed
 * in Text2Pay API, with {@link Text2PayApi_resendConfirmation_Request}.
 *
 * This is a simple object that will hold the response information from the
 * action above, accessible through its getter methods:
 *
 * <ul>
 *  <li>{@link Text2PayApi_resendConfirmation_Response::getConfirmation()}
 * </ul>
 *
 * @see Text2PayApi_resendConfirmation_Request
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.2
 *
 * @package Text2Pay
 *
 * @subpackage Response
 *
 */
final class Text2PayApi_resendConfirmation_Response
extends Text2PayApi_ResponseBase {

    /**
     * See main documentation in its getter method, defined as
     * {@link Text2PayApi_resendConfirmation_Response::getConfirmation()}
     *
     * @var string
     *
     * @see Text2PayApi_resendConfirmation_Response
     * @see Text2PayApi_resendConfirmation_Response::getConfirmation()
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    private $confirmation;

    /**
     * Creates a new instance of this response object, but this should not be
     * directly handled by enternal code, as the wrapper uses it to return more
     * accessible values from the Text2Pay API.
     *
     * @param string $raw The raw value from the API call response.
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    public function __construct($raw) {
        parent::__construct($raw);

        // Map all response data into this object
        $this->confirmation = $this->response['confirmation'];
    }

    /**
     * Returns the confirmation message returned by the API.
     *
     * @return string confirmation message
     *
     * @see Text2PayApi_resendConfirmation_Response
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.2
     *
     */
    public function getConfirmation()  {
        return $this->confirmation;
    }
}



?>