<?php

namespace PhpDDD\Specification;

use PhpDDD\Specification\Operator\AndSpecification;
use PhpDDD\Specification\Operator\NotSpecification;
use PhpDDD\Specification\Operator\OrSpecification;
use PhpDDD\Specification\Operator\XorSpecification;

abstract class AbstractSpecification implements SpecificationInterface
{

    /**
     * @param SpecificationInterface $specification
     *
     * @return AndSpecification|SpecificationInterface
     */
    public function andSpec(SpecificationInterface $specification)
    {
        return new AndSpecification($this, $specification);
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return OrSpecification|SpecificationInterface
     */
    public function orSpec(SpecificationInterface $specification)
    {
        return new OrSpecification($this, $specification);
    }

    /**
     * @param SpecificationInterface $specification
     *
     * @return XorSpecification|SpecificationInterface
     */
    public function xorSpec(SpecificationInterface $specification)
    {
        return new XorSpecification($this, $specification);
    }

    /**
     *
     * @return NotSpecification|SpecificationInterface
     */
    public function notSpec()
    {
        return new NotSpecification($this);
    }

    /**
     * @param mixed|null $object
     *
     * @return bool
     */
    public abstract function isSatisfiedBy($object = null);
}
