<?php

namespace App\Orchid\Layouts\OrderStatus;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;

class OrderStatusForms extends Rows
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
        $isOrderStatusExist = is_null($this->query->getContent('orderstatus')) === false;

        return [
            Input::make('orderstatus.title')->title('Title')->required(),
            Input::make('orderstatus.id')->type('hidden'),
        ];
    }
}
