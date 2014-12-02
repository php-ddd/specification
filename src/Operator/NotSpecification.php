<?php

namespace PhpDDD\Specification\Operator;

use phpDDD\specification\AbstractSpecification;
use phpDDD\specification\SpecificationInterface;

class NotSpecification extends AbstractSpecification implements SpecificationInterface
{

    /**
     * @var SpecificationInterface
     */
    private $specification;

    /**
     * @param SpecificationInterface $specification
     */
    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    /**
     * @param $object
     *
     * @return bool
     */
    public function isSatisfiedBy($object)
    {
        return !$this->specification->isSatisfiedBy($object);
    }
}
