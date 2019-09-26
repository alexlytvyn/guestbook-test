@extends('layouts.app')

@section('content')
    @include('user.inc.header')
                        <div class="panel-body">
                            <h3>Add New Message</h3>
                            <form id="messageCreateForm" action="{{ route('user.message.store') }}" method="POST">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger hide-box mt-4" id="messageError">
                                        <p><strong>Error!</strong> Problem occured while saving message.</p>
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
                                    <input type="text" value="{{ old('name') }}" maxlength="100" class="form-control" name="name" id="name" placeholder="Enter your Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" value="{{ old('email') }}" maxlength="100" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
                                </div>

                                <div class="form-group">
                                    <label>Message *</label>
                                    <textarea maxlength="5000" rows="8" class="form-control" name="message_text" id="message_text" placeholder="Enter your Message" required>{{ old('message_text') }}</textarea>                       
                                </div>

                                <input type="submit" value="Send Message" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection