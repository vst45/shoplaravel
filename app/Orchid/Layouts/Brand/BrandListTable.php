<?php

namespace App\Orchid\Layouts\Brand;

use App\Models\Brand;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class BrandListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'brands';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->align(TD::ALIGN_CENTER)->sort(),
            TD::make('title', 'Title')->render(function (Brand $brand) { // render dlya ucloviy
                return $brand->title;
            })->sort()->filter(TD::FILTER_TEXT),
            TD::make('action')->render(function (Brand $brand) {


                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Edit')
                            ->icon('pencil')
                            ->modal('updateBrand')
                            ->method('saveBrand')
                            ->modalTitle(('Edit Brand ' . $brand->title))
                            ->asyncParameters([
                                'brand' => $brand->id
                            ]),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Delete?'))
                            ->method('remove', [
                                'id' => $brand->id,
                            ]),

                    ]);
            }),

        ];
    }
}
