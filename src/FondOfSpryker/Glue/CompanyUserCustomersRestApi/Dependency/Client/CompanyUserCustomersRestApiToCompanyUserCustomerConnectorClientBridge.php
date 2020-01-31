<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client;

use FondOfSpryker\Client\CompanyUserCustomerConnector\CompanyUserCustomerConnectorClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridge implements CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
{
    /**
     * @var \FondOfSpryker\Client\CompanyUserCustomerConnector\CompanyUserCustomerConnectorClientInterface
     */
    protected $companyUserCustomerConnectorClient;

    /**
     * @param \FondOfSpryker\Client\CompanyUserCustomerConnector\CompanyUserCustomerConnectorClientInterface $companyUserCustomerConnectorClient
     */
    public function __construct(CompanyUserCustomerConnectorClientInterface $companyUserCustomerConnectorClient)
    {
        $this->companyUserCustomerConnectorClient = $companyUserCustomerConnectorClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithCompanyUser(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->companyUserCustomerConnectorClient->expandCustomerWithCompanyUser($customerTransfer);
    }
}
