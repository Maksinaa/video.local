<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'title' => 'required',
            'video_file' => 'required|file|mimes:mp4',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "title.required" => "Вы должны ввести название файла",
            "video_file.required" => "Необходимо выбрать файл",
            "video_file.file" => "Файл не может быть загружен на сервер",
            "video_file.mimes" => "Тип файла должен быть mp4.",

        ];
    }
}
