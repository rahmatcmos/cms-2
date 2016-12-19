@extends('backend/layouts/backend/gentelella')
@section('content')
<div id="page-content" style="min-height: 553px;">
	
		<component :is="currentView" v-bind:url="mainUrl" v-bind:assets="assetUrl" ></component>

</div>
@endsection
