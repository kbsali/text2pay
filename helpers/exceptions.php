<?php
/**
 * **************************************************************************
 *
 * File:         exceptions.php
 *
 * Purpose:      Holds all exceptions thrown by this SDK and by Text2Pay API.
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
 *
 * Documentation:
 * --------------
 *
 * Comprehensive documentation about the Text2Pay API is available at:
 *
 * {@link http://merchants.text2pay.com/developers/api_documentation}
 * (you will need proper merchant credentials to access contents here)
 *
 * The documentation provided here merely attempts to facilitate development
 * process. If you are not sure of the functionalities here described, always
 * refer to official documentation.
 *
 * Feel free to contact Text2Pay if you have any trouble:
 * {@link http://www.text2pay.com/contact}
 *
 * **************************************************************************
 */


/**
 * Extended from basic {@link Exception} class, holding special
 * error codes that may be returned by the API wrapper.
 *
 * Note that most error codes are returned from the API response
 * itself, unless there are issues prior to properly receiving
 * a response from Text2Pay servers.
 *
 * See detailed documentation of these errors:API
 * <ul>
 *         <li>{@link Text2PayException::LIB_ERROR_INVALID_ARG}
 *         <li>{@link Text2PayException::LIB_ERROR_UNKNOWN}
 *         <li>{@link Text2PayException::LIB_ERROR_CONNECTIVITY}
 * </ul>
 *
 * All errors described above hold negative numeric values, as
 * opposed to Text2Pay API errors, which should hold only positive
 * values, as documented in:
 * {@link http://merchants.text2pay.com/developers/api_documentation}
 * (you will need proper merchant credentials to access contents here)
 *
 * @see Exception
 *
 * @see Text2PayApiException
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Exception
 *
 */
class Text2PayException extends Exception {

    /**
     * Defines an error of invalid arguments, value of negative 550.
     * This will usually happen in case of invalid arguments passed
     * to methods or constructors of the classes in this library.
     *
     * @var int
     *
     * @see Text2PayException
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    const LIB_ERROR_INVALID_ARG = -550;

    /**
     * Defines unknown or properly unhandled exceptions, value of negative 500.
     * This will usually happen in unexpected behavior of this library. Errors
     * of this nature should be reported to Text2Pay Support Team for further
     * troubleshooting.
     *
     * @var int
     *
     * @see Text2PayException
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    const LIB_ERROR_UNKNOWN = -500;

    /**
     * Defines issues with Internet connectivity, value of negative 1000.
     * This is most related to problems coming from CURL requests. Refer
     * to CURL docs for further troubleshooting on this.
     *
     * @var int
     *
     * @see Text2PayException
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    const LIB_ERROR_CONNECTIVITY = -1000;
}



/**
 * Extended from {@link Text2PayException} class, this exception holds
 * the error information that is returned by Text2Pay API response,
 * from its original XML format:
 *
 * <code>
 *     <?xml version="1.0" encoding="UTF-8"?>
 *     <response>
 *          <error_code>{errorCode}</error_code>
 *          <message>{message}</message>
 *  </response>
 * </code>
 *
 * All error code values are documented at:
 * {@link http://merchants.text2pay.com/developers/api_documentation}
 * (you will need proper merchant credentials to access contents here)
 *
 * Note that most error codes are returned from the API response
 * itself, unless there are issues prior to properly receiving
 * a response from Text2Pay servers.
 *
 * See detailed documentation of these errors:
 * <ul>
 *      <li>{@link Text2PayException::LIB_ERROR_INVALID_ARG}
 *      <li>{@link Text2PayException::LIB_ERROR_UNKNOWN}
 *      <li>{@link Text2PayException::LIB_ERROR_CONNECTIVITY}
 * </ul>
 *
 * @see Exception
 *
 * @see Text2PayApiException
 *
 * @author Braga, Bruno <bruno.braga@gmail.com>
 *
 * @since 0.1
 *
 * @package Text2Pay
 *
 * @subpackage Exception
 *
 */
final class Text2PayApiException extends Text2PayException {

    /**
     * Defines successful value that is returned by the Text2Pay API.
     *
     * Note: Some functionality of the API, if successful, may not return this
     *       information. Nevertheless, this is used to distinguish what is
     *       successful and what is not.
     *
     * @var int
     *
     * @see Text2PayException
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    const API_SUCCESS = 0;

    /**
     * The static constructor of this class. You should use this instead of its
     * default constructor coming directly from a API response converted to
     * array values.
     *
     * Note: You should not need to worry about this, as this wrapper already
     *          takes care of all that for you.
     *
     * @param array $result the values returned by the API response, properly
     *                      formatted as array (should contain keys 'error_code'
     *                      and 'message').
     *
     * @param Exception $throwable The previous exception, if any.
     *
     * @return a new {@link Text2PayApiException} object.
     *
     * @static
     *
     * @see Text2PayException
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.1
     *
     */
    public static function initWithResult($result, $throwable = null) {

        // just to ensure this method will never misbehave
        if (!isset($result))
            $result = array();

        $code = ( array_key_exists('error_code', $result) ?
                $result['error_code'] : Text2PayException::LIB_ERROR_UNKNOWN );
        $message = ( array_key_exists('message', $result) && !empty($result['message']) ?
                $result['message'] : null );

        // handle exception argument depending on PHP version
        if (PHP_VERSION_ID < 50300)
            return new Text2PayApiException($message . (empty($throwable) ? '' : ' - ' . $throwable), $code);
        else
            return new Text2PayApiException($message, $code, $throwable);
    }

    /**
     * The static constructor of this class. You should use this instead of its
     * default constructor coming directly from a API response in plain text.
     *
     * Note: You should not need to worry about this, as this wrapper already
     *          takes care of all that for you.
     *
     * @param string $text the values returned by the API response in plain text
     * (this is usually a "error_code,message" string)
     *
     * @param Exception $throwable The previous exception, if any.
     *
     * @return a new {@link Text2PayApiException} object.
     *
     * @static
     *
     * @see Text2PayException
     *
     * @author Braga, Bruno <bruno.braga@gmail.com>
     *
     * @since 0.5
     *
     */
    public static function initWithPlainResult($text, $throwable = null) {

        $result = array();

        // try to parse text as "error_code,message" string
        if (!empty($text)) {
            $temp = explode(',', $text, 2);
            if (count($temp) == 2 && intval($temp[0] == $temp[0])) {
                $result['error_code'] = $temp[0];
                $result['message'] = $temp[1];
            }
        }

        if (empty($result))
            return new Text2PayApiException('Unknown Exception', Text2PayException::LIB_ERROR_UNKNOWN);
        else
            return self::initWithResult($result, $throwable);
    }
}

?>