<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            File Manager
        </h2>
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data" align="right">
            @csrf
            <input type="file" name="file" class="custom-file-input" id="chooseFile">
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table style="width:100%">
                        <tr>
                            <th align="left">Name</th>
                            <th align="left">Size(in kbs)</th>
                            <th align="right">Action</th>
                        </tr>
                        @if(count($files)>0)
                        @for ($i = 0; $i < count($files); $i++)
                        <tr>
                            <td>{{$files[$i]}}</td>
                            <td>{{$sizes[$i]}} kbs</td>
                            <td>
                                <form action="{{route('rename')}}" method="post" enctype="multipart/form-data" align="right">
                                    @csrf
                                    <input type="text" name="name" style="width:30%">
                                    <input type="text" name="old" value="{{$files[$i]}}" type="hidden" style="display:none">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                        Rename
                                    </button>
                                </form>
                                <form action="{{route('delete')}}" method="get" enctype="multipart/form-data" align="right">
                                    @csrf
                                    <input type="text" name="name" value={{$files[$i]}} type="hidden" style="display:none">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endfor
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

