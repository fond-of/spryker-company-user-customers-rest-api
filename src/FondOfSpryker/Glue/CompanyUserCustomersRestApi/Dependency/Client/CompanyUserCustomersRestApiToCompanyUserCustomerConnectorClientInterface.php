<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client;

use Generated\Shared\Transfer\CustomerTransfer;

interface CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithCompanyUser(CustomerTransfer $customerTransfer): CustomerTransfer;
}
