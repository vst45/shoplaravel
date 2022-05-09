<?php

namespace App\Orchid\Screens\Brand;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Orchid\Layouts\Brand\BrandForms;
use App\Orchid\Layouts\Brand\BrandListTable;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BrandListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'brands' => Brand::filters()->defaultSort('title')->paginate(10),
            // 'brand' => Brand::find(1),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Brands';
    }

    public function description(): ?string
    {
        return 'Brand Dictionary';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create Brand')->modal('createBrand')->icon('plus')->method('saveBrand'),
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
            BrandListTable::class,
            Layout::modal('createBrand', BrandForms::class)->title('Create Brand')->applyButton('Create'),
            Layout::modal('updateBrand', BrandForms::class)->title('Update Brand')->applyButton('Update')->async('asyncGetBrand'),
        ];
    }

    public function asyncGetBrand(Brand $brand)
    {
        return [
            'brand' => $brand
        ];
    }

    public function saveBrand(BrandRequest $request)
    {

        $dataInput = $request->validated()['brand'];

        $brand_id = $dataInput['id'];

        Brand::updateOrCreate(
            ['id' => $brand_id],
            [
                'title' => $dataInput['title']
            ]
        );

        Toast::info($brand_id ? 'Update Brand successful' : 'Create Brand successful');
    }

    public function remove(Request $request): void
    {
        Brand::findOrFail($request->get('id'))->delete();

        Toast::info(__('Brand was removed'));
    }

}
