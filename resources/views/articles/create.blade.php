@extends('index')

@section('tittle', 'Add Articles')

@section('content')

    <div class="container-add-articles">
        <form class="container-add-articles-form" action="{{ route('articles.store') }} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="container-add-articles-tittle">
                <div class="container-add-articles-tittle-category">
                    Заголовок
                </div>

                <textarea name="title" id="" cols="30" rows="2"></textarea>
            </div>

            <div class="container-add-articles-category">
                <div>
                    Категория
                </div>

                <select name="category_id" id="">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name_category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <div>
                    Краткое описание
                </div>

                <textarea name="little_description" id="" cols="30" rows="10">

            </textarea>
            </div>
            <div>
                <div>
                    Полное описание
                </div>

                <textarea name="description" id="" cols="30" rows="20">

            </textarea>
            </div>
            <div>
                Картинка
            </div>

            <input type="file" name="image" accept="image/png, image/jpeg">

            <div class="container-add-articles-form-submit">
                <input type="submit">
            </div>
        </form>
    </div>
@endsection
