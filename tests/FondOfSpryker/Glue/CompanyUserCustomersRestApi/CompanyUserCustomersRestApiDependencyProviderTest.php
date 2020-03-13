<?php

namespace FondOfSpryker\Glue\CompanyUserCustomersRestApi;

use Codeception\Test\Unit;
use Spryker\Glue\Kernel\Container;

class CompanyUserCustomersRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUserCustomersRestApi\CompanyUserCustomersRestApiDependencyProvider
     */
    protected $companyUserCustomersRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserCustomersRestApiDependencyProvider = new CompanyUserCustomersRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyUserCustomersRestApiDependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}
