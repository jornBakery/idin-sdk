<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 7-3-19
 * Time: 14:32
 */

namespace Paynl\IDIN;

use Paynl\IDIN\Error\Error;

class IDIN
{
    /**
     * @var Config
     */
    private $config;

    /**
     * IDIN constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return Result\GetIssuers
     * @throws Error
     */
    public function getIssuers()
    {
        $paynlApi = new Api\GetIssuers($this->config);

        return new Result\GetIssuers($paynlApi->doRequest());
    }

    /**
     * @param array $options [
     *      String reference*,
     *      String issuerId*,
     *      URL returnUrl*,
     *      URL exchangeURL,
     *      String language
     * ]
     *
     * @return Result\Authenticate
     * @throws Error
     */
    public function authenticate(array $options = [])
    {
        $paynlApi = new Api\Authenticate($this->config);
        if (isset($options['reference'])) {
            $paynlApi->setReference($options['reference']);
        }

        if (isset($options['issuerId'])) {
            $paynlApi->setIssuerId($options['issuerId']);
        }

        if (isset($options['language'])) {
            $paynlApi->setLanguage($options['language']);
        }

        if (isset($options['data']) && is_array($options['data'])) {
            $paynlApi->setIDINData($options['data']);
        }

        if (isset($options['returnUrl'])) {
            $paynlApi->setReturnUrl($options['returnUrl']);
        }

        if (isset($options['exchangeUrl'])) {
            $paynlApi->setExchangeUrl($options['exchangeUrl']);
        }

        return new Result\Authenticate($paynlApi->doRequest());
    }

    /**
     * @param array $options
     *
     * @return Result\Status
     * @throws Error
     */
    public function getStatus(array $options = [])
    {
        $paynlApi = new Api\Status($this->config);

        if (isset($options['transactionId'])) {
            $paynlApi->setTransactionId($options['transactionId']);
        }

        return new Result\Status($paynlApi->doRequest());
    }
}