<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LoanType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reader', EntityType::class, array('class' => 'AppBundle\Entity\Reader', 'invalid_message' => 'Reader ID is not valid'))
            ->add('copy', EntityType::class, array('class' => 'AppBundle\Entity\Copy', 'invalid_message' => 'Copy ID is not valid'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'AppBundle\Entity\Loan'
        ));
    }

    public function getName()
    {
        return('loan');
    }
}
