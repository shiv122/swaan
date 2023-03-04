@extends("layouts/layoutMaster")

@section("title", "Category")

@section("content")

<x-utils.card>
    <livewire:tables.category-table addButton="add-category" />
</x-utils.card>


<x-utils.offcanvas id="add-category" title="Add Category">
    <form id="add-category-form">
        <div class="row">
            <div class="col-12">
                <x-utils.form.input name="name" />
            </div>

            <div class="col-12">
                <x-utils.form.select :required="false" name="region" :multiple="true" :options="$regions" label="Select region (leave blank if all)" />
            </div>
            <div class="col-12">
                <x-utils.form.input :required="false" name="image" type="file" :attrs="[
                'accept'=> 'image/*',
                'capture'=> 'camera',
              ]" />
            </div>
            <div class="col-12">
                <x-utils.form.input :required="false" name="description" type="textarea" />
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
    $('#add-category-form').submit(async function(e) {
        e.preventDefault();
        const response = await rebound({
            route: "{{ route('admin.categories.store')}}"
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
