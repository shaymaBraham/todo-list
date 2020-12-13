
   @extends('layouts.app')

@section('content') 

<script>
    var globalData = '{!! $globalData->toJson() !!}';
</script>
    <div id="tasklist">
    </div>

    @endsection

    