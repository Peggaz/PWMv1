<?php
/**
 * Transaction type.
 */

namespace App\Form\Type;

use App\Entity\Category;
use App\Entity\Operation;
use App\Entity\Payment;
use App\Entity\Transaction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TransactionType.
 */
class TransactionType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @param array<string, mixed> $options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'title',
            TextType::class,
            [
                'label' => 'label.title',
                'required' => true,
                'attr' => ['max_length' => 255],
            ]
        );
        $builder->add(
            'category',
            EntityType::class,
            [
                'class' => Category::class,
                'choice_label' => function ($category): string {
                    return $category->getTitle();
                },
                'label' => 'label.category',
                'placeholder' => 'label.none',
                'required' => true,
            ]
        );
        $builder->add(
            'operation',
            EntityType::class,
            [
                'class' => Operation::class,
                'choice_label' => function ($operation): string {
                    return $operation->getTitle();
                },
                'label' => 'label.operation',
                'placeholder' => 'label.none',
                'required' => true,
            ]
        );
        $builder->add(
            'payment',
            EntityType::class,
            [
                'class' => Payment::class,
                'choice_label' => function ($payment): string {
                    return $payment->getTitle();
                },
                'label' => 'label.payment',
                'placeholder' => 'label.none',
                'required' => true,
            ]
        );
    }

    /**
     * Configures the options for this type.
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Transaction::class]);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'transaction';
    }
}
