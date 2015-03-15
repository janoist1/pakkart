<?php
namespace HTD\AdminBundle\Menu;

use Symfony\Component\DependencyInjection\ContainerAware;
use Knp\Menu\FactoryInterface;


class DefaultMenuBuilder extends ContainerAware
{
    public function navbarMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('id' => 'main_navigation', 'class' => 'nav navbar-nav'));

        $menu->addChild('Home', ['route' => 'htd_admin_index']);
        $menu->addChild('Products', array('route' => 'HTD_AdminBundle_Product_list'));
        $menu->addChild('Artist', array('route' => 'HTD_AdminBundle_Artist_list'));
        $menu->addChild('Contact', array('route' => 'HTD_AdminBundle_Contact_list'));
        $menu->addChild('Logout', array('route' => 'fos_user_security_logout'));

        return $menu;
    }
}
