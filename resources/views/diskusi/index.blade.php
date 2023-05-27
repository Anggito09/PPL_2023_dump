@extends("layouts.main")
@section("content")
    <main class="pt-4 bg-bg1 bg-cover h-screen">
        @include("components.navbar")
        <div class="flex flex-col items-center p-4">
            <h1 class="font-bold text-3xl">Ruang Diskusi</h1>
            <div class="w-full p-4 rounded-xl bg-secondary">
                @auth
                    <form action="/diskusi" method="POST"
                          class="w-full flex items-start bg-primary p-2 rounded-xl gap-2">
                        @csrf
                        <img src="{{auth()->user()->dp?"/".auth()->user()->dp:"/images/icon4.png"}}" alt=""
                             class="w-14 h-14 rounded-full border-2 border-dark-green">
                        <textarea name="topic" class="resize-none flex-grow"></textarea>
                        <button class="btn btn-primary px-8">Post</button>
                    </form>
                @endauth
                <div class="w-full flex flex-col gap-4 mx-2 mt-8">
                    @foreach($diskusis as $diskusi)
                        <div class="flex gap-8 px-2">
                            <img src="{{$diskusi->user->dp?"/".$diskusi->user->dp:"/images/icon4.png"}}" alt=""
                                 class="w-14 h-14 rounded-full border-2 border-dark-green">
                            <div class="flex-grow">
                                <div class="flex items-end justify-between">
                                    <h2 class="font-bold text-2xl">{{$diskusi->topic}}</h2>
                                    <h2 class="font-medium text-lg">{{$diskusi->created_at}}</h2>
                                </div>
                                <div class="flex gap-4">
                                    <p class="italic">Oleh <a href="/profile/{{$diskusi->user->id}}"
                                                              class="font-bold">{{$diskusi->user->name}}</a></p>
                                    @auth
                                        <button class="font-bold" data-modal-target="comment{{$diskusi->id}}-modal"
                                                data-modal-toggle="comment{{$diskusi->id}}-modal">Balas
                                        </button>
                                    @endauth

                                    <div id="comment{{$diskusi->id}}-modal" tabindex="-1" aria-hidden="true"
                                         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-h-full">
                                            <div class="relative bg-secondary rounded-lg shadow">
                                                <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-hide="comment{{$diskusi->id}}-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="px-6 py-6 lg:px-8">
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900">Comment</h3>
                                                    <form class="space-y-6" method="post"
                                                          action="/comment/{{$diskusi->id}}">
                                                        @csrf
                                                        <div>
                                                            <h2 class="font-bold text-2xl">{{$diskusi->topic}}</h2>
                                                            <div class="flex gap-4">
                                                                <p class="italic">Oleh {{$diskusi->user->name}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-start gap-2">
                                                            <textarea name="comment"
                                                                      class="resize-none flex-grow"></textarea>
                                                            <button class="btn btn-primary px-8">Post</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 w-full flex flex-col gap-2">
                                    @foreach($diskusi->diskusiKomens as $komen)
                                        <div class="w-full flex justify-between items-end">
                                            <p>{{$komen->comment}}</p>
                                            <p class="italic text-end">Dibalas Oleh <a
                                                    href="/profile/{{$komen->user->id}}"
                                                    class="font-bold">{{$komen->user->name}}</a></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="h-1 bg-slate-500/40"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@stop
