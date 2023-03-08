<x-app-layout>
    <x-slot name="header">
        @auth
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                自分の投稿一覧
            </h2>
        @endauth
        @guest
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                投稿一覧
            </h2>
        @endguest
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">

                    @foreach ($articles as $article)
                        <section class="text-gray-600 body-font overflow-hidden border-b-2 border-gray-200">
                            <div class="container px-10 pt-8 mx-auto">
                                <a href="{{ Auth::user() == null ? route('visitor.article.show', ['article' => $article->id]) : route('article.show', ['article' => $article->id]) }}"
                                    class="-my-8">
                                    <div class="pt-2 pb-9 flex items-center w-full">
                                        <div class="md:flex-grow w-11/12">
                                            <h2 class="text-2xl font-medium text-gray-900 title-font">
                                                {{ $article->title }}</h2>
                                            <div class="flex mb-2 mt-1">
                                                @foreach ($article->tags as $tag)
                                                    <p class="mr-3 text-sm text-blue-600">#{{ $tag->name }}</p>
                                                @endforeach
                                            </div>
                                            <span class="text-gray-500 text-sm">投稿日
                                                {{ \Carbon\Carbon::parse($article->created_at) }}</span>
                                            <p class="leading-relaxed mt-4">
                                                {{ Str::limit($article->content, 200, '...') }}</p>
                                        </div>
                                        @auth
                                            <div class="w-1/12 text-center">
                                                <form onsubmit="return confirm('投稿を削除してもよろしいですか？')"
                                                    action="{{ route('article.destroy', ['article' => $article->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">
                                                        <x-delete-icon class="" />
                                                    </button>
                                                </form>
                                            </div>
                                        @endauth
                                    </div>
                                </a>
                            </div>
                        </section>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
