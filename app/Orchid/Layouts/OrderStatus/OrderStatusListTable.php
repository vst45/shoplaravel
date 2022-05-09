<?php

namespace App\Orchid\Layouts\OrderStatus;

use App\Models\OrderStatus;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class OrderStatusListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orderstatuses';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->align(TD::ALIGN_CENTER)->sort(),
            TD::make('title', 'Title')->render(function (OrderStatus $orderstatus) { // render dlya ucloviy
                return $orderstatus->title;
            })->sort()->filter(TD::FILTER_TEXT)->width('300px'),
            TD::make('action')->render(function (OrderStatus $orderstatus) {


                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Edit')
                            ->icon('pencil')
                            ->modal('updateOrderStatus')
                            ->method('saveOrderStatus')
                            ->modalTitle(('Edit OrderStatus ' . $orderstatus->title))
                            ->asyncParameters([
                                'orderstatus' => $orderstatus->id
                            ]),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Delete?'))
                            ->method('remove', [
                                'id' => $orderstatus->id,
                            ]),

                    ]);
            }),

        ];
    }
}
