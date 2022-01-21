<?php

namespace Vgplay\IngameItem\Actions;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Vgplay\IngameItem\Models\IngameItem;

class ItemUpdater
{

    public function update(IngameItem $item, array $data)
    {
        $data = $this->validate($item, $data);

        return $item->update($data);
    }

    protected function validate(IngameItem $item, array $data)
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
}
