<?php

namespace App\Orchid\Layouts\Payment;

use App\Models\Payment;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class PaymentListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'payments';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->width('100px')->align(TD::ALIGN_CENTER)->sort(),
            TD::make('title', 'Title')->render(function (Payment $payment) { // render dlya ucloviy
                return $payment->title;
            })->sort()->filter(TD::FILTER_TEXT)->width('300px'),
            TD::make('action')->render(function (Payment $payment) {


                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Edit')
                            ->icon('pencil')
                            ->modal('updatePayment')
                            ->method('savePayment')
                            ->modalTitle(('Edit Payment ' . $payment->title))
                            ->asyncParameters([
                                'payment' => $payment->id
                            ]),

                        Button::make(__('Delete'))
                            ->icon('trash')
                            ->confirm(__('Delete?'))
                            ->method('remove', [
                                'id' => $payment->id,
                            ]),

                    ]);
            }),

        ];
    }
}
