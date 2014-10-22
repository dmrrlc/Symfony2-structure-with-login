<?php

namespace Demierre\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DemierreUserBundle extends Bundle
{
     public function getParent() {
        return 'FOSUserBundle';
    }
}
