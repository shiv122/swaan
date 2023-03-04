@extends('layouts/layoutMaster')

@section('title', 'Users')

@section('content')

<x-utils.card>
    <livewire:tables.user-table addButton="add-user" />
</x-utils.card>


<x-utils.offcanvas id="add-user" title="Add User">
    <form id="add-user-form">
        <div class="row">
            <div class="col-12">
                <x-utils.form.input type="text" name="name" label="Name" />
            </div>
            <div class="col-12">
                <x-utils.form.input type="email" name="email" label="Email" />
            </div>
            <div class="col-12">
                <x-utils.form.input type="password" name="password" label="Password" />
            </div>

            <div class="col-12 mt-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</x-utils.offcanvas>


@endsection

@section('page-script')
<script>
    $('#add-user-form').submit(async function(e) {
        e.preventDefault();
        const response = await rebound({
                route: "{{ route('admin.users.store') }}"
                , form: $(this)
            , })
            .catch(function(response) {
                console.log(response);
            });

        console.log(response);

    });

</script>
@endsection
