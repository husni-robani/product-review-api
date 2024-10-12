<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ReviewResource extends JsonResource
{
    protected static bool $includeProduct = false;

    /**
     * Set is data include product or not
     *
     * @param bool $includeProduct
     * @return void
     */
    public static function includeProduct(bool $includeProduct): void
    {
        self::$includeProduct = $includeProduct;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $data =  [
            'id' => $this->id,
            'review' => $this->review_text,
            'rate' => $this->rate
        ];

        if (self::$includeProduct){
            $data['product'] = [
                'id' => $this->product->id,
                'name' => $this->product->name
            ];
        }
        return $data;

    }
}
