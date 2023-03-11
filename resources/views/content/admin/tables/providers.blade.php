@extends('layouts/layoutMaster')

@section('title', 'Providers')

@section('content')



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


    <x-utils.modal title="Provider's Service" id="service-data">
        <div id="service-html">

        </div>
    </x-utils.modal>


@endsection





@section('page-script')
    <script>
        $(document).on('click', '[data-getter-service]', async function(e) {
            e.preventDefault();
            const id = $(this).data('getter-service');
            const response = await rebound({
                route: '{{ route('admin.providers.services') }}',
                data: {
                    id: id
                },
                method: 'GET',
                processData: true,
                notification: false,
            })

            if (response) {
                $('#service-html').html(response.html);
                $('#service-data').modal('show');
            }

        });
    </script>
@endsection
