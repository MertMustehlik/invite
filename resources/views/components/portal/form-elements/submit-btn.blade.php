@props([
    'id' => '',
    'type' => 'submit',
    'class' => '',
    'attrs' => ''
])
<button type="{{$type}}" id="{{$id}}" class="btn btn-primary {{$class}}" {{ $attrs }}>
                            <span class="indicator-label">
                                {{$slot}}
                            </span>
    <span class="indicator-progress">
                                Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
</button>
