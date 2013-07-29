<?php
/**
 * **************************************************************************
 *
 * File:         constants.php
 *
 * Purpose:      Holds constant values used throughout this library code.
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
 * List of product types available in Text2Pay.
 *
 * Available values are:
 *
 * <ul>
 *     <li>VIRTUAL_CURRENCY
 *     <li>VIRTUAL_GOODS
 *     <li>DONATION
 * </ul>
 *
 * @package Text2Pay
 *
 * @subpackage Helpers
 */
class Text2PayApi_Constants_ProductType {

    /**
     * Defines Virtual Currency products.
     *
     * @var string
     */
    const VIRTUAL_CURRENCY = 'vc';

    /**
     * Defines Virtual Goods products.
     *
     * @var string
     */
    const VIRTUAL_GOODS = 'vg';

    /**
     * Defines Donation products.
     *
     * @var string
     */
    const DONATION = "do";

}

/**
 * List of optin methods available in Text2Pay.
 *
 *
 * Available values are:
 *
 * <ul>
 *     <li>MO
 *     <li>OP
 *     <li>PIN
 * </ul>
 *
 * @package Text2Pay
 *
 * @subpackage Helpers
 */
class Text2PayApi_Constants_OptinMethod {

 	/**
     * The confirmation through SMS.
     * <p>
     * MO (Message Originating) opt-in is the required opt-in method in the  majority
     * of countries. In order to bill the end user, the user must confirm by sending an SMS
     * (MO) to the specified shortcode displayed, or the user can simply     reply to the
     * Std / Bulk Rate SMS the Text2Pay API sent the user upon a successful  response
     * from this method.
     *
  	 * @var string
	 */
	const MO = 'MO';

	/**
	 * The confirmation through off portal redirection
     * (usually a 3rd party system is required to confirm transaction, in DCB cases)
	 *
	 * @var string
	 */
	const OP = 'OP';

	/**
	 * The confirmation through PIN.
	 * <p>
	 * PIN opt-in is permitted in a limited number of countries. In order to bill
	 * the end user, the user must confirm by entering the PIN (on your      website, app etc)
	 * that was sent to them via Std / Bulk Rate SMS. This Std / Bulk Rate   MT (SMS) will
	 * be sent automatically by the Text2Pay API upon a successful response  from this method.
	 *
	 * <p>
	 * The value used is: <i>{@value}</i>
	 *
	 * @var string
	 *
	 */
	const PIN = "PIN";

}

/**
 * List of billing types available in Text2Pay.
 *
 * Available values are:
 *
 * <ul>
 *     <li>PSMS
 *     <li>DCB
 * </ul>
 *
 * @package Text2Pay
 *
 * @subpackage Helpers
 *
 */
class Text2PayApi_Constants_BillingType {

	/**
     * The billing happens through SMS (either MO or MT billed).
     * <p>
     * MO (Message Originating) opt-in is the required opt-in method in the  majority
     * of countries. In order to bill the end user, the user must confirm by sending an SMS
     * (MO) to the specified shortcode displayed, or the user can simply     reply to the
     * Std / Bulk Rate SMS the Text2Pay API sent the user upon a successful  response
     * from this method.
     *
     * @var string
     *
     */
     const PSMS = "PSMS";

    /**
     * The billing happens through Direct Carrier Billing.
     * <p>
     * There are 2 types of DCB:
     * <ul>
     *      <li>1: In-House PIN verification.</li>
     *      <li>2: Off Portal PIN verification where a 3rd party system is   required to confirm transaction.</li>
     * </ul>
     * <p>
     * Direct Billing offers direct billing to the consumers mobile / cell   bill
     * resulting in higher billable rates. This method operates the same as  PIN Confirmation.
     * For Off Portal verification, the redirect URL will be shown in the    success output of this method in.
     *
     * @var string
     *
     */
     const DCB = "DCB";
}


/**
 * List of status codes for Text2Pay transactions.
 *
 * Available values are:
 *
 * <ul>
 *     <li>DELIVERED
 *     <li>BILLED
 *     <li>OVER_SPEND_LIMIT
 *     <li>NO_CREDIT
 *     <li>FAILED
 *     <li>PENDING
 *     <li>SENT
 *     <li>BILLING_BLOCKED
 *     <li>REFUNDED
 *     <li>CONFIRMED
 * </ul>
 *
 * @package Text2Pay
 *
 * @subpackage Helpers
 *
 */
class Text2PayApi_Constants_StatusCode {

    /**
     * Represents that the MT(s) was/were successfully delivered to consumer.
     *
     * @var int
     */
    const DELIVERED = 20000;

    /**
     * Represents that the Consumer was successfully billed.
     *
     * @var int
     */
    const BILLED = 20001;

    /**
     * Represents that the Consumer is over their current carrier spend limit.
     *
     * @var int
     */
    const OVER_SPEND_LIMIT = 20002;

    /**
     * Represents that the Consumer has insufficient funds.
     *
     * @var int
     */
    const NO_CREDIT = 20003;

    /**
     * Represents that the MT(s) was/were rejected by carrier or failed.
     *
     * @var int
     */
    const FAILED = 20004;

    /**
     * Represents that the Transaction is waiting to be sent to the SMSC,
     * or is awaiting feedback from carrier.
     *
     * @var int
     */
    const PENDING = 20005;

    /**
     * Represents that the Transaction has been sent to SMSC,
     * awaiting feedback from carriers.
     *
     * @var int
     */
    const SENT = 20006;

    /**
     * Represents that the Premium SMS or Direct Bill is blocked on this MSISDN.
     *
     * @var int
     */
    const BILLING_BLOCKED = 20007;

    /**
     * Represents that the Transaction was refunded by carrier or customer care.
     *
     * @var int
     */
    const REFUNDED = 20008;

    /**
     * Represents that the Confirmation MO has been received.
     *
     * @var int
     */
    const CONFIRMED = 20009;

    /**
     * Represents that the transaction is Partially successful.
     *
     * @var int
     */
    const PARTIAL_SUCCESS = 20010;

    /**
     * Represents that Partial payment was received.
     *
     * @var int
     */
    const NOT_FULL_AMOUNT = 20011;
}

?>