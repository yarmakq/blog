@extends('index')

@section('tittle', 'Show Artisle')

@section('content')
    <div class="container-show-content">
        @foreach($article as $atribute)
        <div>
            <div class="content-box-item-header">
                <div class="content-box-item-header-avatar">
                    <img src="" alt="" width="31px" height="31px">
                </div>
                <div class="content-box-item-header-author">
                    {{ $atribute->user->name }}
                </div>
                <div class="content-box-item-header-created_at">
                    {{ $atribute->created_at->format('d-m-Y') }}
                </div>
            </div>
            <div class="">
                <h1>{{ $atribute->title }}</h1>
            </div>
            <div class="">
                Категория: {{ $atribute->category->name_category }}
            </div>

            <div>
               <h3>Конент:</h3>
                {{ $atribute->description }}
            </div>
            <div>
               <h3>Дата публикации: {{ $atribute->created_at }}. by {{ $atribute->author }}</h3>
            </div>
            <div>
               <h3>Дата публикации: {{ $atribute->created_at }}. by {{ $atribute->author }}</h3>
            </div>
        </div>
        @endforeach
    </div>
@endsection
