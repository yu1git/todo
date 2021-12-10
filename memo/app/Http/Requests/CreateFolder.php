<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFolder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //リクエストを受け付ける
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'title'はinput 要素の name 属性も対応
            'title' => 'required|max:20',
        ];
    }

    //入力欄の名称を日本語に
    public function attributes()
    {
        return [
            'title' => 'フォルダ名',
        ];
    }
}
