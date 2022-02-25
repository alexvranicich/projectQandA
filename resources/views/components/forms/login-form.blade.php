<div class="w-75">

    @error('error')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <form action="{{ route('login.validate') }}" method="post">
        @csrf

        <h1 class="mb-5">Accedi</h1>

        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" />
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-outline mb-5">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg" />
            @error('password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-outline-dark btn-lg btn-block mt-1 mb-5" id="create" type="submit">Login</button>
            </div>
            <div class="col-md-4 offset-md-1">
                <a href="/register" class="btn btn-outline-secondary mt-2" role="button" data-bs-toggle="button">Non sei ancora registrato?</a>
            </div>
        </div>

    </form>

</div>

