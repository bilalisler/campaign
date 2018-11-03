<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 23.05.2018
 * Time: 17:27
 */
namespace App\Configuration;

use EasyCorp\Bundle\EasyAdminBundle\Configuration\MenuConfigPass as BaseMenuConfigPass;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Twig\Token;


class CustomMenuConfigPass extends BaseMenuConfigPass
{

    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * MenuConfigPass constructor.
     * @param TokenStorage $tokenStorage
     */
    public function __construct(TokenStorage $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }


    /**
     * This method implements role checker to the menu config pass
     *
     * @param array $backendConfig
     * @return array
     */
    public function process(array $backendConfig)
    {
        foreach ($backendConfig['design']['menu'] as $index => $menuItem) {

            if(!is_array($menuItem)) {
                continue;
            }

            $roleCheck = function ($roles,$role1){
                foreach ($roles as $role){
                    if(in_array($role->getRole(),$role1)){
                        return true;
                    }
                }
                return false;
            };

            $userCurrentRoles = $this->tokenStorage->getToken()->getRoles();

            if(array_key_exists('roles', $menuItem)) {
                if(! $roleCheck($userCurrentRoles,$menuItem['roles'])) {
                    unset($backendConfig['design']['menu'][$index]);
                }
            }
        }

        return parent::process($backendConfig);
    }


}