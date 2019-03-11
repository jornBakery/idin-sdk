<?php
/**
 * Created by PhpStorm.
 * User: jorn
 * Date: 6-3-19
 * Time: 10:09
 */

namespace Paynl\IDIN\Result;


class GetIssuers extends Result
{
    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->data['issuers'];
    }

    /**
     * @param String $issuer
     *
     * @return array
     */
    public function get(String $issuer): array
    {
        if ( ! isset($this->data['issuers'][$issuer])) {
            return [];
        }

        return $this->data['issuers'][$issuer];
    }
}