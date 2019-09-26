@extends('admin.layouts.app_admin')

@section('content')
    @include('admin.inc.header')
                    <div class="panel-body">
                        <h3>Listing Messages</h3>
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
                                            <a href="{{ route('admin.message.edit', $message )}}">Edit</a> |
                                            <a href="{{ route('admin.message.show', $message )}}">Show</a> |
                                            <form style="display:inline-block;" onsubmit="if(confirm('Are you sure you want to delete this message?')){return true;} else {return false;}" action="{{route('admin.message.destroy', $message)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button style="background:none;display:inline-block;padding:0;color:#3097d1;" type="submit" name="button" class="btn">Delete</button>
                                            </form>
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