@extends('layouts.index')
@section('content')
<form action="/emailing/store" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="phone" class="block text-gray-700 font-bold mb-2">Phone Number:</label>
        <input type="number" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
        <textarea id="message" name="message" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" required></textarea>
    </div>

    <div class="mb-4">
        <label for="priority" class="block text-gray-700 font-bold mb-2">Email Priority:</label>
        <select id="priority" name="priority" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" required>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>
    </div>

    <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">Submit</button>
</form>




@endsection
