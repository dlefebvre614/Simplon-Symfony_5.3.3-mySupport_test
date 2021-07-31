<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Categorypost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            //->add('slug')
            ->add('description', TextareaType::class)
            ->add('content', TextareaType::class)
            ->add('urlimage', TextType::class)
            //->add('createdAt')
            //->add('updateAt')
            //->add('highlighting')
            //->add('active')
            //->add('user')
            //->add('categoryposts')
            ->add('categorypost', EntityType::class, [
                'class' => Categorypost::class
            ])

            ->add('Submit', SubmitType::class, [
                "row_attr" => ["class" => "mt-3"],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
