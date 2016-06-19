<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('subtitle', null, array('required' => false))
            ->add('refNumber')
            ->add('editionYear', null, array('required' => false))
            ->add('isbn')
            ->add('publisher')
            ->add('legalDeposit', null, array('required' => false))
            ->add('cdu', EntityType::class, array('class' => 'AppBundle\Entity\CDU', 'invalid_message' => 'CDU ID is not valid'))
            ->add('location', null, array('required' => false))
            ->add('category', EntityType::class, array('class' => 'AppBundle\Entity\Category', 'invalid_message' => 'Category ID is not valid'))
            ->add('note', null, array('required' => false))
            ->add('loanable')
            ->add('authors', CollectionType::class, array('allow_add' => true))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'AppBundle\Entity\Article'
        ));
    }

    public function getName()
    {
        return('article');
    }
}
