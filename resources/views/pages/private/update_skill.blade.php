@extends("layouts.private.app")

@section("title")
  Update Skill
@endsection

@section("content")
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Skill</h1>

    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <div class="p-4">
          <h1 class="h4 text-gray-900 mb-4">Skill</h1>
          <form class="user" action="{{ route("update_skill", $skill->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_skill">Nama Skill</label>
                <input type="text" name="nama_skill" class="form-control" id="nama_skill"
                  value="{{ $skill->nama_skill }}">
              </div>
              <div class="col-sm-6">
                <label for="tingkat_kemahiran">Tingkat Kemahiran</label>
                <input type="text" name="tingkat_kemahiran" class="form-control" id="tingkat_kemahiran"
                  value="{{ $skill->tingkat_kemahiran }}">
              </div>
            </div>
            <div class="row justify-content-end pr-3">
              <button type="submit" class="btn btn-primary">
                Ubah Data
              </button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
