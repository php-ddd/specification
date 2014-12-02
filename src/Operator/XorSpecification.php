<?php

namespace PhpDDD\Specification\Operator;

use phpDDD\specification\AbstractSpecification;
use phpDDD\specification\SpecificationInterface;

class XorSpecification extends AbstractSpecification implements SpecificationInterface
{

    /**
     * @var SpecificationInterface
     */
    private $specification1;

    /**
     * @var SpecificationInterface
     */
    private $specification2;

    /**
     * @param SpecificationInterface $specification1
     * @param SpecificationInterface $specification2
     */
    function __construct(SpecificationInterface $specification1, SpecificationInterface $specification2)
    {
        $this->specification1 = $specification1;
        $this->specification2 = $specification2;
    }

    /**
     * @param $object
     *
     * @return bool
     */
    public function isSatisfiedBy($object)
    {
        return $this->specification1->isSatisfiedBy($object)
               xor $this->specification2->isSatisfiedBy($object);
    }
} 