@extends('layouts.app')
@section('content')
<div class="content">@include('layouts.alerts')

    <div class="container">

    <div class="row ">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">Editar</strong>
                </div>
            @include('layouts.alerts')
            <div class="card-body">
                <form action="{{ route('profile.update', $profile->id) }}" method="post">
                    @method('PUT')
                    @include('profiles.form')
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
</div>

<script>
    document.getElementById('select-all-permissions').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="permissions[]"]');
        for (const checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>
@endsection
