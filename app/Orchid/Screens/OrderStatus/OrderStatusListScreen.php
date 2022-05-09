<?php

namespace App\Orchid\Screens\OrderStatus;

use App\Http\Requests\OrderStatusRequest;
use App\Models\OrderStatus;
use App\Orchid\Layouts\OrderStatus\OrderStatusForms;
use App\Orchid\Layouts\OrderStatus\OrderStatusListTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderStatusListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orderstatuses' => OrderStatus::filters()->defaultSort('title')->paginate(10),
            // 'orderstatus' => OrderStatus::find(1),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Order Statuses';
    }

    public function description(): ?string
    {
        return 'Order Status Dictionary';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create OrderStatus')->modal('createOrderStatus')->icon('plus')->method('saveOrderStatus'),
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
            OrderStatusListTable::class,
            Layout::modal('createOrderStatus', OrderStatusForms::class)->title('Create OrderStatus')->applyButton('Create'),
            Layout::modal('updateOrderStatus', OrderStatusForms::class)->title('Update OrderStatus')->applyButton('Update')->async('asyncGetOrderStatus'),
        ];
    }

    public function asyncGetOrderStatus(OrderStatus $orderstatus)
    {
        return [
            'orderstatus' => $orderstatus
        ];
    }

    public function saveOrderStatus(OrderStatusRequest $request)
    {

        $dataInput = $request->validated()['orderstatus'];

        $orderstatus_id = $dataInput['id'];

        OrderStatus::updateOrCreate(
            ['id' => $orderstatus_id],
            [
                'title' => $dataInput['title']
            ]
        );

        Toast::info($orderstatus_id ? 'Update OrderStatus successful' : 'Create OrderStatus successful');
    }

    public function remove(Request $request): void
    {
        OrderStatus::findOrFail($request->get('id'))->delete();

        Toast::info(__('OrderStatus was removed'));
    }

}
