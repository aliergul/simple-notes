@extends('layout')

@section('content')
    <div class="max-w-lg mx-auto">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold mb-4">Yeni Not Oluştur</h2>
            <a href="{{ route('notes.index') }}" class="underline">
                Geri Dön
            </a>
        </div>
        <form action="{{ route('notes.update',$note) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <label for="title" class="font-medium text-gray-700">Başlık</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title"
                    value="{{ old('title',$note->title) }}" 
                    class="border p-2 rounded @error('title') border-red-500 @enderror"
                >
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="content" class="font-medium text-gray-700">İçerik</label>
                <textarea 
                    name="content" 
                    id="content"
                    class="border p-2 rounded @error('content') border-red-500 @enderror"
                >{{ old('content',$note->content) }}</textarea>
                
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Kaydet
            </button>
        </form>
    </div>
@endsection