<x-app>

    @push('meta-title')
        <title>Create New Group</title>
    @endpush
    <div class="container mt-5">
        <form method="POST" action="{{ route('group.store') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Enter Group Name: </label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Group Name Here..." autofocus>

                {{-- old() will refill the form old value if there occurs a validation error. --}}
                {{-- $message is globally available by laravel to display error message --}}
                {{-- message will be generated through controller from store() data validation --}}
                @error('name')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary px-5">Submit</button>
        </form>
    </div>

</x-app>
