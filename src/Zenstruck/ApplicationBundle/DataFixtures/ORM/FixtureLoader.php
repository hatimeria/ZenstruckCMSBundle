<?php
namespace Zenstruck\ApplicationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Zenstruck\ApplicationBundle\Entity\BlogPost;
use Zenstruck\ApplicationBundle\Entity\Page;

class FixtureLoader implements FixtureInterface
{    
    
    public function load($manager)
    {
        
        $post1 = new BlogPost();
        $post1->setTitle('Post 1');
        $manager->persist($post1);
        
        $post2 = new BlogPost();
        $post2->setTitle('Post 2');
        $manager->persist($post2);
        
        $post3 = new BlogPost();
        $post3->setTitle('Post 3');
        $manager->persist($post3);
        
        $page1 = new Page();
        $page1->setTitle('Page 1');
        $page1->setBody('Lorem ipsum');
        $manager->persist($page1);
        
        $page2 = new Page();
        $page2->setTitle('Page 2');
        $page2->setBody('Lorem ipsum');
        $manager->persist($page2);
        
        $manager->flush();
    }
    
}
