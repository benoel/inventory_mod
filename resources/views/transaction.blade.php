@extends('layouts.default')
@section('content')
<div class="container-fluid">
  <h2>Transaksi {{ $type }}</h2>
  <div class="row">
    <div class="col-md-6">
      <p>Tanggal: {{ date("d-M-Y") }}</p>
      {{-- {{json_encode($products)}} --}}
      <select name="productName">
        {{-- @foreach($products as $item)
          <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach --}}
      </select>
      <ul id="product-list"></ul>
    </div>
    <div class="col-md-6">
    </div>
  </div>
</div>

<script type="text/javascript">
  window.trancType = '{{$type}}';
</script>
@endsection