<?php

namespace App\Http\Requests;

//use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreateProyectRequest extends FormRequest
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
        //      dd($this->route("proyecto"));
        return [
            "titulo" => "required",
            //"slug"=> ["required", "unique:proyectos,slug"],

            "slug" => [
                "required",
                Rule::unique('proyectos')->ignore($this->route('proyecto')),
            ],
            "categoria_id" => ["required", "exists:categorias,id"],
            "descripcion" => "required",
            "image" => [
                $this->route('proyecto') ? "nullable" : "required",
                "image"
            ],
        ];
    }
    public function messages(): array
    {
        return [
            "titulo.required" => "Se requiere que ingreses el titulo",
            "slug.required" => "El necesario el Url o Slug ",
            "descripcion.required" => "Es necesario que tenga descripcion",
        ];
    }
}
