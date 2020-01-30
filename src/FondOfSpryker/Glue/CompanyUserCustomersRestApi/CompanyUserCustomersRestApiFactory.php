<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi;

use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpander;
use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class CompanyUserCustomersRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->getCompanyUserCustomerClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
     */
    protected function getCompanyUserCustomerClient(): CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
    {
        return $this->getProvidedDependency(CompanyUserCustomersRestApiDependencyProvider::CLIENT_PRODUCT_LIST_CUSTOMER);
    }
}
