<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <div class="content">
      </div> <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-end mb-2">
                    <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Add User</button>
                </div>
              <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit mr-2"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Modal start-->

      <div class="modal" tabindex="-1" id="form" wire:ignore.self>
        <div class="modal-dialog">
        <form autocomplete="off" wire:submit.prevent="createUser">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model.defer="state.name" class="form-control
                        @error('name') is-invalid @enderror"
                        placeholder="Enter Full Name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                         @enderror
                      </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="text" wire:model.defer="state.email" class="form-control
                      @error('email') is-invalid @enderror"
                       placeholder="Enter Email">
                      @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" wire:model.defer="state.password" class="form-control
                      @error('name') is-invalid @enderror"
                        placeholder="Password">
                      @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" wire:model.defer="state.password_confirmation" class="form-control" placeholder="Confirm Password">
                      </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
        </div>
      </div>

      <!-- Modal End -->
</div>
