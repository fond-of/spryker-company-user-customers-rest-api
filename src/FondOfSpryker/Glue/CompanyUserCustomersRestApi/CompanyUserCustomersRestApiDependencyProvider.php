<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi;

use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class CompanyUserCustomersRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_COMPANY_USER_CUSTOMER = 'CLIENT_COMPANY_USER_CUSTOMER';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addCompanyUserCustomerClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addCompanyUserCustomerClient(Container $container): Container
    {
        $container[static::CLIENT_COMPANY_USER_CUSTOMER] = function (Container $container) {
            return new CompanyUserCustomersRestApiToCompanyUserCustomerClientBridge(
                $container->getLocator()->productListCustomer()->client()
            );
        };

        return $container;
    }
}
