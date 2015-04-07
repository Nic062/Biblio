<?php

namespace Biblio\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
		$builder->add('nom',     'text');
		$builder->add('prenom',   'text');
		$builder->add('naissance',      'birthday');
		$builder->add('rue',      'text');
		$builder->add('ville',      'text');
		$builder->add('cp',      'text');
		$builder->add('email',      'email');
		$builder->add('tel',      'text');
	}

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'biblio_user_registration';
    }
	
}