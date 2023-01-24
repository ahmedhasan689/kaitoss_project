<table class="table table-row-bordered gy-5" id="services">
    <thead>
    <tr class="fw-bold fs-6 text-muted text-center">
        <th>
            #
        </th>
        <th>
            {{ 'Name' }}
        </th>
        <th>
            {{ 'Email' }}
        </th>
        <th>
            {{ 'Phone Number' }}
        </th>
        <th>
            {{ 'Subject' }}
        </th>
        <th>
            {{ 'Message' }}
        </th>

        <th>
            {{ 'Actions' }}
        </th>
    </tr>
    </thead>
    <tbody>
    @if( $contacts )
        @foreach( $contacts as $i => $contact )
            <tr class="text-center">
                <td>
                    {{ $i += 1 }}
                </td>
                <td>
                    {{ $contact->name }}
                </td>
                <td>
                    {{ $contact->email }}
                </td>

                <td>
                    {{ $contact->phone_number }}
                </td>

                <td>
                    {{ $contact->subject }}
                </td>

                <td>
                    {{ \Illuminate\Support\Str::limit($contact->message, 20) }}
                </td>

                <td>
                    <a href="#" class="btn btn-icon btn-light-success btn-sm" data-bs-toggle="modal" data-bs-target="#show-{{ $contact->id }}">
                        <span class="svg-icon svg-icon-3">
                            <i class="fas fa-eye fs-5"></i>
                        </span>
                    </a>

                    <a class="btn btn-icon btn-light-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#delete-{{ $contact->id }}">
                        <span class="svg-icon svg-icon-3">
                            <i class="fas fa-trash-alt fs-5"></i>
                        </span>
                    </a>
                </td>
            </tr>

            {{-- Show Modal --}}
            <div class="modal fade" tabindex="-1" id="show-{{ $contact->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ $contact->subject }}
                            </h5>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <p>
                                {{ $contact->message }}
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Delete Modal --}}
            <div class="modal fade" tabindex="-1" id="delete-{{ $contact->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Contact</h5>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <p>
                                {{ 'You are about to be deleted Contact, Are You Sure ?' }}
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('contact-us.delete', ['id' => $contact->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-primary delete-icon" data-id="{{ $contact->id }}">
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

