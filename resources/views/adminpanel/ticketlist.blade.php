@include('adminpanel.adminpanelmaster')
<style>
    .color td {
        background-color: #5cb85c;
        color: white !important;
        font-weight: bolder;
    }

    th {
        color: black!important;
        font-weight: bolder;
    }

    table {
        border-color: #ccc;
        border: 1px solid #ccc;
    }

    body td {
        color: black!important;
    }
</style>
<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">
            <div class="">
                <label><strong>Son Açılan 10 Ticket </strong></label>
                <hr>
                <table id="example2" class="display" style="width:100%; ">
                    <thead>
                    <tr>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Aciliyet</th>
                        <th>Durumu</th>
                        <th>İşlem</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $value)
                        <tr>

                            <td>{{$value->subject}}</td>
                            <td>{{$value->question_description}}</td>
                            <td>{{$value->emergency_status}}</td>
                            <td>{{$value->transaction_status}}</td>
                            <td>
                                <a href="/adminpanel/ticket-edit/{{$value->id}}" class="btn btn-success">Düzenle</a>
                                <a   onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/{{$value->id}}" class="btn btn-danger">Sil</a>
                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Aciliyet</th>
                        <th>Durumu</th>
                        <th>İşlem</th>

                    </tr>
                    </tfoot>
                </table>
            </div>

            <form action="/adminpanel/welcome" method="post" name="list" autocomplete="off" style="margin-bottom:15px;">  <hr> @csrf
                <label><strong>Tarih aralığı seçiniz</strong></label>
                <div class='input-group' id='datetimepickers1'>
                    <input style="width: 50%; float:left;" class="form-control date" name="date1" value="{{date(" d-m-Y ",strtotime($StartDate))}}" type="text" id="datetimepicker_mask2" required/>
                    <input style="width: 50%; float:left;" class="form-control date" name="date2" value="{{date(" d-m-Y ",strtotime($EndDate))}}" type="text" id="datetimepicker_mask33" required/> </div>
                <script type="text/javascript">
                    $(function() {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
                <input type="submit" value="TİCKETLARI LİSTELE" class="btn btn-success testsend" name="list" style="width: 100%; font-weight: bolder;" /> </form>
            <hr>



            <!-- start content_slider -->
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Konu</th>
                    <th>Açıklama</th>
                    <th>Aciliyet</th>
                    <th>Durumu</th>
                    <th>İşlem</th>

                </tr>
                </thead>
                <tbody>

                @foreach($data as $value)
                    <tr>

                        <td>{{$value->subject}}</td>
                        <td>{{$value->question_description}}</td>
                        <td>{{$value->emergency_status}}</td>
                        <td>{{$value->transaction_status}}</td>
                        <td>
                            <a href="/adminpanel/ticket-edit/{{$value->id}}" class="btn btn-success">Düzenle</a>
                            <a   onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/{{$value->id}}" class="btn btn-danger">Sil</a>
                        </td>


                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th>Konu</th>
                    <th>Açıklama</th>
                    <th>Aciliyet</th>
                    <th>Durumu</th>
                    <th>İşlem</th>

                </tr>
                </tfoot>
            </table>
            </section>
            <!--Section: Live preview-->
            <a href="#" class="badge badge-primary">Primary</a>
            <a href="#" class="badge badge-secondary">Secondary</a>
            <a href="#" class="badge badge-success">Success</a>
            <a href="#" class="badge badge-danger">Danger</a>
            <a href="#" class="badge badge-warning">Warning</a>
            <a href="#" class="badge badge-info">Info</a>
            <a href="#" class="badge badge-light">Light</a>
            <a href="#" class="badge badge-dark">Dark</a>
        </div>

        <script>
            $('#example').dataTable();
            $('#example2').dataTable();
        </script>
    </div>
    <div class="clearfix"> </div>
</div>
<!----->
<div class="content-bottom">
    <div class="col-md-6 post-top"> </div>
    <div class="clearfix"> </div>
</div>
<!--//content-->
<!---->
</div>
<div class="clearfix"> </div>
</div>
</div>
@include('adminpanel.footer');
</body>

</html>