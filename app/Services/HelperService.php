<?php

namespace App\Services;


class HelperService
{
    public function generateUniqeID($model, $column = "uniqe_id", $digits = 9, $prefix = ""): string
    {
        $uniqe_id = $prefix . mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        while ($this->checkIfUniqeIDExists($uniqe_id, $model, $column) === true) {
            $this->generateUniqeID($model, $column, $digits, $prefix);
        }
        return $uniqe_id;
    }

    protected function checkIfUniqeIDExists(string $uniqe_id, $model, $column): bool
    {
        $model_name = 'App\\Models\\' . ucfirst($model);
        return $model_name::where($column, $uniqe_id)->exists();
    }
}
