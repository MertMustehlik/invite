@extends("portal.template")
@section('title', 'Ana Sayfa')
@section('breadcrumb')
<x-portal.breadcrumb data="Ana Sayfa" />
@endsection
@section("master")
<form class="row">
    <div>
        * Burada yuvarlak grafik. Toplam Etkinlik sayısı. Yaklaşan etkinlik sayısı. Tamamlanan etkinlik sayısı
        * Etkinliklar Page: etkinlikleri listele büyük kart alt alta. details de tablarda katılımcıalrı vs ekle.
    </div>
</form>
@endsection