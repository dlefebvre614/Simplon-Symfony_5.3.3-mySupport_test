<?php

namespace App\Form;

use App\Entity\Categorypost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategorypostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('name')
            ->add('name', TextType::class, [
                "label" => "Category name",
            ])

            // ->add('slug', TextType::class, [
            //     "label" => "Category slub",
            // ])   // comment after slug management

            //->add('parentpost', TextType::class, [
            //    "label" => "Category parent",
            //    "required" => false,
            //])  

            //->add('parentpost') // could not be converted to string ?

            ->add('parentpost', EntityType::class, [
                'class' => Categorypost::class,
                'label' => 'Category parent',
                'multiple' => false,
                'choice_label' => 'name',
                'expanded' => true,
                'by_reference' => false
            ])

            ->add('Submit', SubmitType::class, [
                "row_attr" => ["class" => "mt-3"],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categorypost::class,
        ]);
    }
}