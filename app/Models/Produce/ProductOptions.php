<?php

namespace App\Models\Produce;

use App\Models\SearchEngine\SearchOptions;

class ProductOptions extends SearchOptions
{
    public function __construct(array $options)
    {
        parent::__construct($options);

        $this->addCondition('id', '=', $options['products_ids'] ?? null);
        $this->addCondition('category_id', '=', $options['category_id'] ?? null);
        $this->addCondition('price', '>=', $options['min_price'] ?? null);
        $this->addCondition('price', '<=', $options['max_price'] ?? null);
    }
}
