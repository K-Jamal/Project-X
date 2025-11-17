<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('image')
//            ->add('image', FileType::class, [
//                'label' => 'imageFileName (IMG file)',
//
//                // unmapped means that this field is not associated to any entity property
//                'mapped' => false,
//
//                // make it optional so you don't have to re-upload the PDF file
//                // every time you edit the Product details
//                'required' => false,
//
//                // unmapped fields can't define their validation using attributes
//                // in the associated entity, so you can use the PHP constraint classes
//                'constraints' => [
//                    new File([
//                        'maxSize' => '10240k',
//                        'extensions' => ['pdf,jpg,png,webp'],
//                        'extensionsMessage' => 'Please upload a valid Image',
//                    ])
//                ],
//            ])
            ->add('description')
            ->add('price')
            ->add('category', EntityType::class, [
                'class' => Category::class,
'choice_label' => 'name',
            ])
            ->add('submit', SubmitType::class, ['label' => 'Add Product'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
