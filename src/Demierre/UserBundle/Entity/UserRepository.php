<?php

namespace AGI\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 */
class UserRepository extends EntityRepository {

    public function findByRole($role) {
        return $this->findByRoleQuery($role)->getResult();
    }

    public function findByRoleQuery($role) {
        return $this->findByRoleQueryBuilder($role)->getQuery();
    }
    
    public function findByRoleQueryBuilder($role) {
        $query = $this->createQueryBuilder('u');
        $where = false;
        if ($role != null) {
            $where = true;
            $query->where("u.roles LIKE :role");
            $query->setParameter('role', '%"' . $role . '"%');
        }
        return $query;
    }
}
