@extends('layouts.index')
@section('content')
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Upload an Image</h1>
    <form action="/image/store" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
 

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Choose Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-black rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition-colors">
            Upload Image
        </button>
    </form>
    <div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-4 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-4 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-4 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Uploaded At</th>
                    <th class="px-6 py-4 border-b-2 border-gray-300 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-600">{{ $image->id }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-600">
                            <img src="{{ asset('storage/' . $image->filename) }}" alt="Image" class="w-20 h-20 object-cover">
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-600">{{ $image->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm text-gray-600">
                         
                            <a href="" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                           
                            <form action="/image/destroy/{{$image->id}}" method="post" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
