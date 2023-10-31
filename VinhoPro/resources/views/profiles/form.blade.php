 @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" value="{{ $profile->name ?? old('name') }}" placeholder="Nome do perfil">
            </div>
        </div>
		
		<div class="col-md-12 text-right mt-3">
			<div class="form-check">
				<label class="form-check-label">
					<input id="select-all-permissions" class="form-check-input" type="checkbox" />
					Selecionar todas as permissões de todas as categorias
				</label>
			</div>
		</div>
			<div class="col-md-12">
        @foreach (array_unique(array_column(config('permissions'), 'category')) as $category)
            <div class="col-md-12 m-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $category }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse (config('permissions') as $key => $permission)
                                @if ($permission['category'] === $category)
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $key }}" @if (!empty($profile)) {{ (in_array($key, old('permissions', $profile->permissions))) ? 'checked="checked"' : '' }} @endif/>
                                                <p class="text-dark"><strong>{{ $permission['name'] }}</strong> - {{ $permission['description'] }}</p>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-md-12">Nenhuma permissão disponível no momento</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
	</div>
        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

@foreach (array_unique(array_column(config('permissions'), 'category')) as $category)
    <script>
        document.getElementById('select-all-{{ $category }}').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('input[name="permissions[]"][value="{{ $category }}"]');
            for (const checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script>
@endforeach

<script>
    document.getElementById('select-all-permissions').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="permissions[]"]');
        for (const checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>
