<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/i18n/i18n.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/block-ui/block-ui.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/toastr/toastr.js')) }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

@livewireScripts

@yield('vendor-script')

<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<script src="{{ asset(mix('js/init.js')) }}"></script>



<script type="module">
    const init = import('/js/init.js');
  const blockUI = init.then((module) => {
    return module.blockUI;
  });
  const rebound = init.then((module) => {
    return module.rebound;
  });
</script>





@stack('component-script')


@yield('page-script')





<script>
    $(document).ready(function() {
        window.addEventListener('lwToast', event => {
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
        });
        window.addEventListener('lwBlock', event => {
            blockUI(event.detail.selector);
        });
        window.addEventListener('lwUnblock', event => {
            $(event.detail.selector).unblock();
        });
        window.addEventListener('dtRefresh', event => {
            $('#dt-refresh').click();
        });

    });
</script>


<script defer src="https://cdn.jsdelivr.net/gh/underground-works/clockwork-browser@1/dist/toolbar.js"></script>
