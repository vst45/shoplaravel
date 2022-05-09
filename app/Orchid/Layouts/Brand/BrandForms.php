<?php

namespace App\Orchid\Layouts\Brand;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;

class BrandForms extends Rows
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
        $isBrandExist = is_null($this->query->getContent('brand')) === false;

        return [
            Input::make('brand.title')->title('Title')->required(),
            Input::make('brand.id')->type('hidden'),
        ];
    }
}
