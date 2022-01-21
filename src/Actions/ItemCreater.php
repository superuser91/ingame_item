<?php

namespace Vgplay\IngameItem\Actions;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Vgplay\IngameItem\Models\IngameItem;

class ItemCreater
{
    public function create(array $data)
    {
        $data = $this->validate($data);

        return $this->createItem($data);
    }

    protected function validate(array $data)
    {
        $data['stats'] = json_decode($data['stats']);
        
        $validator = Validator::make($data, [
            'name' => 'required|string|max:191',
            'game_id' => 'required|integer',
            'picture' => 'nullable|string|max:2048',
            'stats' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $data;
    }

    protected function createItem(array $data)
    {
        return IngameItem::create($data);
    }
}
