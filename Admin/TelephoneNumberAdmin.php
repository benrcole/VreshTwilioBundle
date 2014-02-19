<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 19/02/2014
 * Time: 15:11
 */

namespace Vresh\TwilioBundle\Admin;

    use Sonata\AdminBundle\Admin\Admin;
    use Sonata\AdminBundle\Datagrid\ListMapper;
    use Sonata\AdminBundle\Datagrid\DatagridMapper;
    use Sonata\AdminBundle\Form\FormMapper;

class TelephoneNumberAdmin extends Admin
{


    protected $baseRouteName = 'vr_tel_admin';
    protected $baseRoutePattern = 'vr_tel_admin';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cli')
            ->add('enabled')
            ->add('sendCount')
            ->add('countryCode')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('enabled')
        ->add('countryCode')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('cli', null, array( 'route' => array('name' => 'show')))
            ->add('enabled')
            ->add('sendCount')
            ->add('countryCode')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
