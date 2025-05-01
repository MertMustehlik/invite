@extends("portal.template")
@section('title', 'Etkinlik')
@section('breadcrumb')
<x-portal.breadcrumb data="Etkinlik" />
@endsection
@section("master")
<form class="row">
    <div>
        <div class="card mb-5 mb-xxl-8">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ assetPortal('media/avatars/300-1.jpg') }}" alt="image">
                        </div>
                    </div>
                    <!--end::Pic-->

                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <div class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{$event->title}}</div>
                                </div>
                                <!--end::Name-->

                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-geolocation fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>Balçova/İzmir
                                    </a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->

                            <!--begin::Actions-->
                            <div class="d-flex my-4">

                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->

                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="fs-4 fw-bold mb-3">Kalan Süre</div>
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap gap-5">
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded px-6 py-2 d-flex flex-column flex-center">
                                        <!--begin::Number-->
                                        <div class="fs-2 fw-bold">176</div>
                                        <!--end::Number-->

                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Gün</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded px-6 py-2 d-flex flex-column flex-center">
                                        <!--begin::Number-->
                                        <div class="fs-2 fw-bold">21</div>
                                        <!--end::Number-->

                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Saat</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded px-6 py-2 d-flex flex-column flex-center">
                                        <!--begin::Number-->
                                        <div class="fs-2 fw-bold">39</div>
                                        <!--end::Number-->

                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Dakika</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->

                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Progress-->
                            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-semibold fs-6 text-gray-500">Davet Bilgileri</span>
                                    <span class="fw-bold fs-6">50%</span>
                                </div>

                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                    <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->


                <!--begin:::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold mt-10">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">Genel Bilgiler</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_guest_list_tab">Davetliler</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_invitation_links_tab">Davetiye Linkleri</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_media_tab">Videolar & Fotoğraflar</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Navs-->
            </div>
        </div>

        <!--begin:::Tab content-->
        <div class="tab-content">
            <!--begin:::Tab pane-->
            <div class="tab-pane fade show active card" id="kt_customer_view_overview_tab" role="tabpanel">
                <div class="card-body" id="create_edit_wedding_container">
                    <x-portal.forms.create-edit-wedding :event="$event" />
                </div>
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade card" id="kt_guest_list_tab" role="tabpanel">
                <div class="card-body">
                    asd kt_guest_list_tab
                </div>
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade" id="kt_invitation_links_tab" role="tabpanel">
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Davetiye Linkleri</h2>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <button type="button" class="btn btn-primary btn-sm d-flex flex-center invitationLinkAddBtn">
                                <i class="fa fa-plus"></i> Yeni Link Ekle
                            </button>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0 pb-5">
                        <x-portal.data-table tableId="invitationLinksDataTable">
                            <x-slot name="header">
                                <th>Link</th>
                                <th>Kaç Kişilik Davetiye</th>
                                <th>Görüntülenme Sayısı</th>
                                <th>Toplam Katılıyorum</th>
                                <th>Toplam Katılmıyorum</th>
                                <th>İşlemler</th>
                            </x-slot>

                            @if(isset($event->event_invitation_links))
                            @foreach ($event->event_invitation_links as $item)
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-900 text-hover-primary">http://localhost:8000/portal/events/105</a>
                                </td>
                                <td>{{ $item->guest_count }}</td>
                                <td>{{ $item->view_count }}</td>
                                <td>111</td>
                                <td>111</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light btn-active-light-primary invitationLinkEditBtn" data-id="{{ $item->id }}">Düzenle</button>
                                    <button type="button" class="btn btn-sm btn-light btn-active-light-danger" data-id="{{ $item->id }}">Sil</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="fs-1 fw-bold text-gray-900 mb-3">
                                            <i class="fa fa-2x fa-regular fa-clipboard"></i>
                                        </div>
                                        <div class="fs-5 fw-semibold text-gray-600">
                                            <span class="d-block">No data available</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </x-portal.data-table>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end:::Tab pane-->
            <!--begin:::Tab pane-->
            <div class="tab-pane fade card" id="kt_media_tab" role="tabpanel">
                <div class="card-body">
                    asd kt_media_tab
                </div>
            </div>
            <!--end:::Tab pane-->
        </div>
        <!--end:::Tab content-->
    </div>
</form>

<!--start::Modals-->
<x-portal.modals.primary-event-invitation-modal />
<!--end::Modals-->
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        const form = $("#primaryEventInvitationLinkForm"),
            modal = $("#primaryEventInvitationModal");

        const clearForm = () => {
            form.find("[name='name']").val("");
            form.find("[name='guest_count']").val("");
        }

        const create = () => {
            clearForm();

            modal.find('.modal-title').text('Ekle')

            form.attr('action', form.attr('create-action'));


            modal.modal('show');
        }

        const edit = (id) => {
            clearForm();

            $.ajax({
                type: 'GET',
                url: `${form.attr('show-action')}/${id}`,
                dataType: 'json',
                success: function(res) {
                    modal.find('.modal-title').text('Güncelle')

                    form.attr('action', form.attr('edit-action').replace('id', id));
                    form.find("[name='name']").val(res.name);
                    form.find("[name='guest_count']").val(res.guest_count);

                    modal.modal('show');
                }
            })
        }

        $(document).on('click', '.invitationLinkAddBtn', function() {
            create();
        });

        $(document).on('click', '.invitationLinkEditBtn', function() {
            edit($(this).attr('data-id'));
        });

        $(document).on('click', '#primaryEventInvitationModal button[type="submit"]', function() {
            $('#primaryEventInvitationLinkForm').submit();
        })
        $(document).on("submit", "#primaryEventInvitationLinkForm", function(e) {
            e.preventDefault();

            let formData = new FormData(this),
                form = $(this),
                submitButton = $(this).find("[type='submit']");

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    propSubmitButton(submitButton, 1);
                },
                success: function(res) {
                    swal.success({
                        message: res.message
                    }).then(() => window.location.reload())
                },
                error: function(xhr) {
                    swal.error({
                        message: xhr.responseJSON?.message ?? null
                    })
                },
                complete: function() {
                    propSubmitButton(submitButton, 0);
                }
            })
        })
    });
</script>
@endsection