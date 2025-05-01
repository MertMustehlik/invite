@extends('portal.template')
@section('title', 'Etkinlik Oluştur')
@section('styles')
<style>
    textarea[name="etkinlik_programı"]::placeholder {
        font-size: 0.9rem;
    }
</style>
@endsection
@section('breadcrumb')
<x-portal.breadcrumb data="Etkinlik Oluştur" />
@endsection
@section("master")
<!-- step1: Slogan ve Tip Seçimi
    step2: Kişisel Bilgiler
    step3: Etkinlik Bilgileri (etkinlik programı textarea olabilir)
    step4: Katılım Formu
    step5: Tema Seçimi
    step6: Etkinlik Oluştur -->

<div class="card">
    <div class="card-body" id="create_edit_wedding_container">
        <x-portal.forms.create-edit-wedding />
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ assetPortal('plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#team_repeater_condition_area').repeater({
            initEmpty: false,

            show: function() {
                $(this).slideDown();
                $(this).find('[data-kt-repeater="select2"]').select2();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            },

            ready: function() {
                $('[data-kt-repeater="select2"]').select2();
            }
        });
    })
</script>
@endsection