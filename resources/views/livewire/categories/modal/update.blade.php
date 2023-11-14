<div wire:ignore.self class="modal fade OpenEditModals" id="modalCenter" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">Edit category {{ $upd_name }}</h5>
                 <button
                     type="button"
                     class="btn-close"
                     data-bs-dismiss="modal"
                     aria-label="Close"
                 ></button>
             </div>
             <form wire:submit.prevent="update" enctype="multipart/form-data">
                 <input type="hidden" wire:model="upd_id">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col mb-3">
                             <label for="nameWithTitle" class="form-label">Name</label>
                             <input
                                 type="text"
                                 id="nameWithTitle"
                                 class="form-control"
                                 placeholder="Enter Name"
                                 wire:model="upd_name"
                             />
                         </div>
                     </div>
                     <div class="row g-2">
                         <div class="col mb-0">
                             <label for="server">Parent</label>
                             <select class="form-control" wire:model="upd_parent_id">
                                 <option value="0">null</option>
                                 @foreach(\App\Models\Category::query()->select('id', 'name')->get() as $cat)
                                     <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                 @endforeach
                             </select>
                             <span class="text-danger"> @error('upd_parent_id') {{ $message }}@enderror</span>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mt-3">
                             <label for="image" class="form-label">Icon</label>
                             <input class="form-control" type="file" id="image" wire:model="upd_icon">
                             @error('upd_icon') <span class="error">{{ $message }}</span> @enderror
                         </div>

                         @if($upd_icon)
                             <img width="200" height="400" class="mt-4" src="{{$upd_icon->temporaryUrl()}}"
                         @endif

                         <div wire:loading wire:target="upd_icon" class="text-sm text-gray-500 italic">Uploading...</div>

                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                         Close
                     </button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <script>
     document.addEventListener('livewire:initialized',()=>{
     @this.on('reset-modal',(event)=>{
         $('#modalCenter').modal('hide');
     })
     })
 </script>

