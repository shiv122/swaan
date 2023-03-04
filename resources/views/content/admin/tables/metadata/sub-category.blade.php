@extends("layouts/layoutMaster")

@section("title", "SubCategory")

@section("content")

<x-utils.card>
    <livewire:tables.sub-category-table addButton="add-sub-category" />
</x-utils.card>


<x-utils.offcanvas id="add-sub-category" title="Add SubCategory">
    <form id="add-sub-category-form">
        <div class="row">
            <div class="col-12">
                <x-utils.form.select name="category" :options="$categories" />
            </div>
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
    $('#add-sub-category-form').submit(async function(e) {
        e.preventDefault();
        const response = await rebound({
            route: "{{ route('admin.sub-categories.store')}}"
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
