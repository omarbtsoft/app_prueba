@csrf
{{-- <label for="">
    Titulo de un proyecto </br>
    <input type="text" name="titulo" id=""  value="{{ @old('titulo', $proyecto->titulo) }}"></br>
</label>
<label for="">
    Url del proyecto </br>
    <input type="text" name="slug" id="" value="{{  @old('slug',$proyecto->slug) }}"></br>
</label>
<label for="">
   <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Escribe tu descripcion ">
    {{ @old('descripcion', $proyecto->descripcion) }}
   </textarea>
</label></br>
<input type="submit" value="{{ $BtnText }}">
 --}}


<div class="mb-5">
    <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo de un proyecto
    </label>
    <input type="text" id="titulo" value="{{ @old('titulo', $proyecto->titulo) }}" name="titulo"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
        placeholder="Titulo del proyecto " required />
</div>
<div class="mb-5">
    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">url del
        proyecto</label>
    <input type="text" name="slug" id="slug" value="{{ @old('slug', $proyecto->slug) }}"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
        required />
</div>
<div class="mb-5">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
    <textarea id="message" name="descripcion" rows="4"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Descripcion ">{{ @old('descripcion', $proyecto->descripcion) }}</textarea>
</div>

<div class="mb-5">
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione las
        categorias</label>
    <select name="categoria_id" id="countries"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        <option selected> Selecione una categoria</option>
        @foreach ($categorias as $key => $value)
            <option value="{{ $key }}" @if ($key == old('categoria_id',$proyecto->categoria_id) ) selected @endif>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>


<div class="mb-5">
    @isset($proyecto->image)
        <div class="img_input">
            <img class="" src="/storage/{{ $proyecto->image }}" alt="{{ $proyecto->titulo }}">
        </div>
        @endif

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Subir
            Archivo</label>
        <input name="image"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="file_input" type="file">
    </div>


    <input type="submit" value="{{ $BtnText }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"></input>
