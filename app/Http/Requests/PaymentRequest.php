<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Notebook\Entities\Notebook;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        ];
    }


    protected function passedValidation()
    {


        $notebook=Notebook::find($this->input('id'));

        $date=Carbon::today();

        if($date<$notebook->start_date){

            throw \Illuminate\Validation\ValidationException::withMessages(['payment'=>['لطفا سر موعده سررسید اقدام به پرداخت کنید']]);
        }
    }
}
