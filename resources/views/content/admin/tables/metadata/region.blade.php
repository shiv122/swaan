@extends("layouts/layoutMaster")

@section("title", "Region")

@section("content")

<x-utils.card>
    <livewire:tables.region-table addButton="add-region" />
</x-utils.card>


<x-utils.offcanvas id="add-region" title="Add Region">
    <form id="add-region-form">
        <div class="row">
            <div class="col-12">
                <x-utils.form.input name="name" />
            </div>
            <div class="col-12">
                <x-utils.form.input name="phone_code" />
            </div>
            <div class="col-12">
                <x-utils.form.input name="short_code" />
            </div>
            <div class="col-12">
                <x-utils.form.input name="image" type="file" :required="false" />
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
    $('#add-region-form').submit(async function(e) {
        e.preventDefault();
        const response = await rebound({
            route: "{{ route('admin.regions.store')}}"
            , form: $(this)
        , }).catch((error) => {
            console.log(error);
        });

        if (response) {
            console.log(response);
        }

    });

</script>

@endsection
