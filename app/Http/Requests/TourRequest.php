<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Update this logic based on your authorization needs
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:tours,name' . ($this->tour ? ',' . $this->tour->id : ''),
            'duration' => 'required|string|max:50',
            'min_age' => 'nullable|integer|min:0',
            'type_id' => 'required|exists:types,id',
            'destination_id' => 'required|exists:destinations,id',
            'overview' => 'required|string',
            'amenities' => 'nullable|array',
            'includes' => 'nullable|array',
            'excludes' => 'nullable|array',
            'tour_plan' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image file
            'pricing' => 'required|array',
            'pricing.*.month' => 'required|integer|between:1,12',
            'pricing.*.resident_price' => 'required|numeric',
            'pricing.*.foreign_price' => 'required|numeric',
            'pricing.*.discount' => 'nullable|numeric',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The tour name is required.',
            'duration.required' => 'The duration is required.',
            'min_age.integer' => 'The minimum age must be an integer.',
            'type_id.required' => 'The tour type is required.',
            'destination_id.required' => 'The destination is required.',
            'overview.required' => 'An overview is required.',
            'pricing.required' => 'Pricing information is required.',
            'pricing.*.month.required' => 'Each pricing entry must have a month.',
            'pricing.*.resident_price.required' => 'The resident price is required for each month.',
            'pricing.*.foreign_price.required' => 'The foreign price is required for each month.',
            'images.*.image' => 'Each image must be a valid image file.',
            'images.*.mimes' => 'Images must be of type jpeg, png, jpg, or gif.',
            'images.*.max' => 'Each image must not exceed 2MB.',
        ];
    }
}