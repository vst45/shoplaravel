<?php

namespace App\Orchid\Layouts\Payment;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;

class PaymentForms extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $isPaymentExist = is_null($this->query->getContent('payment')) === false;

        return [
            Input::make('payment.title')->title('Title')->required(),
            Input::make('payment.id')->type('hidden'),
        ];
    }
}
