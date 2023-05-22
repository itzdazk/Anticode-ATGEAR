{{-- Brand add Modal --}}

<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm thương hiệu</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
          <div class="mb-3">
            <label >Tên</label>
            <input type="text" wire:model.defer="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label >Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control" required>
          </div>
          <div class="mb-3">
            <label >Trạng thái </label><br/>
            <input type="checkbox" wire:model.defer="status">
            Checked = Hidden, Un-Checked = Visible
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save </button>
        </div>
    </form>
      </div>
    </div>
  </div>


  {{-- Brand update modal --}}


  <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brands</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
            <div class="spinner-grow text-dark" role="status">
                <span class="sr-only">Loading...</span>
              </div>Loading...
        </div>
        <div wire:loading.remove>
            <form wire:submit.prevent="updateBrand">
            <div class="modal-body">
            <div class="mb-3">
                <label >Tên </label>
                <input type="text" wire:model.defer="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label >Slug</label>
                <input type="text" wire:model.defer="slug" class="form-control" required>
            </div>
            <div class="mb-3">
                <label >Trạng thái </label><br/>
                <input type="checkbox" wire:model.defer="status">
                Checked = Hidden, Un-Checked = Visible
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Update </button>
            </div>
            </form>
        </div>


      </div>
    </div>
  </div>


  {{-- Brand delete modal --}}





