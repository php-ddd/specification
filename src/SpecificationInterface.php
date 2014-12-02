<?php

namespace PhpDDD\Specification;


interface SpecificationInterface {

    /**
     * @param $object
     *
     * @return bool
     */
    public function isSatisfiedBy($object);

    /**
     * @param SpecificationInterface $specification
     *
     * @return SpecificationInterface
     */
    public function andSpec(SpecificationInterface $specification);

    /**
     * @param SpecificationInterface $specification
     *
     * @return SpecificationInterface
     */
    public function orSpec(SpecificationInterface $specification);

    /**
     * @param SpecificationInterface $specification
     *
     * @return SpecificationInterface
     */
    public function xorSpec(SpecificationInterface $specification);

    /**
     *
     * @return SpecificationInterface
     */
    public function notSpec();
}
