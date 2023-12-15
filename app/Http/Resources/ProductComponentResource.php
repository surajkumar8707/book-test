<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\{User, Product, RawMaterial};

class ProductComponentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this[0]->product_uid);
        return [
            // 'product' => $this->getProduct($this[0]->product_uid),
            // 'product' => [
            //     // 'name' => $this[0]->product_uid,
            //     // 'completed' => ($this->scan == 'completed') ? true : false,
            //     'count' => $this->productScanCount($this[0]->product_uid)
            // ],
            'components' => $this->getComponents(($this->resource), $this[0]->product_uid)
        ];
    }

    // private function getProduct($product_uid)
    // {
    //     $operator = User::where(['category_uid' => $product_uid, 'order_id' => 1])->first();
    //     $product = Product::where(['uid' => $product_uid])->first();
    //     $data = [
    //         'name' => $product->product_name,
    //         'count' => $operator->count_scanning
    //     ];
    //     return $data;
    // }

    // private function productScanCount($category_uid)
    // {
    //     $operator = User::where(['category_uid' => $category_uid, 'order_id' => 1])->first();
    //     return $operator->count_scanning;
    // }

    private function getComponents($components, $category_uid)
    {
        $data = [];
        // dd($components);
        foreach ($components as $key => $component) {
            $operator = User::where(['category_uid' => $category_uid, 'order_id' => $component['order_id']])->first();
            $count_component = RawMaterial::where(array('scan' => 'completed', 'order_id' => $component['order_id'], 'product_uid' => $component['product_uid'], 'name' => $component['name']))->whereDate('created_at', '=', date('Y-m-d'))->count();
            // dd($category_uid);
            $data[] = [
                'orderId' => $component['order_id'],
                'name' => $component['name'],
                'completed' => ($component['scan'] == 'completed') ? true : false,
                // 'count' => $operator->count_scanning ?? 0,
                'count' => $count_component ?? 0,
                'component_id' => $component['uid'],
                'is_skip_component' => (!empty($component['is_skip_component'])) ? $component['is_skip_component'] : null,
                'is_skipable' => (!empty($component['is_skip_component'])) ? true : false,
            ];
        }

        $column = array_column($data, 'orderId');
        array_multisort($column, SORT_ASC, $data);
        return $data;
    }
}
