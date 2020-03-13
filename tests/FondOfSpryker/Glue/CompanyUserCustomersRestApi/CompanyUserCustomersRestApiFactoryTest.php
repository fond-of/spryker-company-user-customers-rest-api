<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface;
use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Spryker\Glue\Kernel\Container;

class CompanyUserCustomersRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\CompanyUserCustomersRestApiFactory
     */
    protected $companyUserCustomersRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
     */
    protected $companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock = $this->getMockBuilder(CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserCustomersRestApiFactory = new CompanyUserCustomersRestApiFactory();
        $this->companyUserCustomersRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyUserCustomersRestApiDependencyProvider::CLIENT_COMPANY_USER_CUSTOMER)
            ->willReturn($this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock);

        $this->assertInstanceOf(
            CustomerExpanderInterface::class,
            $this->companyUserCustomersRestApiFactory->createCustomerExpander()
        );
    }
}
