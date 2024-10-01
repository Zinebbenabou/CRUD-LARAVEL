@extends("layouts.index")
@section('content')
<div>
    <form action="{{ route('emails.filter') }}" method="GET">
    <div>
        <label for="priority">Filter by Priority:</label>
        <select id="priority" name="priority">
            <option value="">All</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>
    </div>

    <div>
        <label for="read">Filter by Read Status:</label>
        <select id="read" name="read">
            <option value="">All</option>
            <option value="1">Read</option>
            <option value="0">Not Read</option>
        </select>
    </div>

    <button type="submit">Apply Filters</button>
</form>

<table class="min-w-full bg-white shadow-lg rounded-lg">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">Message</th>
            <th class="px-4 py-2">Priority</th>
            <th class="px-4 py-2">Read</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($emails as $email)
        <tr class="bg-white border-b">
            <td class="px-4 py-2">{{ $email->name }}</td>
            <td class="px-4 py-2">{{ $email->email }}</td>
            <td class="px-4 py-2">{{ $email->phone }}</td>
            <td class="px-4 py-2">{{ $email->message }}</td>
            <td class="px-4 py-2">{{ ucfirst($email->priority) }}</td>
            <td class="px-4 py-2">
                <form action="{{ route('emails.read', $email) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="read" {{ $email->read ? 'checked' : '' }} class="focus:ring focus:ring-blue-500" onchange="this.form.submit()">
                </form>
            </td>
            <td class="px-4 py-2">
                <form action="{{ route('emails.destroy', $email) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white font-bold py-1 px-2 rounded hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-500">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
