<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyUserCustomerConnector\CompanyUserCustomerConnectorClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\Dependency\Client\CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridge
     */
    protected $companyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUserCustomerConnector\CompanyUserCustomerConnectorClientInterface
     */
    protected $companyUserCustomerConnectorClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUserCustomerConnectorClientInterfaceMock = $this->getMockBuilder(CompanyUserCustomerConnectorClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridge = new CompanyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridge(
            $this->companyUserCustomerConnectorClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testExpandCustomerWithCompanyUser(): void
    {
        $this->companyUserCustomerConnectorClientInterfaceMock->expects($this->atLeastOnce())
            ->method('expandCustomerWithCompanyUser')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $this->assertInstanceOf(
            CustomerTransfer::class,
            $this->companyUserCustomersRestApiToCompanyUserCustomerConnectorClientBridge->expandCustomerWithCompanyUser(
                $this->customerTransferMock
            )
        );
    }
}
