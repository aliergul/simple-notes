@extends('layout')

@section('content')
   <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Notlarım</h1>
        <a href="{{ route('notes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Yeni Not
        </a>
    </div>
    <ul>
        @foreach($notes as $note)
            <li class="border-b py-4 flex justify-between items-center">
                <div>
                    <h2 class="font-bold text-lg">{{ $note->title }}</h2>
                    <p class="text-gray-600">{{ Str::limit($note->content, 50) }}</p>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('notes.edit', $note) }}" class="text-blue-500 hover:text-blue-700">Düzenle</a>
                    
                    <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Emin misin?')">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Sil</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    
    @if($notes->isEmpty())
        <p class="text-center text-gray-500 mt-5">Henüz hiç notun yok.</p>
    @endif
@endsection