@props([
    'start' => '01-01-2025',
    'end' => now()->format('d-m-Y'),
    'name' => '',
    'customClass' => 'date-range-picker',
    'allowClear' => false,
    'placeholder' => 'Tarih Aralığı Seçiniz',
    'customAttr' => '',
])
<input class="form-control {{$customClass}}" placeholder="{{$placeholder}}" name="{{$name}}" {{$customAttr}} />
@push('scripts')
    <script>
        $(document).ready(function () {
            let customClass = "{{$customClass}}";
            let input = $(`.${customClass.split(' ')[0]}`);

            let start = moment("{{$start}}", "DD-MM-YYYY");
            let end = moment("{{$end}}", "DD-MM-YYYY");

            function cb(start, end) {
                input.html(start.format("DD MMMM YYYY") + " - " + end.format("DD MMMM YYYY"));
            }

            input.daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    "Tüm Zamanlar": [moment("2025-01-01"), moment()],
                    "Bugün": [moment(), moment()],
                    "Dün": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Son 30 Gün": [moment().subtract(29, "days"), moment()],
                    "Bu Ay": [moment().startOf("month"), moment().endOf("month")],
                    "Geçen Ay": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                },
                locale: {
                    format: 'DD-MM-YYYY',
                    applyLabel: 'Uygula',
                    cancelLabel: 'İptal',
                    customRangeLabel: 'Özel Aralık',
                    monthNames: [
                        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran',
                        'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
                    ],
                    daysOfWeek: [
                        'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz',
                    ],
                    firstDayOfWeek: 1,
                    time_24hr: true
                }
            }, cb);

            cb(start, end);
        });
    </script>
@endpush