<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander;

use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
     */
    protected $companyUserCustomerConnectorClient;

    /**
     * @param \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface $companyUserCustomerConnectorClient
     */
    public function __construct(
        CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface $companyUserCustomerConnectorClient
    ) {
        $this->companyUserCustomerConnectorClient = $companyUserCustomerConnectorClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expand(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->companyUserCustomerConnectorClient->expandCustomerWithCompanyUser($customerTransfer);
    }
}
