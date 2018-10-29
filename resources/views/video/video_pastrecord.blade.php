@extends('layouts/video_interview.video_recording_app')

@section('content')


                <!-- Page Content -->
                <div class="content">

                    <!-- Dynamic Table Full -->
                    <div class="block block-rounded block-bordered">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Dynamic Table <small>Full</small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 80px;">#</th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Recorded On</th>
                                        <th style="width: 15%;">Test</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($videos as $key => $video)

                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td class="font-w600">
                                            <a href="https://s3.ap-southeast-1.amazonaws.com/adnexio-video-webrtc/{{ $video->video_name }}">{{ $video->video_name }}</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            {{ $video->created_at }}
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-success">VIP</span>
                                        </td>
                                    </tr>
                                  
                                @endforeach 

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
                                         
                </div>
                <!-- END Page Content -->



@endsection
