@extends("layout.master")

@section("title") File Manager | Home @stop

@section("window-content")
    <div class="pane">
        <table class="table-striped table-file-manager">
            <thead>
            <tr>
                <th>Name</th>
                <th>Kind</th>
                <th>File Size</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr data-path="{{ $file["path"] }}" data-type="{{ $file["type"] }}">
                    <td>@if($file["type"] == "Directory") <span class="icon icon-folder"></span> @else <span class="icon icon-doc-text"></span> @endif {{ $file['name'] }}</td>
                    <td>{{ $file['type'] }}</td>
                    <td>{{ $file['size'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="pane">
        {!! $content !!}
    </div>
@stop