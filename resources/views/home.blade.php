@extends('layouts.default')

@section('content')

<div class="text-center flex-center">
	<div class="title">Welcome</div>
</div>

<style>

	.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
		/*background-color: red;*/
		min-height: calc(100vh - 213px);
	}

	.title {
		font-size: 84px;
		/*color: #636b6f;*/
		color: #F4645F;
		font-family: libreFranklin;
		display: table-cell;
		vertical-align: middle;

	}

</style>

@endsection