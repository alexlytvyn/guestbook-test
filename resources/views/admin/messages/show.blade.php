@extends('admin.layouts.app_admin')

@section('content')
    @include('admin.inc.header')
                    <div class="panel-body">
                        <h3>Message details</h3>
                        <p>{{ $message->name }} wrote at {{ $message->created_at }}:</p>
                        <p>{{ $message->message_text }}</p>
                        <a href="{{ route('admin.message.index')}}">&larr; Back to messages list</a>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection