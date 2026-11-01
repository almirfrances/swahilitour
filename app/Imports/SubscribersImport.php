<?php

namespace App\Imports;

use App\Models\Subscriber;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class SubscribersImport implements ToCollection, WithCustomCsvSettings, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '"',
            'escape_character' => '\\',
            'contiguous' => false,
            'input_encoding' => 'UTF-8',
        ];
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $validator = Validator::make($row->toArray(), $this->rules());
            if ($validator->fails()) {
                Log::info('Validation failed for row: ', $row->toArray());
                continue;  // Skip the row on validation failure
            }

            // Proceed to create the subscriber if validation passes
            Subscriber::create([
                'name' => $row['name'],
                'email' => $row['email'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:subscribers,email|max:255',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle the failures for each row
        foreach ($failures as $failure) {
            Log::error('Failed on row ' . $failure->row() . ' with errors: ', $failure->errors());
        }
    }
}