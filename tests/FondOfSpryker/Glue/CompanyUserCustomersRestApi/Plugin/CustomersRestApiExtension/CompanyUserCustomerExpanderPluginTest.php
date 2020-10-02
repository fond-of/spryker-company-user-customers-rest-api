<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi\Plugin\CustomersRestApiExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyUserCustomersRestApi\CompanyUserCustomersRestApiFactory;
use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpanderInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class CompanyUserCustomerExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Plugin\CustomersRestApiExtension\CompanyUserCustomerExpanderPlugin
     */
    protected $companyUserCustomerExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyUserCustomersRestApi\CompanyUserCustomersRestApiFactory
     */
    protected $companyUserCustomersRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpanderInterface
     */
    protected $customerExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUserCustomersRestApiFactoryMock = $this->getMockBuilder(CompanyUserCustomersRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderInterfaceMock = $this->getMockBuilder(CustomerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserCustomerExpanderPlugin = new class (
            $this->companyUserCustomersRestApiFactoryMock
        ) extends CompanyUserCustomerExpanderPlugin {
            /**
             * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\CompanyUserCustomersRestApiFactory
             */
            protected $companyUserCustomersRestApiFactory;

            /**
             * @param \FondOfSpryker\Glue\CompanyUserCustomersRestApi\CompanyUserCustomersRestApiFactory $companyUserCustomersRestApiFactory
             */
            public function __construct(CompanyUserCustomersRestApiFactory $companyUserCustomersRestApiFactory)
            {
                $this->companyUserCustomersRestApiFactory = $companyUserCustomersRestApiFactory;
            }

            /**
             * @return \Spryker\Glue\Kernel\AbstractFactory
             */
            public function getFactory(): AbstractFactory
            {
                return $this->companyUserCustomersRestApiFactory;
            }
        };
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->companyUserCustomersRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderInterfaceMock);

        $this->customerExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expand')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->companyUserCustomerExpanderPlugin->expand(
                $this->customerTransferMock,
                $this->restRequestInterfaceMock
            )
        );
    }
}
