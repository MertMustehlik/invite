@props(['event' => null])
@use('App\Models\Event')
<!--begin::Stepper-->
<div class="stepper stepper-pills" id="kt_stepper_add_event">
    <!--begin::Nav-->
    <div class="stepper-nav flex-center flex-wrap mb-10">
        <!--begin::Step 1-->
        <div class="stepper-item mx-4 my-4 current w-200px w-xl-auto" data-kt-stepper-element="nav">
            <!--begin::Wrapper-->
            <div class="stepper-wrapper d-flex align-items-center">
                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px me-3">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">1</span>
                </div>
                <!--end::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title mb-0">
                        Kategori Seçimi
                    </h3>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Line-->
            <div class="stepper-line h-40px"></div>
            <!--end::Line-->
        </div>
        <!--end::Step 1-->

        <!--begin::Step 2-->
        <div class="stepper-item mx-4 my-4 w-200px w-xl-auto" data-kt-stepper-element="nav">
            <!--begin::Wrapper-->
            <div class="stepper-wrapper d-flex align-items-center">
                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px me-3">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">2</span>
                </div>
                <!--begin::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title mb-0">
                        Kişi Bilgileri
                    </h3>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Line-->
            <div class="stepper-line h-40px"></div>
            <!--end::Line-->
        </div>
        <!--end::Step 2-->

        <!--begin::Step 3-->
        <div class="stepper-item mx-4 my-4 w-200px w-xl-auto" data-kt-stepper-element="nav">
            <!--begin::Wrapper-->
            <div class="stepper-wrapper d-flex align-items-center">
                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px me-3">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">3</span>
                </div>
                <!--begin::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title mb-0">
                        Etkinlik Bilgileri
                    </h3>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Step 3-->

        <!--begin::Step 4-->
        <div class="stepper-item mx-4 my-4 w-200px w-xl-auto" data-kt-stepper-element="nav">
            <!--begin::Wrapper-->
            <div class="stepper-wrapper d-flex align-items-center">
                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px me-3">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">4</span>
                </div>
                <!--begin::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title mb-0">
                        Misafir Yönetimi
                    </h3>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Step 4-->

        <!--begin::Step 5-->
        <div class="stepper-item mx-4 my-4 w-200px w-xl-auto" data-kt-stepper-element="nav">
            <!--begin::Wrapper-->
            <div class="stepper-wrapper d-flex align-items-center">
                <!--begin::Icon-->
                <div class="stepper-icon w-40px h-40px me-3">
                    <i class="stepper-check fas fa-check"></i>
                    <span class="stepper-number">5</span>
                </div>
                <!--begin::Icon-->

                <!--begin::Label-->
                <div class="stepper-label">
                    <h3 class="stepper-title mb-0">
                        Tema Seçimi
                    </h3>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Step 5-->
    </div>
    <!--end::Nav-->

    <!--begin::Form-->
    <form class="form container px-lg-20 mx-auto" novalidate="novalidate" id="kt_stepper_add_event_form">
        @csrf
        <!--begin::Group-->
        <div class="mb-5">
            <!--begin::Step 1-->
            <div class="flex-column current" data-kt-stepper-element="content">
                <div class="row g-5">
                    <div class="col-12 field-area">
                        <!--begin::Label-->
                        <label class="form-label">Etkinlik Sloganı</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input type="text" class="form-control" name="title" placeholder="Evleniyoruuuuz" value="{{ $event->title ?? null }}" />
                        <!--end::Input-->
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center flex-wrap gap-5" data-kt-buttons="true">
                        <!--begin::Option-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 w-250px {{ isset($event) ? ($event->event_type_id == 1 ? 'active' : '') : 'active' }}">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="event_type_id" value="1" {{ isset($event) ? ($event->event_type_id == 1 ? 'checked' : ''): 'checked' }} />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <span class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <i class="fa fa-gift fs-3hx"></i>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <span class="ms-4">
                                    <span class="fs-3 fw-bold text-gray-900 mt-2 d-block">Düğün</span>
                                </span>
                                <!--end::Info-->
                            </span>
                            <!--end::Label-->
                        </label>
                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 w-250px {{ isset($event) ? ($event->event_type_id == 2 ? 'active' : '') : '' }}">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="event_type_id" value="2" {{ isset($event) ? ($event->event_type_id == 2 ? 'checked' : '') : '' }} />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <span class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <i class="fa fa-gift fs-3hx"></i>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <span class="ms-4">
                                    <span class="fs-3 fw-bold text-gray-900 mt-2 d-block">Nişan</span>
                                </span>
                                <!--end::Info-->
                            </span>
                            <!--end::Label-->
                        </label>
                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 w-250px {{ isset($event) ? ($event->event_type_id == 3 ? 'active' : '') : '' }}">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="event_type_id" value="3" {{ isset($event) ? ($event->event_type_id == 3 ? 'checked' : '') : '' }} />
                            <!--end::Input-->
                            <!--begin::Label-->
                            <span class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <i class="fa fa-gift fs-3hx"></i>
                                <!--end::Icon-->
                                <!--begin::Info-->
                                <span class="ms-4">
                                    <span class="fs-3 fw-bold text-gray-900 mt-2 d-block">Kına</span>
                                </span>
                                <!--end::Info-->
                            </span>
                            <!--end::Label-->
                        </label>
                        <!--end::Option-->
                    </div>
                </div>
            </div>
            <!--end::Step 1-->

            <!--begin::Step 2-->
            <div class="flex-column" data-kt-stepper-element="content">
                <div class="row g-5">
                    <div class="col-12">
                        <h4 class="mb-5">1. Eş Bilgileri</h4>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row g-5">
                            <div class="col-xl-6">
                                <!--begin::Label-->
                                <label class="form-label d-flex align-items-center">
                                    <span class="required">Ad</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" name="first_partner_first_name" placeholder="" value="{{ $event->first_partner_first_name ?? null }}" />
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Label-->
                                <label class="form-label d-flex align-items-center">
                                    <span class="required">Soyad</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" name="first_partner_last_name" placeholder="" value="{{ $event->first_partner_last_name ?? null }}" />
                                <!--end::Input-->
                            </div>
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="form-label d-flex align-items-center">
                                    <span class="required">Aile Bilgisi</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" name="first_family_names" placeholder="Deniz & Ali Yıldırım | Deniz Gümüş - Ali Yıldırım" value="{{ $event->first_family_names ?? null }}" />
                                <!--end::Input-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-10">
                        <h4 class="mb-5">2. Eş Bilgileri</h4>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row g-5">
                            <div class="col-xl-6">
                                <!--begin::Label-->
                                <label class="form-label d-flex align-items-center">
                                    <span class="required">Ad</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" name="second_partner_first_name" placeholder="" value="{{ $event->second_partner_first_name ?? null }}" />
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Label-->
                                <label class="form-label d-flex align-items-center">
                                    <span class="required">Soyad</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" name="second_partner_last_name" placeholder="" value="{{ $event->second_partner_last_name ?? null }}" />
                                <!--end::Input-->
                            </div>
                            <div class="col-12">
                                <!--begin::Label-->
                                <label class="form-label d-flex align-items-center">
                                    <span class="required">Aile Bilgisi</span>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" class="form-control" name="second_family_names" placeholder="Cengiz & Yağmur Sert | Yağmur Keser - Cengiz Sert" value="{{ $event->second_family_names ?? null }}" />
                                <!--end::Input-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Step 2-->

            <!--begin::Step 3-->
            <div class="flex-column" data-kt-stepper-element="content">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-5">Zaman Bilgileri</h4>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row g-5">
                            <div class="col-xl-4">
                                <label class="form-label d-flex align-items-center">Etkinlik Tarihi</label>
                                <x-portal.form-elements.date-input name="start_date" value="{{ isset($event->start_date) ? $event->start_date->format('Y-m-d') : null }}" />
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label d-flex align-items-center">Başlangıç Saati</label>
                                <input type="time" class="form-control" name="start_time" value="{{ $event->start_time ?? null }}" />
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label d-flex align-items-center">Bitiş Saati</label>
                                <input type="time" class="form-control" name="end_time" value="{{ $event->end_time ?? null }}" />
                            </div>


                        </div>
                    </div>
                    <div class="col-12 mt-10">
                        <h4 class="mb-5">Konum Bilgileri</h4>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row g-5">
                            <div class="col-12">
                                <div class="fw-bold pb-10">Buraya harita ekleriz, konumu elle işşaretler ya da şehir seçimine göre düğün salonları listeleneilir api den duruma göre bakalım.</div>
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label d-flex align-items-center">Ülke</label>
                                <x-portal.form-elements.country-select name="country_id" :selectedOption="$event->country_id ?? null" />
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label d-flex align-items-center">Şehir</label>
                                <x-portal.form-elements.city-select name="city_id" :selectedOption="isset($event->city) ? ['label' => $event->city->name, 'value' => $event->city_id] : null" />
                            </div>
                            <div class="col-xl-4">
                                <label class="form-label d-flex align-items-center">İlçe</label>
                                <x-portal.form-elements.district-select name="district_id" :selectedOption="isset($event->district) ? ['label' => $event->district->name, 'value' => $event->district_id] : null" />
                            </div>
                            <div class="col-12">
                                <label class="form-label d-flex align-items-center">Açık Adres</label>
                                <textarea name="address" class="form-control" rows="2">{!! $event->address ?? null !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="separator separator-dashed my-5"></div>
                        <div class="row g-5">
                            <div class="col-xl-12">
                                <label class="form-label d-flex align-items-center">Etkinlik Programı</label>
                                <textarea name="event_program" class="form-control" rows="3" placeholder="15:00 Nikah&#10;20:00 Eğlence Başlangıç">{!! $event->event_program ?? null !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--en::Step 3-->

            <!--begin::Step 4-->
            <div class="flex-column" data-kt-stepper-element="content">
                <div class="row g-5">
                    <div class="col-12">
                        <h4 class="mb-2">Etkinlikte Misafir Takibi</h4>

                        <div class="form-text mb-2">
                            Etkinliğinizde katılımcıların getirdiği misafirleri takip etmek ister misiniz?
                            Bu seçeneği aktif ettiğinizde, davetiye linklerinde katılım (LCV) seçenekleri olan bir form da yer alır:
                            <strong>"Katılıyorum", "Katılmayacağım"</strong> gibi. Ayrıca katılımcılara özel ek sorular yöneltebilirsiniz.
                        </div>

                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="allow_guest_tracking" value="1" {{ isset($event) ? ($event->allow_guest_tracking ? 'checked' : '') : '' }} />
                            <span class="form-check-label fw-semibold text-muted">Misafir takibini aç</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <div class="col-12 mt-10">
                        <h4 class="mb-5">Ek Sorular</h4>
                        <div class="separator separator-dashed my-5"></div>
                        <div class="form-text mb-2">
                            Davetiyelerde varsayılan olarak <strong>Katılıyorum / Katılmayacağım</strong> LCV seçenekleri bulunacaktır.
                            Bunlara ek olarak, misafirlerinize özel sorular da ekleyebilirsiniz. Örneğin:
                            <em>"Kalacak yeriniz var mı?", "Yiyecek tercihiniz nedir?"</em> gibi sorularla etkinliğinizi daha planlı hale getirebilirsiniz.
                        </div>
                        <div class="row g-5">
                            <div class="col-12">
                                <!--begin::Repeater-->
                                <div id="team_repeater_condition_area">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="team_repeater_condition_area">
                                            <div class="row mt-3" data-repeater-item>
                                                <!-- Soru Tipi -->
                                                <div class="col-xl-3">
                                                    <label class="form-label">Soru Tipi</label>
                                                    <select class="form-select question-type-select" name="question_type">
                                                        <option value="text">Yazılı Cevap</option>
                                                        <option value="multiple_choice">Seçenekli Cevap</option>
                                                    </select>
                                                </div>

                                                <!-- Soru Metni -->
                                                <div class="col-xl-4">
                                                    <label class="form-label">Soru</label>
                                                    <input type="text" class="form-control" name="question_text" placeholder="Örn: Kalacak yeriniz var mı?">
                                                </div>

                                                <!-- Seçenekler (Sadece Seçenekli sorular için) -->
                                                <div class="col-xl-5 multiple-choice-options d-nsone">
                                                    <label class="form-label">Seçenekler (virgül ile ayır)</label>
                                                    <input type="text" class="form-control" name="options" placeholder="Evet, Hayır, Belki">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Form group-->

                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                            <i class="ki-duotone ki-plus fs-3"></i>
                                            Soru Ekle
                                        </a>
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Step 4-->
        </div>
        <!--end::Group-->

        <!--begin::Actions-->
        <div class="d-flex flex-stack">
            <!--begin::Wrapper-->
            <div class="me-2">
                <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                    Geri
                </button>
            </div>
            <!--end::Wrapper-->

            <!--begin::Wrapper-->
            <div>
                @if(isset($event))
                <x-portal.form-elements.submit-btn type="button" attrs="data-kt-stepper-action=edit-submit">
                    Değişiklikleri Kaydet
                </x-portal.form-elements.submit-btn>
                @else
                <x-portal.form-elements.submit-btn type="button" attrs="data-kt-stepper-action=submit">
                    Oluştur
                </x-portal.form-elements.submit-btn>
                @endif

                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                    Devam Et
                </button>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Stepper-->
@push('scripts')
<script>
    $(document).ready(function() {
        function scrollToElementWithOffset(selector = '#create_edit_wedding_container', offset = 80) {
            const element = document.querySelector(selector);
            if (element) {
                const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }

        let isEdit = "{{ isset($event) ? true : false }}"
        let element = document.querySelector("#kt_stepper_add_event");
        let stepper = new KTStepper(element);
        let validators = [];
        let formElement = document.querySelector("#kt_stepper_add_event_form");
        let form = $(formElement);
        let submitButton = form.find("[data-kt-stepper-action='submit']");

        stepper.on("kt.stepper.changed", function() {
            if (isEdit && stepper.getCurrentStepIndex() === 5) {
                submitButton.addClass('d-none')
            }
        });

        // Handle next step
        stepper.on("kt.stepper.next", function(e) {
            var currentValidator = validators[e.getCurrentStepIndex() - 1];
            if (currentValidator) {
                currentValidator.validate().then(function(validationResult) {
                    if (validationResult === "Valid") {
                        e.goNext();
                    } else {
                        Swal.fire({
                            text: "Formda geçersiz alanlar var.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        });
                    }
                });
            } else {
                e.goNext();
                scrollToElementWithOffset('#create_edit_wedding_container', 100);
            }
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(e) {
            e.goPrevious();
            const container = document.querySelector('#create_edit_wedding_container');
            const headerOffset = 90; // Header yüksekliğin kaç px ise buraya yaz
            if (container) {
                const elementPosition = container.getBoundingClientRect().top + window.pageYOffset;
                const offsetPosition = elementPosition - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });

        $(document).on('click', '[data-kt-stepper-action="submit"]', function() {
            let formData = new FormData(form[0]);

            $.ajax({
                type: 'POST',
                url: "{{route('portal.events.store')}}",
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


        //console da hata bırkıyor
      /*  validators.push(FormValidation.formValidation(formElement, {
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: "Başlık seçimi zorunlu"
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".field-area",
                })
            }
        }));*/
    })
</script>
@endpush