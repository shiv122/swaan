@extends("layouts/layoutMaster")

@section("title", "Providers")

@section("content")

<x-utils.card>
    <livewire:tables.provider-table />
</x-utils.card>


<x-utils.offcanvas id="add-provider" title="Add Provider">
    <form id="add-provider-form">
        <div class="row">

            <div class="col-12">
                <x-utils.form.input name="name" />
            </div>
            <div class="col-12">
                <x-utils.form.input type="file" name="image" />
            </div>

            <div class="col-12 mt-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</x-utils.offcanvas>


@endsection

@section("page-script")
<script>


</script>
@endsection
