@props(['modalId' => 'primaryEventInvitationModal', 'model' => null])

<x-portal.modals.index id='{{ $modalId }}'>
    <form id="primaryEventInvitationLinkForm" class="row g-5" create-action="{{ route('portal.event-invitation-links.store') }}" edit-action="{{ route('portal.event-invitation-links.update', ['id' => $model->id ?? null]) }}" show-action="{{ route('portal.event-invitation-links.show', ['id' => $model->id ?? null]) }}">
        @csrf
        <div class="col-xl-12">
            <label class="form-label">Link Adı</label>
            <input type="text" class="form-control" name="name" value="{{ $model->name ?? null }}" placeholder="Link Adı" />
        </div>
        <div class="col-xl-12">
            <label class="form-label">Davetli Sayısı</label>
            <input type="number" min="1" step="1" class="form-control" name="guest_count" value="{{ $model->guest_count ?? null }}" placeholder="Davetli Sayısı" />
        </div>
    </form>

    <x-slot:footer>
        <x-portal.form-elements.submit-btn>Kaydet</x-portal.form-elements.submit-btn>
    </x-slot:footer>
</x-portal.modals.index>