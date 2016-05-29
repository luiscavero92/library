<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CopyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('article', EntityType::class, array('class' => 'AppBundle\Entity\Article', 'invalid_message' => 'Article ID is not valid'))
            ->add('copyNumber')
            ->add('addedOn', DateType::class, array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'invalid_message' => 'Date format is invalid'))
            ->add('note')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'AppBundle\Entity\Copy'
        ));
    }

    public function getName()
    {
        return('copy');
    }
}
