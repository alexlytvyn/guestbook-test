@extends('layouts.app')

@section('content')
    @include('user.inc.header')

                    <div class="panel-body">
                        <h3>Listing Messages</h3>
                        <a href="{{route('user.message.create')}}" class="btn btn-primary" style="margin-bottom:10px;margin-top:5px;">Add New Message</a>
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$messages->isEmpty())
                                    @php $count=1; @endphp
                                    @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ str_limit($message->message_text, $limit = 25, $end = '...') }}</td>
                                        <td>{{ $message->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.message.show', $message )}}">Show</a>
                                        </td>
                                    </tr>
                                    @php $count++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">There are no messages in the database!</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right">
                                            {{$messages->links()}}
                                        </ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection