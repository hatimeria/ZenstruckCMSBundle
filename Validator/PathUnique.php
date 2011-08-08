<?php

namespace Zenstruck\Bundle\CMSBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PathUnique extends Constraint
{
    public $message = 'Path already exists.';

    public function validatedBy()
    {
        return 'zenstruck_cms.validator.path_unique';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

}
