<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class OrderListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->align(TD::ALIGN_CENTER)->sort(),

            TD::make('date', 'Date')->render(function (Order $order) {
                return $order->created_at;
            })->sort()->filter(TD::FILTER_DATE)->width('300px'),

            TD::make('user', 'User')->render(function (Order $order) {
                return $order->user->name . ' (' . $order->user->email . ')';
            })->sort()->filter(TD::FILTER_TEXT)->width('400px'),

            TD::make('email', 'E-mail')->sort()->filter(TD::FILTER_TEXT)->width('400px'),

            TD::make('products', 'Products')->render(function (Order $order) {
                $content = '';
                foreach ($order->products as $product) {
                    $content .= $product->name. '('. $product->pivot->quantity.'x'.format_price($product->getActualPriceAttribute()). ')<br>';
                }
                return $content;
            })->sort()->filter(TD::FILTER_TEXT),


            TD::make('amount', 'Amount')->render(function (Order $order) {
                return format_price($order->amount);
            })->sort()->filter(TD::FILTER_TEXT)->width('250px'),

            TD::make('status', 'Status')->render(function (Order $order) {
                return $order->status->title;
            })->sort()->filter(TD::FILTER_TEXT)->width('250px'),

/*
            TD::make('action')->render(function (Order $order) {


                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Products')
                            ->icon('info')
                            ->modal('updateOrder')
                            ->method('saveOrder')
                            ->modalTitle(('Edit Order ' . $order->title))
                            ->asyncParameters([
                                'order' => $order->id
                            ]),

                        // ModalToggle::make('Edit')
                        //     ->icon('pencil')
                        //     ->modal('updateOrder')
                        //     ->method('saveOrder')
                        //     ->modalTitle(('Edit Order ' . $order->title))
                        //     ->asyncParameters([
                        //         'order' => $order->id
                        //     ]),

                        // Button::make(__('Delete'))
                        //     ->icon('trash')
                        //     ->confirm(__('Delete?'))
                        //     ->method('remove', [
                        //         'id' => $order->id,
                        //     ]),

                    ]);
            }),
            */

        ];
    }
}
