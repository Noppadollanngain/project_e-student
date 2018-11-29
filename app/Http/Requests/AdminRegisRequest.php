<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisRequest extends FormRequest
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
            "username"=> 'required',
            "password"=> 'required',
            "password_confirmation"=> 'required',
            "mail"=> 'required',
            "possition" => 'required',
            "fname"=> 'required',
            "lname"=> 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages() {
        return [
            "username.required"=> 'กรุณากรอกข้อมูล username',
            "password.required"=> 'กรุณากรอกข้อมูล password',
            "password_confirmation.required"=> 'กรุณากรอกข้อมูล confirm password',
            "possition.required" => 'กรุณาเลือกตำแหน่ง',
            "mail.required"=> 'กรุณากรอกข้อมูล E-Mail',
            "fname.required"=> 'กรุณากรอกข้อมูลชื่อ',
            "lname.required"=> 'กรุณากรอกข้อมูลนามสุกล',
            'image.mimes' => 'กรุณาเลือกไฟล์ภาพนามสกุล jpeg,jpg,png',
        ];
    }
}
