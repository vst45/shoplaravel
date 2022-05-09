<?php

namespace App\Orchid\Screens\Payment;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Orchid\Layouts\Payment\PaymentForms;
use App\Orchid\Layouts\Payment\PaymentListTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PaymentListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'payments' => Payment::filters()->defaultSort('title')->paginate(10),
            // 'payment' => Payment::find(1),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Payments';
    }

    public function description(): ?string
    {
        return 'Payment Dictionary';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Payment')->modal('createPayment')->icon('plus')->method('savePayment'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PaymentListTable::class,
            Layout::modal('createPayment', PaymentForms::class)->title('Create Payment')->applyButton('Create'),
            Layout::modal('updatePayment', PaymentForms::class)->title('Update Payment')->applyButton('Update')->async('asyncGetPayment'),
        ];
    }

    public function asyncGetPayment(Payment $payment)
    {
        return [
            'payment' => $payment
        ];
    }

    public function savePayment(PaymentRequest $request)
    {

        $dataInput = $request->validated()['payment'];

        $payment_id = $dataInput['id'];

        Payment::updateOrCreate(
            ['id' => $payment_id],
            [
                'title' => $dataInput['title']
            ]
        );

        Toast::info($payment_id ? 'Update Payment successful' : 'Create Payment successful');
    }

    public function remove(Request $request): void
    {
        Payment::findOrFail($request->get('id'))->delete();

        Toast::info(__('Payment was removed'));
    }
}
