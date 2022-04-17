@extends('index')

@section('tittle', 'All Articles')

@section('content')

    <div class="content-box-holst">
        @foreach($articles as $article)
            <div class="content-box-item">
                <div class="content-box-item-header">
                    <div class="content-box-item-header-avatar">
                        <img src="" alt="" width="31px" height="31px">
                    </div>
                    <div class="content-box-item-header-author">
                        {{ $article->user->name }}
                    </div>
                    <div class="content-box-item-header-created_at">
                        {{ $article->created_at->format('d-m-Y') }}
                    </div>
                    <div class="content-box-item-header-delete-store">
                        <div class="content-box-item-header-delete-store-container">
                            <a href="{{ route('articles.show', $article->id) }}">
                                <button>
                                    Редактировать
                                </button>
                            </a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Удалить">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-box-item-title">
                    {{ $article->title }}
                </div>
                <div class="content-box-item-categories">
                    Категория: {{ optional($article->category)->name_category }}
                </div>
                <div class="content-box-item-image"
                     style="background: url({{ asset('images/' . optional($article->image)->image) }})0 0/cover no-repeat;">
                    <img id="content-box-item-image-img" src="" alt="">
                </div>
                <div class="content-box-item-content">
                    {{ $article->description }}
                </div>
                <div class="content-box-item-about">
                    <div class="content-box-item-about-button">
                        <button id="content-box-item-button-about">
                            Читать дальше
                        </button>
                    </div>
                    <div class="content-box-item-about-view-comment">
                        <div class="content-box-item-about-view">
                            <div>

                                <img src="{{  asset('images/view.png') }}" alt="" width="20px" height="auto">
                            </div>
                            <div>
                                100
                            </div>
                        </div>
                        <div class="content-box-item-about-comment">
                            <div>
                                <img src="{{ asset('images/comment.png') }}" alt="" width="20px" height="auto">
                            </div>
                            <div>
                                100
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
