<form action="{{ route('products.search') }}" class="d-flex">
    <div class="form-group mb-0 mr-1">
        <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" value="{{ request()->search ?? '' }}">
        @error('search')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <button type="submit" class="btn btn-info text-white ml-2"><i class="fas fa-search" aria-hidden="true"></i>
    </button>
</form>