@extends('backend/layouts/backend/gentelella')
@section('content')
<div id="page-content" style="min-height: 553px;" id="body">

  <component :is="currentView" v-bind:url="mainUrl" ></component>
</div>
@endsection
