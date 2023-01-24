<table class="table table-row-bordered gy-5" id="blogs">
    <thead>
    <tr class="fw-bold fs-6 text-muted text-center">
        <th>
            #
        </th>
        <th>
            {{ 'Tab Name' }}
        </th>
        <th>
            {{ 'Description' }}
        </th>
        <th>
            {{ 'Actions' }}
        </th>
    </tr>
    </thead>
    <tbody>
    @if( $tabs )
        @foreach( $tabs as $i => $tab )
            <tr class="text-center">
                <td>
                    {{ $i += 1 }}
                </td>
                <td>
                    {{ $tab->tab_name }}
                </td>
                <td>
                    {{ \Illuminate\Support\Str::limit($tab->description, 20) }}
                </td>
                <td>
                    <a href="{{ route('tab.edit', ['id' => $tab->id]) }}" class="btn btn-icon btn-light-success btn-sm">
                        <span class="svg-icon svg-icon-3">
                            <i class="fas fa-edit fs-5"></i>
                        </span>
                    </a>

                    <a class="btn btn-icon btn-light-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#delete-{{ $tab->id }}">
                        <span class="svg-icon svg-icon-3">
                            <i class="fas fa-trash-alt fs-5"></i>
                        </span>
                    </a>
                </td>
            </tr>

            {{-- Delete Modal --}}
            <div class="modal fade" tabindex="-1" id="delete-{{ $tab->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Tab</h5>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <p>
                                {{ 'You are about to be deleted Tab, Are You Sure ?' }}
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('tab.delete', ['id' => $tab->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-primary delete-icon" data-id="{{ $tab->id }}">
                                    Sure
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    </tbody>
</table>

