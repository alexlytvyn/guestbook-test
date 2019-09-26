@extends('admin.layouts.app_admin')

@section('content')
    @include('admin.inc.header')

                    <div class="panel-body">
                        <h3>Edit Message</h3>
                        <form id="messageEditForm" action="{{ route('admin.message.update', $message) }}" method="POST">
                            {{ method_field('PUT') }}

                            @if (count($errors) > 0)
                                <div class="alert alert-danger hide-box mt-4" id="messageError">
                                    <p><strong>Error!</strong> Problem occured while updating the message.</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" value="{{ $message->name }}" maxlength="100" class="form-control" name="name" id="name" placeholder="Enter your Name" required>
                            </div>

                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" value="{{ $message->email }}" maxlength="100" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
                            </div>

                            <div class="form-group">
                                <label>Message *</label>
                                <textarea maxlength="5000" rows="8" class="form-control" name="message_text" id="message_text" placeholder="Enter your Message" required>{{ $message->message_text }}</textarea>                 
                            </div>

                            <input type="submit" value="Update Message" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection