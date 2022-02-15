<x-app-without-search>

    @push('meta-title')
        <title>DB Data Normalization</title>
    @endpush

    <div class="container">
        <form action="{{ route('groups.data') }}" method="get">
            <div class="form-group">
                <label for="group" class="d-block m-0 p-0">Please Select a Group to Show Form: </label>
                <select class="form-control d-inline mr-5 col-md-6 overflow-y" name="group">
                    @forelse ($allGroups as $group)
                        <option value="{{ $group->id }}" @if ($group->id == request('group')) selected @endif>
                            {{ $group->name }}</option>
                    @empty
                        <option disabled>No Groups Found</option>
                    @endforelse
                </select>

                <button class="btn btn-outline-info px-5 my-4" type="submit">Show Form</button>
            </div>
        </form>
    </div>

    <div class="container rounded p-4" style="background-color: #e3f2fd;">
        <form method="POST" action="{{ route('group.data.store') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                @forelse ($allTypes as $type)
                    <label class="mt-4">{{ $type->name }}:</label>
                    <input type="text" class="form-control" name="{{ $type->name }}">
                    <input type="hidden" name="selected_group" value="{{ request('group') }}">
                @empty
                    <h3 class="bg-danger text-center text-light py-5 m-3">This Group Yet Has Nothing To Fill In.</h3>
                @endforelse

                @if (!$allTypes->isEmpty())
                    <button type="submit" class="btn btn-outline-info mt-5 px-5 py-3 mx-auto d-block">SUBMIT</button>
                @endif
            </div>
        </form>
    </div>

</x-app-without-search>
