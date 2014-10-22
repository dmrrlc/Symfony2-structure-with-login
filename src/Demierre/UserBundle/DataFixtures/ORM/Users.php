<?php

/** run : 
 * php app/console doctrine:fixtures:load
 * for loading fixtures
 */

namespace Demierre\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Demierre\UserBundle\Entity\Image;

class Users implements FixtureInterface, ContainerAwareInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {

        $userManager = $this->container->get('fos_user.user_manager');


        $defaultImage = new Image();
        $defaultImage->setName('default.jpg');
        $defaultImage->setContentType('image/jpeg');
        $defaultImage->setSize(19996);
        $defaultImage->setPath('files/images/default.jpg');

        $manager->persist($defaultImage);
        $manager->flush();


        $useradmin = $userManager->createUser();

        $useradmin->setUsername("user");
        $useradmin->setPlainPassword('1234');
        $useradmin->setEmail("admin@demierre.me");
        $useradmin->setFirstname("Luc");
        $useradmin->setLastname("Demierre");
        $useradmin->setAddress("Rte de l'administrateur\n1700 Fribourg");
        $useradmin->setBirthdate(new \DateTime('11-11-1982'));
        $useradmin->setImage($defaultImage);
        $useradmin->setEnabled(true);
        $useradmin->setRoles(array('ROLE_ADMIN'));

        $userManager->updateUser($useradmin, true);

        $defaultImageSA = new Image();
        $defaultImageSA->setName('default.jpg');
        $defaultImageSA->setContentType('image/jpeg');
        $defaultImageSA->setSize(19996);
        $defaultImageSA->setPath('files/images/default.jpg');

        $manager->persist($defaultImageSA);
        $manager->flush();
    }

}
