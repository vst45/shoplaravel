<?php

namespace App\Orchid\Screens\Order;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Orchid\Layouts\Order\OrderForms;
use App\Orchid\Layouts\Order\OrderListTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders' => Order::filters()->defaultSort('created_at')->paginate(10),
            // 'order' => Order::find(1),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Orders';
    }

    public function description(): ?string
    {
        return 'Order List';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            // ModalToggle::make('Create Order')->modal('createOrder')->icon('plus')->method('saveOrder'),
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
            OrderListTable::class,
            // Layout::modal('createOrder', OrderForms::class)->title('Create Order')->applyButton('Create'),
            // Layout::modal('updateOrder', OrderForms::class)->title('Update Order')->applyButton('Update')->async('asyncGetOrder'),
        ];
    }

    public function asyncGetOrder(Order $order)
    {
        return [
            'order' => $order
        ];
    }

    // public function saveOrder(OrderRequest $request)
    // {

    //     $dataInput = $request->validated()['order'];

    //     $order_id = $dataInput['id'];

    //     Order::updateOrCreate(
    //         ['id' => $order_id],
    //         [
    //             'title' => $dataInput['title']
    //         ]
    //     );

    //     Toast::info($order_id ? 'Update Order successful' : 'Create Order successful');
    // }

    // public function remove(Request $request): void
    // {
    //     Order::findOrFail($request->get('id'))->delete();

    //     Toast::info(__('Order was removed'));
    // }

}
