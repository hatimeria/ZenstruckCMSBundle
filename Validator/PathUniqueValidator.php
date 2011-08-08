<?php

namespace Zenstruck\Bundle\CMSBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

use Doctrine\ORM\EntityManager;

class PathUniqueValidator extends ConstraintValidator
{
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $pathRepository;
    /**
     * @var \Zenstruck\Bundle\CMSBundle\Repository\NodeRepository
     */
    protected $nodeRepository;

    /**
     * @param \Doctrine\ORM\EntityRepository $repository
     */
    public function __construct(EntityManager $em)
    {
        $this->pathRepository = $em->getRepository('ZenstruckCMSBundle:Path');
        $this->nodeRepository = $em->getRepository('ZenstruckCMSBundle:Node');
    }

    /**
     * @param \Zenstruck\Bundle\CMSBundle\Entity\Node $value
     * @param \Symfony\Component\Validator\Constraint $constraint
     * @return bool
     */
    public function isValid($value, Constraint $constraint)
    {
        $path = $value->getPrimaryPath();
        if (null === $path) {

            return true;
        }
        $conflicts = $this->pathRepository->findBy(array('uri' => $path->getUri()));
        if (empty($conflicts)) {

            return true;
        }

        /* @var \Zenstruck\Bundle\CMSBundle\Entity\Path $old */
        $old = $value->getOldPrimaryPath();
        if (!is_object($old)) {
            $this->setMessage($constraint->message);
            
            return false;
        }

        foreach ($conflicts as $conflict) {
            /* @var \Zenstruck\Bundle\CMSBundle\Entity\Path $conflict */
            if (($conflict->getId() != $old->getId()) && $this->nodeRepository->findOneByPath($conflict)) {
                $this->setMessage($constraint->message);
                
                return false;
            }
        }

        return true;
    }
    
}
