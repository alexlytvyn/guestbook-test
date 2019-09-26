@extends('layouts.app')

@section('content')
          @include('user.inc.header')
                        <div class="panel-body">
                            <h3>Message details</h3>
                            <p>{{ $message->name }} wrote at {{ $message->created_at }}:</p>
                            <p>{{ $message->message_text }}</p>
                            <a href="{{ route('user.message.index')}}">&larr; Back to messages list</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection