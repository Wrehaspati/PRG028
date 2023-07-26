@if (!Auth::user()->role)
    @if ($assignment->status != 'closed')
        @if (isset($isNotNull))
            <div class="pt-5 flex w-full justify-center">
                <button class="upload-button" onclick="openModal()">Edit Pengajuan</button>
            </div>
        @else
            <div class="container pt-5">
                <button class="upload-button" onclick="openModal()">Ajukan File</button>
            </div>
        @endif
    @else
        @if (Session::has('error'))
            <div class="bg-red-500 px-4 py-2 text-white mt-2">
                <ul>
                    <li>{{ Session::get('error') }}</li>
                </ul>
            </div>
        @endif
    @endif

    <div id="upload-success"
        style="display: none; padding: 10px; background-color: #d4edda; color: #155724; border-radius: 8px; margin-top: 10px;">
    </div>
    {{-- Modal milik roles students --}}
    <div id="myModal" class="modal overflow-hidden">
        <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content md:w-2/5">
                <span class="close" onclick="closeModal()">&times;</span>

                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                <input type="hidden" name="assign_by" value="student">
                <input type="hidden" name="unique_grade_id" value="{{ $subject->grade_id }}">
                <input type="hidden" name="unique_subject_name" value="{{ $subject->subject_name }}">
                <input type="hidden" name="unique_id" value="{{ Auth::user()->studentData->id }}">
                <input type="hidden" name="unique_subject_id" value="{{ $subject->id }}">

                <div class="w-full flex justify-center">
                    <div
                        class="file-drop-area border-2 border-gray-300 border-dashed rounded-md min-h-[14rem] w-fit px-10 pr-20 hover:border-gray-400 focus:outline-none">
                        <span class="fake-btn text-small hidden md:block">Choose files</span>
                        <span class="file-msg">or drag and drop files here</span>
                        <input class="file-input" name="filenames[]" type="file" {{-- multiple --}} required>
                    </div>
                </div>

                <div class="w-full flex justify-center gap-3 pt-10">
                    <button class="button bg-red-500 hover:bg-red-700 hidden md:block" type="reset"
                        onclick="resetInput()">Batal</button>
                    @if (count($files) == 0)
                        <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">Upload</button>
                    @else
                        <input type="hidden" name="type" value="replace">
                        <button class="button bg-cyan-500 hover:bg-cyan-700" type="submit">Simpan Perubahan</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@else
    {{-- Modal milik roles guru --}}
    <div id="myModal" class="modal">
        <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Materials/Files</h2>
                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                <input type="hidden" name="assign_by" value="teacher">
                <input type="hidden" name="unique_grade_id" value="{{ $subject->grade_id }}">
                <input type="hidden" name="unique_subject_name" value="{{ $subject->subject_name }}">
                <input type="hidden" name="unique_subject_id" value="{{ $subject->id }}">

                <div class="input-group hdtuto control-group lst increment">
                    <input type="file" name="filenames[]" class="myfrm form-control">
                    <div class="input-group-btn">
                        <button class="btn-success button bg-green-500 my-2 px-4 py-2" type="button"><i
                                class="fldemo glyphicon glyphicon-plus"></i>Add More Files</button>
                    </div>
                </div>
                <div class="clone hidden">
                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                        <input type="file" name="filenames[]" class="myfrm form-control">
                        <div class="input-group-btn">
                            <button class="button bg-red-500 hover:bg-red-800 my-2 px-4 py-2 btn-danger"
                                type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>

                <div class="kanan">
                    <button class="button-delete" onclick="deleteTask()">Delete</button>
                    <button class="button" onclick="saveTask()">Upload</button>
                </div>
            </div>
        </form>
    </div>
@endif
