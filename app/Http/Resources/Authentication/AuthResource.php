<?php

namespace App\Http\Resources\Authentication;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uid' => $this->uid,
            'fullName' => $this->name,
            'email' => $this->email,
            // 'status' => ($this->status == 1) ? 'active' : 'inactive',
            'productUid' => $this->category_uid,
            'orderId' => $this->order_id,
            'operatorCode' => $this->operator_code,
            'token' => $this->token,
            // 'modelNumber' => $this->getModelNumber($this->category_uid, $this->order_id),
            // 'componentDetail' => $this->getRawMaterial($this->category_uid, $this->order_id),
        ];
    }
}
