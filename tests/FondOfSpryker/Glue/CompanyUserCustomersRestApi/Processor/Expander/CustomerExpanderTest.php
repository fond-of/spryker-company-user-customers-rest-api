<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Processor\Expander\CustomerExpander
     */
    protected $customerExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface
     */
    protected $companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock = $this->getMockBuilder(CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpander = new CustomerExpander(
            $this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerWithCompanyUser')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->customerExpander->expand(
                $this->customerTransferMock
            )
        );
    }
}
