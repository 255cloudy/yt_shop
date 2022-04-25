<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidType;
use App\Rules\ValidVendor;

class StoreMerchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=> ['required'],
            'type_id'=> [ 'required', new ValidType],
            'vendor_id'=> [ 'required', new ValidVendor],
            'description'=> ['required', 'max:200'],
            'photo'=> ['required', 'mimes:jpg,jpeg,png'],
            'stock'=> ['required'],
        ];
    }
}
