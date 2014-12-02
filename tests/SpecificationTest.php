<?php

namespace PhpDDD\Specification;

use PHPUnit_Framework_TestCase;

class SpecificationTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var AbstractSpecification
     */
    private $trueSpecification;

    /**
     * @var AbstractSpecification
     */
    private $falseSpecification;

    protected function setup()
    {
        $this->trueSpecification = $this->getMockForAbstractClass('PhpDDD\Specification\AbstractSpecification');
        $this->trueSpecification
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->will($this->returnValue(true));

        $this->falseSpecification = $this->getMockForAbstractClass('PhpDDD\Specification\AbstractSpecification');
        $this->falseSpecification
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->will($this->returnValue(false));
    }

    /**
     * Test (true && false) specification
     */
    public function testAndSpecWithTrueAndFalseReturns()
    {
        $specification = $this->trueSpecification->andSpec($this->falseSpecification);
        $this->assertFalse($specification->isSatisfiedBy());
    }

    /**
     * Test (true && true) specification
     */
    public function testAndSpecWithBothTrueReturns()
    {
        $specification = $this->trueSpecification->andSpec($this->trueSpecification);
        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Test (true || false) specification
     */
    public function testOrSpecWithTrueAndFalseReturns()
    {
        $specification = $this->trueSpecification->orSpec($this->falseSpecification);
        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Test (true || true) specification
     */
    public function testOrSpecWithBothTrueReturns()
    {
        $specification = $this->trueSpecification->orSpec($this->trueSpecification);
        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Test (false || false) specification
     */
    public function testOrSpecWithBothFalseReturns()
    {
        $specification = $this->trueSpecification->orSpec($this->trueSpecification);
        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Test (!false) specification
     */
    public function testNotSpecWithFalseReturn()
    {
        $specification = $this->falseSpecification->notSpec();
        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Test (!true) specification
     */
    public function testNotSpecWithTrueReturn()
    {
        $specification = $this->trueSpecification->notSpec();
        $this->assertFalse($specification->isSatisfiedBy());
    }

    /**
     * Test (true || false) specification
     */
    public function testXorSpecWithTrueAndFalseReturns()
    {
        $specification = $this->trueSpecification->xorSpec($this->falseSpecification);
        $this->assertTrue($specification->isSatisfiedBy());
    }

    /**
     * Test (true || true) specification
     */
    public function testXorSpecWithBothTrueReturns()
    {
        $specification = $this->trueSpecification->xorSpec($this->trueSpecification);
        $this->assertFalse($specification->isSatisfiedBy());
    }

    /**
     * Test (false || false) specification
     */
    public function testXorSpecWithBothFalseReturns()
    {
        $specification = $this->falseSpecification->xorSpec($this->falseSpecification);
        $this->assertFalse($specification->isSatisfiedBy());
    }
} 