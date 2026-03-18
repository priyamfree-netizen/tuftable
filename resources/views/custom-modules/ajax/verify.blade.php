<div class="modal-body">
    <form id="verify-form" class="space-y-4">
        @csrf
        <p class="bg-gray-600 p-2 rounded text-white">For Domain:- {{ request()->getHost() }}</p>

        <div class="text-sm">Module: <b>{{ucwords($module)}}</b></div>

        <p>
            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Note:</span>
            Enter your purchase code to verify the module.
        </p>
        <div id="response-message"></div>

        <div class="w-full form-group">
            <x-label>Enter your purchase code</x-label>
            <x-input type="text" id="purchase_code" name="purchase_code" class="w-full mt-1 form-control"  placeholder="{{__('placeholders.purchaseCode')}}" />
        </div>
        <input type="hidden" id="module" name="module" value="{{ $module }}">

        <x-button id="save-module-verify" icon="check">Verify</x-button>
    </form>
</div>


<script>
    $('#save-module-verify').click(function () {

        const url = "{{ route('superadmin.custom-modules.verify_purchase') }}";
        $.easyAjax({
            url: url,
            container: '#verify-form',
            type: "POST",
            messagePosition: 'inline',
            disableButton: true,
            blockUI: true,
            buttonSelector: "#save-module-verify",
            data: $('#verify-form').serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    window.location.reload();
                }
            }
        })
    });

</script>
