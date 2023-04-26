@extends("layouts.main")
@section("content")
    <main class="h-screen pt-4 bg-bg1">
        @include("components.navbar")
        <div class="flex mx-8 mt-8 gap-8">
            <div class="bg-secondary w-1/4 py-4 rounded-xl">
                <div class="px-8 mb-8">
                    <div class="w-16 h-16 rounded-full border-2 border-green"></div>
                    <h2 class="capitalize font-bold text-xl">{{auth()->user()->name}}</h2>
                    <h3 class="capitalize">{{auth()->user()->role->role_name}}</h3>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="/akunpetani" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Petani</a>
                    <a href="/akuninvestor" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Investor</a>
                    <a href="/akunpakar" class="font-medium text-lg bg-secondary drop-shadow-lg py-1 px-8">Akun
                        Pakar</a>
                </div>
            </div>
            <form action="/editpakar/{{$pakar->id}}" method="POST"
                  class="bg-secondary w-3/4 flex flex-col items-center gap-8 p-8 rounded-xl">
                @csrf
                <h1 class="font-bold text-3xl w-full">Edit Profil</h1>
                <div class="flex w-full gap-2">
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">Nama</h2>
                            <input class="form-input w-full" type="text" name="name" id="name" placeholder="Name"
                                   value="{{$pakar->name}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Gender</h2>
                            <input class="form-input w-full" type="text" name="gender" id="gender" placeholder="Name"
                                   value="{{$pakar->gender}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Email</h2>
                            <input class="form-input w-full" type="text" name="email" id="email" placeholder="Name"
                                   value="{{$pakar->email}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Password</h2>
                            <input class="form-input w-full" type="password" name="password" id="password"
                                   placeholder="Password">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Konfirmasi Password</h2>
                            <input class="form-input w-full" type="password" name="password_confirmation"
                                   id="password_confirmation"
                                   placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-1/2">
                        <div>
                            <h2 class="font-medium text-lg">No Hp</h2>
                            <input class="form-input w-full" type="text" name="phone" id="phone" placeholder="Name"
                                   value="{{$pakar->phone}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Gelar</h2>
                            <input class="form-input w-full" type="text" name="gelar" id="gelar" placeholder="Name"
                                   value="{{$pakar->gelar}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">NPWP</h2>
                            <input class="form-input w-full" type="text" name="npwp" id="npwp" placeholder="Name"
                                   value="{{$pakar->npwp}}">
                        </div>
                        <div>
                            <h2 class="font-medium text-lg">Alamat</h2>
                            <input class="form-input w-full" type="text" name="address" id="address" placeholder="Name"
                                   value="{{$pakar->address}}">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary px-12">Simpan</button>
                    <a href="/akunpakar" class="btn btn-secondary px-12">Batal</a>
                </div>
            </form>
        </div>
    </main>
@stop
