 <div wire:ignore.self class="modal fade OpenSubModal" id="modalCenter" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">Sub category</h5>
                 <button
                     type="button"
                     class="btn-close"
                     data-bs-dismiss="modal"
                     aria-label="Close"
                 ></button>
             </div>
             <form wire:submit.prevent="saveSub" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col mb-3">
                             <label for="nameWithTitle" class="form-label">Name</label>
                             <input
                                 type="text"
                                 id="nameWithTitle"
                                 class="form-control"
                                 placeholder="Enter Name"
                                 wire:model="sub_name"
                             />
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mt-3">
                             <label for="image" class="form-label">Icon</label>
                             <input class="form-control" type="file" id="image" wire:model="sub_icon">
                             @error('sub_icon') <span class="error">{{ $message }}</span> @enderror
                         </div>

                         @if($sub_icon)
                             <img width="200" height="400" class="mt-4" src="{{$sub_icon->temporaryUrl()}}"
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

